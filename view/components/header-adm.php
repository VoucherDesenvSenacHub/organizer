<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($tituloPagina) ? $tituloPagina : 'Index'; ?></title>
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
    <header id="header-adm">
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
                    <li><a href="ver-ong.php">Ongs</a></li>
                    <li><a href="ver-projetos.php">Projetos</a></li>
                    <li><a href="ver-doadores.php">Doadores</a></li>
                </ul>
            </nav>
            <div id="btns-adm">
                <a id="parceria" href="solicitacao-parcerias.php">
                    <i class="fa-solid fa-handshake"></i>
                    <span>Parcerias</span>
                </a>
                <a id="relatorio" href="relatorios.php">
                    <i class="fa-solid fa-chart-line"></i>
                    <span>Relatórios</span>
                </a>
                <button id="btn-adm-conta" onclick="ativar_classe('btn-adm-conta')">
                    <i class="fa-solid fa-user"></i>
                    <span>Conta</span>
                </button>
                <div class="dropdown">
                    <button><i class="fa-solid fa-user-pen"></i>Editar Perfil</button>
                    <button onclick="abrir_popup('sair-da-conta-popup')"><i class="fa-solid fa-right-from-bracket"></i>Sair</button>
                    </div>
                <div class="btn-login">
                    <button onclick="menu_mobile()" id="hamburguer"></button>
                </div>
            </div>
        </div>
    </header>
    <div id="sair-adm">
        <?php 
            require_once 'sair-da-conta-popup.php'; 
        ?>
    </div>