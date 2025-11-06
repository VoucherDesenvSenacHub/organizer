<?php
require_once __DIR__ . '/../../model/UsuarioModel.php';

session_start();

$usuarioModel = new UsuarioModel();

$novaSenha = $_POST['nova_senha'];
$confirmarSenha = $_POST['confirmar_senha'];

// Simulação - em um caso real seria baseado no token
$usuarioId = 1; // Placeholder

// Verificar se as senhas coincidem
if ($novaSenha === $confirmarSenha) {
    // Atualizar senha
    $usuarioModel->updatesenha($usuarioId, $novaSenha);
    
    $_SESSION['mensagem_toast'] = ['success', 'Senha atualizada com sucesso!'];
    header('Location: ../../../view/pages/visitante/login.php');
} else {
    $_SESSION['mensagem_toast'] = ['error', 'As senhas não coincidem!'];
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
exit;