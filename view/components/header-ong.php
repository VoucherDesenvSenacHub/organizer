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
    <header id="header-ong">
        <div class="container">
            <a href="home.php">
                <div class="logo">
                    <img src="../../assets/images/global/Logo-Organizer.png">
                    <h1>Organizer</h1>
                </div>
            </a>
            <nav id="nav-bar">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="projetos.php">Projetos</a></li>
                    <li><a href="voluntario-projetos.php">Voluntários</a></li>
                    <li><a href="relatorios.php">Relatórios</a></li>
                </ul>
            </nav>
            <div id="btns-ong">
                <button id="btn-ong-conta" onclick="ativar_classe('btn-ong-conta')">
                    <i class="fa-solid fa-user"></i>
                    <span>Conta</span>
                </button>
                <div class="dropdown">
                    <a href="perfil.php"><button><i class="fa-solid fa-user-pen"></i>Editar Perfil</button></a>
                    <button onclick="abrir_popup('sair-da-conta-popup')"><i class="fa-solid fa-right-from-bracket"></i>Sair</button>
                    </div>
                <div class="btn-login">
                    <button onclick="menu_mobile()" id="hamburguer"></button>
                </div>
            </div>
        </div>
    </header>
    <div id="sair-ong">
        <?php 
            require_once 'popup/logoff.php';
            require_once 'popup/compartilhar.php';
        ?>
    </div>