<?php
require_once __DIR__ . '/../../model/UsuarioModel.php';

require_once __DIR__ . '/../../session_config.php';

$usuarioModel = new UsuarioModel();

$perfilUsuario = $_POST['perfil'];

// Verificar se o usuário tem uma ONG
if ($perfilUsuario === 'ong') {
    $ongExiste = $usuarioModel->buscarOngUsuario($_SESSION['usuario']['id']);
    if (!$ongExiste) {
        header("Location: ../../view/pages/ong/cadastro.php");
        exit;
    }
    $_SESSION['ong_id'] = $ongExiste;
}

// Leva para home do acesso escolhido
$_SESSION['perfil_usuario'] = $perfilUsuario;
header("Location: ../../view/pages/{$perfilUsuario}/home.php");
exit;
