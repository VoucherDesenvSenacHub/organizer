<?php
$perfil = $_SESSION['perfil_usuario'] ?? 'visitante';

switch ($perfil):
    case 'doador':
        require_once __DIR__ . '/header-doador.php';
        break;

    case 'ong':
        require_once __DIR__ . '/header-ong.php';;
        break;

    case 'adm':
        require_once __DIR__ . '/header-adm.php';;
        break;

    default:
        require_once __DIR__ . '/header-visitante.php';;
        break;
endswitch;