<?php
ob_start();
//Lógica e dependências primeiro
require_once __DIR__ . '/../../../autoload.php';
$projetoModel = new Projeto();

//Definições da página
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Sobre o Projeto | Organizer';
$cssPagina = ['projeto/perfil.css'];
require_once '../../components/layout/base-inicio.php';

//Processamento de dados
if (isset($_GET['id'])) {
    $IdProjeto = $_GET['id'];
    $PerfilProjeto = $projetoModel->buscarPerfilProjeto($IdProjeto);
    $DoadoresProjeto = $projetoModel->buscarDoadoresProjeto($IdProjeto);
    $ApoiadoresProjeto = $projetoModel->buscarApoiadoresProjeto($IdProjeto);
    $ImagensProjeto = $projetoModel->buscarImagensProjeto($IdProjeto);
}

//Chamar os Toasts e Popups 
if (!empty($PerfilProjeto['projeto_id'])) {
    require_once 'partials/toast-projeto.php';
    require_once 'partials/popups-projeto.php';
}

//Verificar se o doador marcou este projeto como favorito
if (isset($_SESSION['usuario']['id']) && $_SESSION['perfil_usuario'] === 'doador') {
    $projetosFavoritos = $projetoModel->listarFavoritos($_SESSION['usuario']['id']);
}
ob_end_flush();
?>
<main>
    <div class="container" id="container-principal">
        <?php if (!isset($_GET['id']) || empty($PerfilProjeto['projeto_id'])): ?>
            <h2>ERRO AO ENCONTRAR PROJETO!</h2>
        <?php else: ?>
            <section id="apresentacao" class="container-section">
                <div id="dados-projeto">
                    <h1><?= $PerfilProjeto['nome'] ?></h1>
                    <div id="valor-arrecadado">
                        <h3>Arrecadado: <span>R$ <?= number_format($PerfilProjeto['valor_arrecadado'], 0, ',', '.'); ?></span></h3>
                        <div class="barra-doacao">
                            <div class="barra">
                                <div class="barra-verde" style="width: <?= $PerfilProjeto['barra'] ?>%;"></div>
                            </div>
                        </div>
                    </div>
                    <div id="progresso">
                        <p>Meta: <span>R$ <?= number_format($PerfilProjeto['meta'], 0, ',', '.'); ?></span></p>
                        <p>Status: <span>(<?= $PerfilProjeto['barra'] ?>% alcançado)</span></p>
                        <p><span><?= array_sum(array_column($DoadoresProjeto, 'qtd_doacoes')); ?></span> Doações Recebidas</p>
                        <p><span><?= count($ApoiadoresProjeto) ?></span> Apoios Recebidos</p>
                    </div>
                    <!-- Botão de Acões do Projeto -->
                    <?php require_once 'partials/acoes-projeto.php'; ?>
                </div>
                <div id="imagem-ilustrativa">
                    <img src="../../assets/images/pages/shared/projeto-lampada.png">
                </div>
                <div id="carousel" class="carousel">
                    <div id="carousel-imgs" class="carousel-imgs">
                        <?php if ($ImagensProjeto) {
                            foreach ($ImagensProjeto as $imagem) {
                                echo "<img src='{$imagem['logo_url']}' class='carousel-item'>";
                            }
                        } else {
                            echo "<img src='../../assets/images/global/image-placeholder.svg' class='carousel-item'>";
                        } ?>
                    </div>
                    <div class="btn-salvar">
                        <button class="btn-share fa-solid fa-share-nodes" onclick="compartilhar('compartilhar-popup', <?= $_GET['id'] ?>, 'projeto')"></button>
                        <?php if (!isset($_SESSION['usuario']['id'])): ?>
                            <button title="Favoritar" class="btn-like fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>

                        <?php elseif (!isset($_SESSION['perfil_usuario']) || $_SESSION['perfil_usuario'] === 'doador') : ?>
                            <?php $classe = in_array($projeto['projeto_id'], $projetosFavoritos) ? 'favoritado' : ''; ?>
                            <form action="../.././../controller/Projeto/FavoritarProjetoController.php" method="POST">
                                <input type="hidden" name="projeto-id" value="<?= $IdProjeto ?>">
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
                            <?php if ($ImagensProjeto) {
                                foreach ($ImagensProjeto as $imagem) {
                                    echo "<img src='{$imagem['logo_url']}' class='carousel-item-big'>";
                                }
                            } else {
                                echo "<img src='../../assets/images/global/image-placeholder.svg' class='carousel-item-big'>";
                            } ?>
                        </div>

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
                            <span id="data-criacao">Criado em <?= date('d/m/Y', strtotime($PerfilProjeto['data_cadastro'])); ?></span>
                            <p><?= $PerfilProjeto['descricao'] ?></p>
                        </div>
                        <div class="container-painel area-doador-voluntario">
                            <h3><i class="fa-solid fa-hand-holding-dollar"></i> DOADORES DESTE PROJETO</h3>
                            <div class="box-cards">
                                <?php
                                if ($DoadoresProjeto) {
                                    foreach ($DoadoresProjeto as $doador) {
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
                                if ($ApoiadoresProjeto) {
                                    foreach ($ApoiadoresProjeto as $apoiador) {
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
                                            <img src="<?= $PerfilProjeto['logo_ong'] ?? '../../assets/images/global/image-placeholder.svg' ?>">
                                        </div>
                                        <div class="nome">
                                            <h2><?= $PerfilProjeto['nome_ong'] ?></h2>
                                            <!-- <p>Área de Atuação</p> -->
                                        </div>
                                    </div>
                                    <div class="acoes-ong">
                                        <a href="../ong/perfil.php?id=<?= $PerfilProjeto['ong_id'] ?>" class="saiba-mais-ong">Conhecer ONG</a>
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
// Chamar a lógica dos toasts
require_once 'partials/alertas-toast.php';
?>