<?php require_once '../../../controller/verificarLoginDoador.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($tituloPagina) ? $tituloPagina : 'Sem Nome'; ?></title>
    <!-- LINK DO FONT-AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS GLOBAL -->
    <link rel="stylesheet" href="../../assets/css/global/style.css">

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
    <header>
        <div class="container">
            <div class="logo">
                <img src="../../assets/images/global/Logo-Organizer.png">
                <h1>Organizer</h1>
            </div>
            <nav id="nav-bar">
                <ul>
                    <li><a href="novo-home.php">Home</a></li>
                    <li><a href="ongs.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'ongs.php') ? 'active' : ''; ?>">Ongs</a></li>
                    <li><a href="projetos.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'projetos.php') ? 'active' : ''; ?>">Projetos</a></li>
                    <li><a href="noticias.php">Notícias</a></li>
                </ul>
            </nav>
            <!-- <div class="btn-login">
                <button class="btn" id="openPopup" onclick="abrir_popup('escolher-login-popup')">LOGIN</button>
                <button onclick="menu_mobile()" id="hamburguer"></button>
            </div> -->
            <div id="doador-nav">
                <button id="img-doador">
                    <img src="../../assets/images/pages/perfil_julia.png" alt="">
                </button>
                <button onclick="menu_mobile()" id="hamburguer"></button>
            </div>
        </div>
    </header>
    <?php
        require_once '../../components/popup/compartilhar.php'; //POPUP DE COMPARTILHAR
    ?>
    <div id="sair-doador">
        <?php
        require_once 'popup/logoff.php';
        ?>
    </div>
    <main id="main-doador">
        <div class="container">
            <?php require_once '../../components/aside-doador.php'; ?>
            <div id="container-conteudo">