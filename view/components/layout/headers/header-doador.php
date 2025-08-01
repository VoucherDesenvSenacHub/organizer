<header>
    <div class="container">
        <a class="logo" href="../doador/home.php">
            <img src="../../assets/images/global/Logo-Organizer.png">
            <h1>Organizer</h1>
        </a>
        <nav id="nav-bar">
            <ul>
                <li><a href="../doador/home.php">Home</a></li>
                <li><a href="../ong/lista.php">Ongs</a></li>
                <li><a href="../projeto/lista.php">Projetos</a></li>
                <li><a href="../noticia/lista.php">Notícias</a></li>
            </ul>
        </nav>
        <div id="doador-nav">
            <button id="img-doador" onclick="abrir_popup('perfil-doador-popup')" title="Meu Perfil">
                <img src="<?= $_SESSION['usuario']['foto'] ?>" alt="">
            </button>
            <button onclick="menu_mobile()" id="hamburguer"></button>
        </div>
    </div>
</header>

<!-- ASIDE -->
<main id="main-doador">
    <div class="container">
        <?php require_once __DIR__ . '/../asides/aside-doador.php'; ?>
        <div id="container-conteudo">