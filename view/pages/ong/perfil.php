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
    $PerfilOng = $ongModel->buscarId($IdOng);
    $PerfilOngStats = $ongModel->buscarPerfilOng($IdOng);
    $ProjetosOng = $projetoModel->listarCardsProjetos(['ong_id' => $IdOng, 'limit' => 50, 'status' => ['ATIVO', 'FINALIZADO']]);
    $NoticiasOng = $noticiaModel->listarCardsNoticias(['ong_id' => $IdOng, 'limit' => 50, 'status' => 'ATIVO']);
    $DoadoresOng = $ongModel->buscarDoadores($IdOng);

    // 🔹 Busca o caminho da imagem com base no imagem_id
    if (!empty($PerfilOng['imagem_id'])) {
        $caminho = $ongModel->buscarCaminhoImagem($PerfilOng['imagem_id']);
        $FotoOng = '../../../' . $caminho;
    } else {
        $FotoOng = '../../assets/images/global/image-placeholder.svg';
    }
}

//Verificar se o doador marcou este projeto como favorito
if ($acesso === 'doador') {
    $favoritos = $projetoModel->listarFavoritos($_SESSION['usuario']['id']);
    $favoritas = $ongModel->listarFavoritas($_SESSION['usuario']['id']);
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
                        <?php $classe = in_array($PerfilOng['ong_id'], $favoritas) ? 'favoritado' : ''; ?>
                        <button data-id="<?= $IdOng ?>" data-tipo="ong" title="Favoritar" class="btn-like fa-solid fa-heart <?= $classe ?>"></button>
                    <?php endif; ?>
                </div>
            </div>
            <div id="dados-ong" class="ong-card">
                <h1 class="ong-nome"><?= $PerfilOng['nome'] ?></h1>

                <div class="info-bloco arrecadado">
                    <span class="info-label">Arrecadado</span>
                    <span class="info-valor">R$ <?= number_format($PerfilOngStats['total_arrecadado'], 0, ',', '.'); ?></span>
                </div>

                <div class="info-resumo">
                    <div class="info-item">
                        <span class="info-numero"><?= $PerfilOngStats['total_projetos'] ?></span>
                        <span class="info-texto">Projetos</span>
                    </div>
                    <div class="info-item">
                        <span class="info-numero"><?= $PerfilOngStats['total_doacoes'] ?></span>
                        <span class="info-texto">Doações Recebidas</span>
                    </div>
                    <div class="info-item">
                        <span class="info-numero"><?= $PerfilOngStats['total_apoiadores'] ?></span>
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
                <small>Criada em <?= date('d/m/Y', strtotime($PerfilOngStats['data_cadastro'])); ?></small>
                <p><?= $PerfilOngStats['descricao'] ?></p>
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
                    if ($DoadoresOng) {
                        foreach ($DoadoresOng as $doador) {
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
                    if ($NoticiasOng) {
                        foreach ($NoticiasOng as $noticia) {
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
                    if ($ProjetosOng) {
                        foreach ($ProjetosOng as $projeto) {
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
require_once '../../components/layout/footer/footer-logado.php';
?>