<?php
ob_start();
//Lógica e dependências primeiro
require_once __DIR__ . '/../../../autoload.php';
$projetoModel = new Projeto();
$ongModel = new Ong();

//Definições da página (título e CSS)
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Sobre o Projeto | Organizer';
$cssPagina = ['projeto/perfil.css'];
require_once '../../components/layout/base-inicio.php';

//Processamento de dados
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $projeto = $projetoModel->buscarId($id);
    $valor_projeto = $projetoModel->buscarValor($id);
    $qntdoadores = $projetoModel->contarDoadores($id);
    $barra = round(($valor_projeto / $projeto->meta) * 100);
    $doadores_projeto = $projetoModel->buscarDoadores($id);
    $imagens_projeto = $projetoModel->buscarImagens($id);
    if ($projeto) {
        $ong = $ongModel->buscarPerfil($projeto->ong_id);
    }
}
// Editar o Projeto (ONG)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['perfil_usuario'] == 'ong' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $meta = $_POST['meta'];
    if ($meta < $valor_projeto) {
        echo "<script>alert('Meta inválida: o valor deve ser maior do que o que já foi arrecadado.')</script>";
    } else {
        $projetoModel->editar($id, $nome, $descricao, $meta);
    }
}
// Fazer doação (doador)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['perfil_usuario'] === 'doador') {
    $valor = $_POST['valor'];
    if ($valor == 'outro') {
        $valor = $_POST['outro-valor'];
    }
    if ($valor + $valor_projeto > $projeto->meta) {
        echo "<script>alert('O valor ultrapassou a meta!! doe um valor menor.')</script>";
    } else {
        $doacao = $projetoModel->doacao($projeto->projeto_id, $_SESSION['usuario_id'], $valor);
        if ($doacao > 0) {
            header("Location: perfil.php?id=$id&msg=doacao");
            exit;
        }
    }
}

require_once 'partials/popups-projeto.php';
require_once 'partials/toast-projeto.php';
ob_end_flush();
?>
<main>
    <div class="container" id="container-principal">
        <?php
        if (!isset($_GET['id']) || !$projeto) {
            exit('<h2>ERRO AO ENCONTRAR PROJETO!</h2>');
        }
        ?>
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
                <!-- Botão de Acões do Projeto -->
                <?php require_once 'partials/acoes-projeto.php'; ?>
            </div>
            <div id="imagem-ilustrativa">
                <img src="../../assets/images/pages/perfil-projeto.png" alt="">
            </div>
            <div id="carousel" class="carousel">
                <div id="carousel-imgs" class="carousel-imgs">
                    <?php if ($imagens_projeto) {
                        foreach ($imagens_projeto as $imagem) {
                            echo "<img src='$imagem->logo_url' class='carousel-item'>";
                        }
                    } else {
                        echo "<img src='../../assets/images/global/image-placeholder.svg' class='carousel-item'>";
                    } ?>
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
                        <?php if ($imagens_projeto) {
                            foreach ($imagens_projeto as $imagem) {
                                echo "<img src='$imagem->logo_url' class='carousel-item-big'>";
                            }
                        } else {
                            echo "<img src='../../assets/images/global/image-placeholder.svg' class='carousel-item-big'>";
                        } ?>
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
                    <img src="../../assets/images/pages/icone-apoio.png" alt="">
                    <h3>Apoiadores</h3>
                </div>
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-medalha.png" alt="">
                    <h3>Responsável</h3>
                </div>
            </div>
            <div id="principal-painel">
                <div id="control-painel">
                    <div class="container-painel active">
                        <span id="data-criacao">Criado em <?= date('d/m/Y', strtotime($projeto->data_cadastro)); ?></span>
                        <p><?= $projeto->descricao ?></p>
                    </div>
                    <div class="container-painel area-doador-voluntario">
                        <h3><i class="fa-solid fa-hand-holding-dollar"></i> DOADORES DESTE PROJETO</h3>
                        <div class="box-cards">
                            <?php
                            if ($doadores_projeto) {
                                foreach ($doadores_projeto as $doador) {
                                    require '../../components/cards/card-doador.php';
                                }
                            } else {
                                echo '<h4>Este Projeto não recebeu doações! <i class="fa-regular fa-face-frown"></i></h4>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="container-painel area-doador-voluntario">
                        <h3><i class="fa-solid fa-hand-holding-heart"></i> APOIADORES DESTE PROJETO</h3>
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
                        <h3><i class="fa-solid fa-house-flag"></i> ONG RESPONSÁVEL</h3>
                        <div class="card-ong">
                            <div class="perfil">
                                <div class="logo">
                                    <img src="<?= $ong->logo_url ?>">
                                </div>
                                <div class="nome">
                                    <h2><?= $ong->nome ?></h2>
                                    <!-- <p>Área de Atuação</p> -->
                                </div>
                            </div>
                            <div class="acoes-ong">
                                <a href="../ong/perfil.php?id=<?= $projeto->ong_id ?>" class="saiba-mais-ong">Conhecer ONG</a>
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
require_once '../../components/layout/footer/footer-logado.php';
?>