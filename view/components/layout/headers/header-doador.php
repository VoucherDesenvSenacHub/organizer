<header>
    <div class="container">
        <a class="logo" href="home.php">
            <img src="../../assets/images/global/Logo-Organizer.png">
            <h1>Organizer</h1>
        </a>
        <nav id="nav-bar">
            <ul>
                <li><a href="../doador/home.php">Home</a></li>
                <li><a href="../doador/ongs.php">Ongs</a></li>
                <li><a href="../doador/projetos.php">Projetos</a></li>
                <li><a href="../doador/noticias.php">Notícias</a></li>
            </ul>
        </nav>
        <div id="doador-nav">
            <button id="img-doador" onclick="abrir_popup('perfil-doador-popup')" title="Meu Perfil">
                <img src="../../assets/images/pages/perfil_julia.png" alt="">
            </button>
            <button onclick="menu_mobile()" id="hamburguer"></button>
        </div>
    </div>
</header>

<!-- ASIDE -->
<main id="main-doador">
    <div class="container">
        <?php require_once '../../components/aside-doador.php'; ?>
        <div id="container-conteudo">