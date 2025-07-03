<?php
$perfil = $_SESSION['perfil_usuario'] ?? 'visitante';

require_once __DIR__ . '/../../popup/compartilhar.php';
switch ($perfil) {
    case 'doador':
        require_once __DIR__ . '/../../popup/perfil-doador.php';
        require_once __DIR__ . '/../../popup/nova-senha-doador.php';
        require_once __DIR__ . '/../../popup/logoff.php';
        break;

    case 'ong':
        require_once __DIR__ . '/../../popup/perfil-doador.php';
        require_once __DIR__ . '/../../popup/nova-senha-doador.php';
        require_once __DIR__ . '/../../popup/logoff.php';
        break;

    case 'adm':
        require_once __DIR__ . '/../../popup/perfil-doador.php';
        require_once __DIR__ . '/../../popup/nova-senha-doador.php';
        require_once __DIR__ . '/../../popup/logoff.php';
        break;
        
    default:
        require_once __DIR__ . '/../../popup/login-obrigatorio.php';
        break;
}