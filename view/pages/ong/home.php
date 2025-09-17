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
    <h1>Finalizar cadastro</h1>
    <h3>Adicione uma foto de perfil</h3>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="image" class="input_label">
            <p>Procurar Imagem</p>
        </label>

        <input type="file" id="image" name="imagem" accept="image/*" required hidden>
        <button type="submit">Enviar</button>
    </form>

    <span id="imageName">Nenhum arquivo selecionado</span>
</div>


        <script>
            const inputFile = document.getElementById("image");
            const imageName = document.getElementById("imageName");

            inputFile.addEventListener("change", () => {
                if (inputFile.files.length > 0) {
                    imageName.textContent = inputFile.files[0].name;
                } else {
                    imageName.textContent = "Nenhum arquivo selecionado";
                }
            });
        </script>

    </section>
</main>

<!-- Toast -->
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
// Mostra toast se existir mensagem na sessão
if (isset($_SESSION['toast'])) {
    $toast = $_SESSION['toast'];
    $tipo = $_SESSION['toast_tipo'] ?? 'success'; // success, error, warning, info

    echo "<script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: '$tipo',
            title: '$toast'
        });
    </script>";

    // Limpa a mensagem para não repetir
    unset($_SESSION['toast']);
    unset($_SESSION['toast_tipo']);
}
?>


<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
// Ativar os toast
if (isset($_SESSION['cadastro-ong'])) {
    echo "<script>mostrar_toast('toast-cadastro-ong')</script>";
    unset($_SESSION['cadastro-ong']);
}
?>