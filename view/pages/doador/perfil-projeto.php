<?php
ob_start();
$tituloPagina = 'Perfil do Projeto | Organizer';
$cssPagina = ['shared/perfil-projeto.css', 'doador/perfil-ong-projeto-doador.css'];
require_once '../../components/header-doador.php';

require_once '../../../model/ProjetoModel.php';
$projetoModel = new Projeto();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $projeto = $projetoModel->buscarId($id);
    $valor_projeto = $projetoModel->buscarValor($id);
    $qntdoadores = $projetoModel->contarDoadores($id);
    $barra = round(($valor_projeto / $projeto->meta) * 100);
}

if (!isset($_GET['id']) || !$projeto){
    echo '<h1> Projeto Não encontrado! </h1>';
    exit();
    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valor = $_POST['valor'];
    if ($valor == 'outro') {
        $valor = $_POST['outro-valor'];
    }
    $doacao = $projetoModel->doacao($projeto->codproj, $valor, $_SESSION['doador_id']);
    if ($doacao > 0) {
        header("Location: perfil-projeto.php?id=$id&msg=doacao");
        exit;
    }
}
ob_end_flush();
?>
<div id="toast-doacao-sucesso" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    Doação Realizada Com Sucesso!
</div>
<?php if (isset($_GET['msg']) && $_GET['msg'] == 'doacao'): ?>
    <script>
        exibir_toast('toast-doacao-sucesso')
    </script>
<?php endif; ?>

<main>
    <div class="container" id="container-principal">
        <section id="apresentacao" class="container-section">
            <div id="dados-projeto">
                <h1><?= $projeto->nome ?></h1>
                <div id="valor-arrecadado">
                    <h3>Arrecadado: <span>R$ <?= number_format($valor_projeto, 0, ',', '.'); ?></span></h3>
                    <div class="barra-doacao">
                        <div class="barra">
                            <div class="barra-verde" style="width: <?= $barra ?>%;"></div>
                        </div>
                    </div>
                </div>
                <div id="progresso">
                    <p>Meta: <span>R$ <?= number_format($projeto->meta, 0, ',', '.'); ?></span></p>
                    <p>Status: Em progresso <span>(<?= $barra ?>% alcançado)</span></p>
                    <p><span><?= $qntdoadores ?></span> Doações Recebidas</p>
                </div>
                <div id="acoes">
                    <button class="btn" id="btn-doacao" onclick="abrir_popup('doacao-popup')">Fazer uma doação</button>
                    <button class="btn" id="btn-voluntario" onclick="abrir_popup('ser-voluntario-popup')">Ser Voluntário</button>
                </div>
            </div>
            <div id="imagem-ilustrativa">
                <img src="../../assets/images/pages/perfil-projeto.png" alt="">
            </div>
            <div id="carousel" class="carousel">
                <div id="carousel-imgs" class="carousel-imgs">
                    <img src="https://placeholder.pagebee.io/api/plain/400/250" class="carousel-item">
                    <img src="https://placeholder.pagebee.io/api/plain/400/250" class="carousel-item">
                    <img src="https://placeholder.pagebee.io/api/plain/400/250" class="carousel-item">
                </div>
                <div class="btn-salvar">
                    <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                    <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                </div>
            </div>
        </section>
        <div class="popup-fundo" id="carousel-popup">
            <div class="container-popup">
                <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('carousel-popup')"></button>
                <div id="carousel-big" class="carousel">
                    <div id="carousel-big-imgs" class="carousel-imgs">
                        <img src="https://placeholder.pagebee.io/api/plain/600/375" class="carousel-item-big">
                        <img src="https://placeholder.pagebee.io/api/plain/600/375" class="carousel-item-big">
                        <img src="https://placeholder.pagebee.io/api/plain/600/375" class="carousel-item-big">
                    </div>
                    <!-- <div class="btn-salvar">
                            <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                            <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                        </div> -->
                </div>
            </div>
        </div>
        <section id="painel-projeto" class="container-section">
            <div id="btns-group">
                <div class="icon-title active">
                    <img src="../../assets/images/pages/icone-sobre.png" alt="">
                    <h3>Sobre</h3>
                </div>
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-doacao.png" alt="">
                    <h3>Doadores</h3>
                </div>
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-abraco.png" alt="">
                    <h3>Voluntários</h3>
                </div>
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-medalha.png" alt="">
                    <h3>Responsável</h3>
                </div>
            </div>
            <div id="principal-painel">
                <div id="control-painel">
                    <div class="container-painel active">
                        <span id="data-criacao">Projeto criado em: <?= date('d/m/Y', strtotime($projeto->data)); ?></span>
                        <p><?= $projeto->sobre ?></p>
                    </div>
                    <div class="container-painel area-doador-voluntario">
                        <h3>DOADORES DESTE PROJETO</h3>
                        <div class="box-cards">
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                            <?php require '../../components/cards/card-doador.php'; ?>
                        </div>
                    </div>
                    <div class="container-painel area-doador-voluntario">
                        <h3>VOLUNTÁRIOS DESTE PROJETO</h3>
                        <div class="box-cards">
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                            <?php require '../../components/cards/card-voluntario.php'; ?>
                        </div>
                    </div>
                    <div class="container-painel area-doador-voluntario">
                        <h3>ONG RESPONSÁVEL</h3>
                        <div class="card-ong">
                            <div class="perfil">
                                <div class="logo">
                                    <p>Logo</p>
                                </div>
                                <div class="nome">
                                    <h2>Nome da ONG</h2>
                                    <p>Área de Atuação</p>
                                </div>
                            </div>
                            <div class="acoes-ong">
                                <a href="perfil-ong.php" class="saiba-mais-ong">Conhecer ONG</a>
                                <div class="btn-salvar">
                                    <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                                    <button id="like" class="fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
$jsPagina = ['perfil-projeto.js'];
require_once '../../components/footer-doador.php';
?>