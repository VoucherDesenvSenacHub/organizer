<?php
//CONFIGURAÇÕES DA PÁGINA
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Perfil da ONG | Organizer';
$cssPagina = ['ong/perfil.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . "\..\..\..\autoload.php";
$ongModel = new Ong();
$projetoModel = new Projeto();
$noticiaModel = new NoticiaModel();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $ong = $ongModel->buscarPerfil($id);
    $projetos_ong = $projetoModel->listar($id);
    $noticias_ong = $noticiaModel->listarCards($id);
}

$perfil = $_SESSION['perfil_usuario'] ?? '';
?>

<main <?php if ($perfil == 'doador') echo 'class="usuario-logado"'; ?>>
    <div class="container" id="container-principal">
        <?php
        if (!isset($_GET['id']) || !$ong) {
            exit('<h2>ERRO AO ENCONTRAR ONG!</h2>');
        }
        ?>
        <section id="apresentacao" class="container-section">
            <div id="logo-ong">
                <img src="https://placeholder.pagebee.io/api/plain/400/250">
                <div class="btn-salvar">
                    <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                    <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                </div>
            </div>
            <div id="dados-ong">
                <h1><?= $ong->nome ?></h1>
                <span id="data-criacao">Criada em <?= date('d/m/Y', strtotime($ong->data_cadastro)); ?></span>
                <h3>Arrecadado: <span>R$ <?= number_format($ong->total_arrecadado, 0, ',', '.'); ?></span></h3>
                <div id="recebidos">
                    <p><span><?= $ong->total_projetos ?> </span>Projetos Criados</p>|
                    <p><span><?= $ong->total_doacoes ?> </span>Doações Recebidas</p>
                </div>
                <div id="acoes">
                    <!-- Botão de Acões da ONG -->
                    <?php require_once 'partials/acoes-ong.php'; ?>
                </div>
            </div>
            <div id="imagem">
                <img src="../../assets/images/pages/perfil-ong.png" alt="">
            </div>
        </section>
        <section class="container-section">
            <div class="section-item" id="sobre">
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-sobre.png" alt="">
                    <h3>Sobre</h3>
                </div>
                <p><?= $ong->descricao ?></p>
            </div>
        </section>
        <section class="container-section" id="apoiadores">
            <div class="section-item">
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-doacao.png" alt="">
                    <h3>Doadores</h3>
                </div>
                <div class="mini-cards">
                    <?php require '../../components/cards/card-doador.php'; ?>
                    <?php require '../../components/cards/card-doador.php'; ?>
                    <?php require '../../components/cards/card-doador.php'; ?>
                    <?php require '../../components/cards/card-doador.php'; ?>
                    <?php require '../../components/cards/card-doador.php'; ?>
                    <?php require '../../components/cards/card-doador.php'; ?>
                </div>
            </div>
            <div class="section-item">
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-abraco.png" alt="">
                    <h3>Voluntários</h3>
                </div>
                <div class="mini-cards">
                    <?php require '../../components/cards/card-voluntario.php'; ?>
                    <?php require '../../components/cards/card-voluntario.php'; ?>
                    <?php require '../../components/cards/card-voluntario.php'; ?>
                    <?php require '../../components/cards/card-voluntario.php'; ?>
                    <?php require '../../components/cards/card-voluntario.php'; ?>
                    <?php require '../../components/cards/card-voluntario.php'; ?>
                </div>
            </div>
        </section>
        <section class="container-section">
            <div class="section-item" id="noticias">
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-megafone.png" alt="">
                    <h3>Notícias</h3>
                </div>
                <div class="mini-cards">
                    <?php
                    if ($noticias_ong) {
                        foreach ($noticias_ong as $noticia) {
                            require '../../components/cards/card-noticia.php';
                        }
                    } else {
                        echo '<h4>Está ONG ainda não tem notícias!</h4>';
                    }
                    ?>
                </div>
            </div>
        </section>
        <section class="container-section">
            <div class="section-item" id="projetos">
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-lampada.png" alt="">
                    <h3>Projetos</h3>
                </div>
                <div class="mini-cards">
                    <?php
                    if ($projetos_ong) {
                        foreach ($projetos_ong as $projeto) {
                            $valor_projeto = $projetoModel->buscarValor($projeto->projeto_id);
                            $barra = round(($valor_projeto / $projeto->meta) * 100);
                            require '../../components/cards/card-projeto.php';
                        }
                    } else {
                        echo '<h4>Está ONG ainda não tem projetos!</h4>';
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
$jsPagina = [];
require_once '../../components/footer.php';
?>