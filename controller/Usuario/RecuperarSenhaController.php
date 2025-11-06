<?php

require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../../services/EmailService.php";
require_once __DIR__ . "/../../exceptions/EmailException.php";

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

global $pdo;

$sql = "UPDATE usuarios
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $pdo->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();

session_start();

// Verifica se o email existe no sistema
if ($pdo->affected_rows > 0) {
    try {
        $emailService = new EmailService();
        
        // Gera o link de recuperação
        $linkRecuperacao = "http://" . $_SERVER['HTTP_HOST'] . "/organizer/view/pages/visitante/reset-password.php?token=" . $token;
        
        $emailService->enviarEmailRedefinirSenha($email, $linkRecuperacao);
        
        $_SESSION['mensagem_toast'] = ['info', 'Email de recuperação enviado! Verifique sua caixa de entrada.'];
        
    } catch (EmailException $e) {
        $_SESSION['mensagem_toast'] = ['error', 'Erro no email: ' . $e->getMessage()];
        
    } catch (Exception $e) {
        // Erro
        $_SESSION['mensagem_toast'] = ['error', 'Erro interno. Tente novamente mais tarde.'];
        
        // (opcional)
        error_log("Erro no RecuperarSenhaController: " . $e->getMessage());
    }
    
} else {
    // Por segurança é bom, mesmo se o email não existir, mostrar uma mensagem mais genérica
    $_SESSION['mensagem_toast'] = ['info', 'Se o email estiver cadastrado, você receberá um link de recuperação.'];
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
