<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($tituloPagina) ? $tituloPagina : 'Sem Nome'; ?></title>
    <!-- LINK DO FONT-AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="icon" type="image/x-icon" href="../../assets/images/global/Logo-Organizer.png">
    <!-- CSS GLOBAL -->
    <link rel="stylesheet" href="../../assets/css/global/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined">

    <!-- CSS Específicos da Página -->
    <?php
    if (isset($cssPagina) && is_array($cssPagina)) {
        foreach ($cssPagina as $css) {
            echo '<link rel="stylesheet" href="../../assets/css/pages/' . $css . '">' . PHP_EOL;
        }
    }
    ?>
</head>

<body>
    <!-- NAVBAR -->
    <header>
        <div class="container">
            <a class="logo" href="../../../index.php">
                <img src="../../assets/images/global/Logo-Organizer.png">
                <h1>Organizer</h1>
            </a>
            <nav id="nav-bar">
                <ul>
                    <li><a href="../../../index.php">Home</a></li>
                    <li><a href="../visitante/ongs.php"
                            class="<?= (basename($_SERVER['PHP_SELF']) == 'ongs.php') ? 'active' : ''; ?>">Ongs</a></li>
                    <li><a href="../visitante/projetos.php"
                            class="<?= (basename($_SERVER['PHP_SELF']) == 'projetos.php') ? 'active' : ''; ?>">Projetos</a>
                    </li>
                    <li><a href="../visitante/noticias.php">Notícias</a></li>
                </ul>
            </nav>
            <div class="btn-login">
                <a href="login.php"><button class="btn">LOGIN</button></a>
                <button onclick="menu_mobile()" id="hamburguer"></button>
            </div>
        </div>
    </header>
    <?php
    require_once 'popup/login-obrigatorio.php'; //POPUP LOGIN OBRIGATORIO
    require_once 'popup/compartilhar.php'; //POPUP DE COMPARTILHAR
    ?>