<?php

session_start();

$token = $_POST["token"];

$token_hash = hash("sha256", $token);

require_once __DIR__ . "/../../config/database.php";

global $pdo;

$sql = "SELECT * FROM usuarios
        WHERE reset_token_hash = ?";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(1, $token_hash, PDO::PARAM_STR);

$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user === null) {
    $_SESSION['mensagem_toast'] = ['error', 'Token não encontrado'];
    header('Location: ../../view/pages/visitante/reset-password.php?token=' . urlencode($token));
    exit;
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    $_SESSION['mensagem_toast'] = ['error', 'Token expirado'];
    header('Location: ../../view/pages/visitante/reset-password.php?token=' . urlencode($token));
    exit;
}

if (strlen($_POST["password"]) < 8) {
    $_SESSION['mensagem_toast'] = ['error', 'A senha deve ter pelo menos 8 caracteres'];
    header('Location: ../../view/pages/visitante/reset-password.php?token=' . urlencode($token));
    exit;
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    $_SESSION['mensagem_toast'] = ['error', 'A senha deve conter pelo menos uma letra'];
    header('Location: ../../view/pages/visitante/reset-password.php?token=' . urlencode($token));
    exit;
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    $_SESSION['mensagem_toast'] = ['error', 'A senha deve conter pelo menos um número'];
    header('Location: ../../view/pages/visitante/reset-password.php?token=' . urlencode($token));
    exit;
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    $_SESSION['mensagem_toast'] = ['error', 'As senhas devem ser iguais'];
    header('Location: ../../view/pages/visitante/reset-password.php?token=' . urlencode($token));
    exit;
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "UPDATE usuarios
        SET senha = ?,
            reset_token_hash = NULL,
            reset_token_expires_at = NULL
        WHERE usuario_id = ?";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(1, $password_hash, PDO::PARAM_STR);
$stmt->bindValue(2, $user["usuario_id"], PDO::PARAM_STR);

$stmt->execute();

$_SESSION['mensagem_toast'] = ['success', 'Senha atualizada com sucesso! Faça login com a nova senha.'];
header('Location: ../../view/pages/visitante/login.php');
exit;