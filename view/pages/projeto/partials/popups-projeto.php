<?php
$perfil = $_SESSION['perfil_usuario'] ?? 'visitante';
switch ($perfil) {
    case 'doador':
        require_once __DIR__ . '/../../../components/popup/doacao.php';
        require_once __DIR__ . '/../../../components/popup/apoiar.php';
        break;
    case 'ong':
        require_once __DIR__ . '/../../../components/popup/formulario-projeto.php';
        require_once __DIR__ . '/../../../components/popup/finalizar-projeto.php';
        break;
    case 'adm':
        require_once __DIR__ . '/../../../components/popup/formulario-projeto.php';
        require_once __DIR__ . '/../../../components/popup/finalizar-projeto.php';
        break;
    default:
        break;
}
