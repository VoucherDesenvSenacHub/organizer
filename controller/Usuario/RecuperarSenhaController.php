<?php
require_once __DIR__ . '/../../model/UsuarioModel.php';

session_start();

$usuarioModel = new UsuarioModel();

$email = $_POST['email'];

// Verificar se o email existe no banco
$usuario = $usuarioModel->login($email);

// Se existir, gerar token
if ($usuario) {
    $token = bin2hex(random_bytes(32));
    // O token pode ser usado para implementar a recuperação de senha
}

$_SESSION['mensagem_toast'] = ['info', 'Email enviado com sucesso!'];
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
