<?php
ob_start();
//Lógica e dependências primeiro
require_once __DIR__ . '/../../../autoload.php';
$projetoModel = new Projeto();
$ongModel = new Ong();

//Definições da página
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Sobre o Projeto | Organizer';
$cssPagina = ['projeto/perfil.css'];
require_once '../../components/layout/base-inicio.php';

//Processamento de dados
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $projeto = $projetoModel->buscarPerfil($id);
    $valor_projeto = $projetoModel->buscarValor($id);
    $qntdoadores = $projetoModel->contarDoadores($id);
    $doadores_projeto = $projetoModel->buscarDoadores($id);
    $apoiadores_projeto = $projetoModel->buscarApoiadores($id);
    $imagens_projeto = $projetoModel->buscarImagens($id);
    if ($projeto) {
        $ong = $ongModel->buscarPerfil($projeto->ong_id);
        $barra = round(($valor_projeto / $projeto->meta) * 100);
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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['perfil_usuario'] === 'doador' && isset($_POST['valor'])) {
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

// Apoiar um projeto 
if (isset($_POST['projeto-apoio-id'])) {
    $apoio = $projetoModel->apoiarProjeto($_SESSION['usuario_id'], $_POST['projeto-apoio-id']);
    if ($apoio) {
        header("Location: perfil.php?id=$id&msg=apoio");
        exit;
    }
}

if (isset($_POST['projeto-desapoiar-id'])) {
    $desapoiado = $projetoModel->desapoiarProjeto($_SESSION['usuario_id'], $_POST['projeto-desapoiar-id']);
    if ($desapoiado) {
        header("Location: perfil.php?id=$id&msg=desapoio");
        exit;
    }
}

if (isset($_GET['id']) && isset($_SESSION['usuario_id'])) {
    $jaApoiou = $projetoModel->usuarioJaApoiouProjeto($_SESSION['usuario_id'], $_GET['id']);
} else {
    $jaApoiou = false;
}
if (isset($_GET['id']) && $projeto) {
    require_once 'partials/popups-projeto.php';
}

// Buscar se é favorito
if (isset($_SESSION['usuario_id'])) {
    $projetosFavoritos = $projetoModel->listarFavoritos($_SESSION['usuario_id']);
}

require_once 'partials/toast-projeto.php';
ob_end_flush();
?>
<!-- 
    Toast de Favoritar
-->
<div id="toast-favorito" class="toast">
    <i class="fa-solid fa-heart"></i>
    Adicionado aos favoritos!
</div>
<div id="toast-remover-favorito" class="toast erro">
    <i class="fa-solid fa-heart-crack"></i>
    Removido dos favoritos!
</div>
<main>
    <div class="container" id="container-principal">
        <?php if (!isset($_GET['id']) || !$projeto): ?>
            <h2>ERRO AO ENCONTRAR PROJETO!</h2>
        <?php else: ?>
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
                        <p>Status: <span>(<?= $barra ?>% alcançado)</span></p>
                        <p><span><?= $qntdoadores ?></span> Doações Recebidas</p>
                        <p><span><?= count($apoiadores_projeto) ?></span> Apoios Recebidos</p>
                    </div>
                    <!-- Botão de Acões do Projeto -->
                    <?php require_once 'partials/acoes-projeto.php'; ?>
                </div>
                <div id="imagem-ilustrativa">
                    <img src="../../assets/images/pages/shared/projeto-lampada.png">
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
                        <?php if (!isset($_SESSION['usuario_id'])): ?>
                            <button title="Favoritar" class="btn-like fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>

                        <?php elseif (!isset($_SESSION['perfil_usuario']) || $_SESSION['perfil_usuario'] === 'doador') : ?>
                            <?php $classe = in_array($projeto->projeto_id, $projetosFavoritos) ? 'favoritado' : ''; ?>
                            <form action="../.././../controller/ProjetoController.php?acao=favoritar" method="POST">
                                <input type="hidden" name="projeto-id-favorito" value="<?= $id ?>">
                                <button title="Favoritar" class="btn-like fa-solid fa-heart <?= $classe ?>"></button>
                            </form>
                        <?php endif; ?>
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
                        <img src="../../assets/images/icons/icon-sobre.png" alt="">
                        <h3>Sobre</h3>
                    </div>
                    <div class="icon-title">
                        <img src="../../assets/images/icons/icon-doacao.png" alt="">
                        <h3>Doadores</h3>
                    </div>
                    <div class="icon-title">
                        <img src="../../assets/images/icons/icon-apoio.png" alt="">
                        <h3>Apoiadores</h3>
                    </div>
                    <?php if (!isset($_SESSION['perfil_usuario']) || $_SESSION['perfil_usuario'] !== 'ong'): ?>
                        <div class="icon-title">
                            <img src="../../assets/images/icons/icon-medalha.png" alt="">
                            <h3>Responsável</h3>
                        </div>
                    <?php endif; ?>
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
                                <?php
                                if ($apoiadores_projeto) {
                                    foreach ($apoiadores_projeto as $apoiador) {
                                        require '../../components/cards/card-apoiador.php';
                                    }
                                } else {
                                    echo '<h4>Este Projeto não recebeu apoios! <i class="fa-regular fa-face-frown"></i></h4>';
                                }
                                ?>
                            </div>
                        </div>
                        <?php if (!isset($_SESSION['perfil_usuario']) || $_SESSION['perfil_usuario'] !== 'ong'): ?>
                            <div class="container-painel area-doador-voluntario">
                                <h3><i class="fa-solid fa-house-flag"></i> ONG RESPONSÁVEL</h3>
                                <div class="card-ong">
                                    <div class="perfil">
                                        <div class="logo">
                                            <img src="<?= $ong->logo_url ?? '../../assets/images/global/image-placeholder.svg' ?>">
                                        </div>
                                        <div class="nome">
                                            <h2><?= $ong->nome ?></h2>
                                            <!-- <p>Área de Atuação</p> -->
                                        </div>
                                    </div>
                                    <div class="acoes-ong">
                                        <a href="../ong/perfil.php?id=<?= $projeto->ong_id ?>" class="saiba-mais-ong">Conhecer ONG</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
</main>

<?php
$jsPagina = ['perfil-projeto.js'];
require_once '../../components/layout/footer/footer-logado.php';
// Ativar os toast
if (isset($_SESSION['favorito'])) {
    if ($_SESSION['favorito']) {
        echo "<script>mostrar_toast('toast-favorito')</script>";
    } else {
        echo "<script>mostrar_toast('toast-remover-favorito')</script>";
    }
    unset($_SESSION['favorito']);
}
?>