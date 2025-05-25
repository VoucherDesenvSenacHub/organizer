<?php
$perfil = $_SESSION['perfil_usuario'] ?? 'visitante';
if ($perfil === 'ong') {
    require_once __DIR__ . '/../../components/popup/formulario-projeto.php';
    require_once __DIR__ . '/../../components/popup/inativar-projeto.php';
} else if ($perfil === 'doador') {
    require_once __DIR__ . '/../../components/popup/ser-voluntario.php';
    require_once __DIR__ . '/../../components/popup/doacao.php';
}