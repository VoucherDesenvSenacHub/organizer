<?php
$acesso = 'ong';
$tituloPagina = 'Home | Organizer';
$cssPagina = ['ong/home.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$ongModel = new OngModel();
$IdOng = $_SESSION['ong_id'];
$DashboardOng = $ongModel->dashboardOng($IdOng);
$UltimasAtividades = $ongModel->ultimasAtividadesOng($IdOng);
var_dump($_SESSION['erro']);
?>
<main class="conteudo-principal">
    <section>
        <div id="title">
            <h1> <?= $DashboardOng['nome'] ?></h1>
            <!-- <p>PAINEL</p> -->
        </div>
        <div id="resumo">
            <a class="resumo-item" href="relatorios.php">
                <?php $TotalDoacao = $DashboardOng['total_doacoes'] ?? 0; ?>
                <h3>R$ <?= number_format($TotalDoacao, 0, ',', '.'); ?> <span>DOAÇÕES</span></h3>
                <i class="fa-solid fa-coins"></i>
            </a>
            <a class="resumo-item" href="projetos.php">
                <h3><?= $DashboardOng['total_projetos'] ?> <span>PROJETOS</span></h3>
                <i class="fa-solid fa-diagram-project"></i>
            </a>
            <a class="resumo-item" href="relatorios.php">
                <h3><?= $DashboardOng['total_apoios'] ?> <span>APOIADORES</span></h3>
                <i class="fa-solid fa-hand-holding-heart"></i>
            </a>
            <a class="resumo-item" href="noticias.php">
                <h3><?= $DashboardOng['total_noticias'] ?> <span>NOTÍCIAS</span></h3>
                <i class="fa-solid fa-newspaper"></i>
            </a>
        </div>
        <!-- REMOVIDO POIS ESTAVA SE REPETINDO MUITO A MESMA NAVEGAÇÃO -->
        <!-- <nav id="nav-home">
        <a href="noticias.php"><img src="../../assets/images/icons/gif-noticia.gif" alt=""><span>NOTÍCIAS</span></a>
        <a href="projetos.php"><img src="../../assets/images/icons/gif-projeto.gif" alt=""><span>PROJETOS</span></a>
        <a href="conta.php"><img src="../../assets/images/icons/gif-perfil.gif" alt=""><span>PERFIL</span></a>
        <a href="apoiadores.php"><img src="../../assets/images/icons/gif-voluntario.gif" alt=""><span>APOIADORES</span></a>
        <a href="relatorios.php"><img src="../../assets/images/icons/gif-relatorio.gif" alt=""><span>RELATÓRIOS</span></a>
    </nav> -->
        <?php
        if ($UltimasAtividades): ?>
            <section id="atividades-recentes">
                <h4>ATIVIDADES RECENTES</h4>
                <div class="box-cards">
                    <?php foreach ($UltimasAtividades as $atividade) {
                        require '../../components/cards/card-atividades-ong.php';
                    } ?>
                </div>
            </section>
        <?php endif ?>

        <div class="upload_imagem_perfil">
            <h1>FINALIZAR CADASTRO</h1>
            <h3>Adicione uma foto de perfil</h3>
            <form action="../../../controller/Ong/EditarPerfilController.php" method="POST"
                enctype="multipart/form-data">
                <input type="hidden" name="atualizar-ong" value="true">
                <label for="fotoPerfil">
                    <i class="fa-solid fa-image"></i>
                    <p>Procurar Imagem</p>
                </label>
                <input type="file" id="fotoPerfil" name="foto_perfil" accept="image/*" required>
                <div class="image-preview" id="imagePreview" style="display: none;">
                    <img id="previewImg" src="" alt="Preview">
                    <div class="preview-actions">
                        <button type="button" class="btn" onclick="removeImage()">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn" id="btnSubmit" disabled>Enviar</button>
            </form>
            <span id="imageName">Nenhum arquivo selecionado</span>
        </div>
    </section>
</main>
<?php
$jsPagina = ['ong/home.js'];
require_once '../../components/layout/footer/footer-logado.php';
?>