<header>
    <div class="container">
        <a class="logo" href="../ong/home.php">
            <img src="../../assets/images/global/logo.png">
            <h1>Organizer</h1>
        </a>
        <nav id="nav-bar">
            <ul>
                <li><a href="../ong/home.php">Home</a></li>
                <li><a href="../ong/lista.php">Ongs</a></li>
                <li><a href="../projeto/lista.php">Projetos</a></li>
                <li><a href="../noticia/lista.php">Notícias</a></li>
            </ul>
        </nav>
       <div id="doador-nav">
            <button id="img-doador" onclick="abrir_popup('perfil-doador-popup')" title="Meu Perfil">
                <img id="preview-foto" src="<?= !empty($_SESSION['usuario']['foto'])
                        ? '../../../' . $_SESSION['usuario']['foto']
                        : 'view/assets/images/global/user-placeholder.jpg'
                        ?>">
            </button>
            <button onclick="menu_mobile()" id="hamburguer"></button>
        </div>
    </div>
</header>

<!-- ASIDE -->
<main id="container-principal">
    <div class="container">
        <?php require_once __DIR__ . '/../asides/aside-ong.php'; ?>
        <div id="container-conteudo">