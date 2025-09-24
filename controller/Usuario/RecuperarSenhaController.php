<?php
require_once __DIR__ . '/../../model/UsuarioModel.php';

session_start();

$usuarioModel = new UsuarioModel();

$email = $_POST['email'];

// Tem que fazer a lógica de verificar se existe mesmo esse email no sistema.
// Se tiver, deverá ser criado uma senha aleatória e enviar para o email do usuário.

$_SESSION['mensagem_toast'] = ['info', 'Email enviado com sucesso!'];
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
