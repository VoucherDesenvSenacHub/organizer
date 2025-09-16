<?php
session_start();
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Sobre a ONG | Organizer';
$cssPagina = ['ong/perfil.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$ongModel = new OngModel();
$projetoModel = new ProjetoModel();
$noticiaModel = new NoticiaModel();
if (isset($_GET['id'])) {
    $IdOng = $_GET['id'];
    $PerfilOng = $ongModel->buscarPerfilOng($IdOng);
    $projetos_ong = $projetoModel->listarCardsProjetos('ong', ['ong_id' => $IdOng, 'limit' => 50]);
    $noticias_ong = $noticiaModel->listarCardsNoticias('ong', ['ong_id' => $IdOng]);
    $doadores_ong = $ongModel->buscarDoadores($IdOng);
    $FotoOng = $PerfilOng['caminho'] ?? '../../assets/images/global/image-placeholder.svg';
}

//Verificar se o doador marcou este projeto como favorito
if ($acesso === 'doador') {
    $projetosFavoritos = $projetoModel->listarFavoritos($_SESSION['usuario']['id']);
    $ongsFavoritas = $ongModel->listarFavoritas($_SESSION['usuario']['id']);
}
?>
<main <?php if ($acesso === 'doador') echo 'class="usuario-logado"'; ?>>
    <div class="container" id="tela-principal">
        <?php
        if (!isset($_GET['id']) || !$PerfilOng) {
            exit('<h2>ERRO AO ENCONTRAR ONG!</h2>');
        }
        ?>
        <section id="apresentacao" class="container-section">
            <div id="logo-ong">
                <img src="<?= $FotoOng ?>">
                <div class="btn-salvar">
                    <button title="Compartilhar" class="btn-share fa-solid fa-share-nodes" onclick="compartilhar('compartilhar-popup', <?= $IdOng ?>, 'ong')"></button>
                    <?php if (!isset($_SESSION['usuario']['id'])): ?>
                        <button title="Favoritar" class="btn-like fa-solid fa-heart" onclick="abrir_popup('login-obrigatorio-popup')"></button>
                    <?php elseif (!isset($_SESSION['perfil_usuario']) || $_SESSION['perfil_usuario'] === 'doador') : ?>
                        <?php $classe = in_array($PerfilOng['ong_id'], $ongsFavoritas) ? 'favoritado' : ''; ?>
                        <form action="../.././../controller/Ong/FavoritarOngController.php" method="POST">
                            <input type="hidden" name="ong-id" value="<?= $IdOng ?>">
                            <button title="Favoritar" class="btn-like fa-solid fa-heart <?= $classe ?>"></button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
            <div id="dados-ong" class="ong-card">
                <h1 class="ong-nome"><?= $PerfilOng['nome'] ?></h1>

                <div class="info-bloco arrecadado">
                    <span class="info-label">Arrecadado</span>
                    <span class="info-valor">R$ <?= number_format($PerfilOng['total_arrecadado'], 0, ',', '.'); ?></span>
                </div>

                <div class="info-resumo">
                    <div class="info-item">
                        <span class="info-numero"><?= $PerfilOng['total_projetos'] ?></span>
                        <span class="info-texto">Projetos</span>
                    </div>
                    <div class="info-item">
                        <span class="info-numero"><?= $PerfilOng['total_doacoes'] ?></span>
                        <span class="info-texto">Doações Recebidas</span>
                    </div>
                    <div class="info-item">
                        <span class="info-numero"><?= $PerfilOng['total_apoiadores'] ?></span>
                        <span class="info-texto">Apoiadores</span>
                    </div>
                </div>
                <!-- Botões -->
                <?php require_once 'partials/acoes-ong.php'; ?>
            </div>

            <div id="imagem">
                <img src="../../assets/images/pages/shared/time-bandeira.png">
            </div>
        </section>
        <section class="container-section">
            <div class="section-item" id="sobre">
                <div class="icon-title">
                    <img src="../../assets/images/icons/icon-sobre.png">
                    <h3>Sobre</h3>
                </div>
                <small>Criada em <?= date('d/m/Y', strtotime($PerfilOng['data_cadastro'])); ?></small>
                <p><?= $PerfilOng['descricao'] ?></p>
            </div>
        </section>
        <section class="container-section" id="apoiadores">
            <div class="section-item">
                <div class="icon-title">
                    <img src="../../assets/images/icons/icon-doacao.png">
                    <h3>Doadores</h3>
                </div>
                <div class="mini-cards">
                    <?php
                    if ($doadores_ong) {
                        foreach ($doadores_ong as $doador) {
                            require '../../components/cards/card-doador.php';
                        }
                    } else {
                        echo '<h4>Está ONG não recebeu doações! <i class="fa-regular fa-face-frown"></i></h4>';
                    }
                    ?>
                </div>
            </div>
        </section>
        <section class="container-section">
            <div class="section-item" id="noticias">
                <div class="icon-title">
                    <img src="../../assets/images/icons/icon-megafone.png" alt="">
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
                    <img src="../../assets/images/icons/icon-lampada.png" alt="">
                    <h3>Projetos</h3>
                </div>
                <div class="mini-cards">
                    <?php
                    if ($projetos_ong) {
                        foreach ($projetos_ong as $projeto) {
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

<!-- Toasts -->
<div id="toast-favorito" class="toast">
    <i class="fa-solid fa-heart"></i>
    Adicionado aos favoritos!
</div>
<div id="toast-remover-favorito" class="toast erro">
    <i class="fa-solid fa-heart-crack"></i>
    Removido dos favoritos!
</div>

<?php
$jsPagina = [];
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