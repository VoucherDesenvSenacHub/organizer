<?php

$token = $_POST["token"];

$token_hash = hash("sha256", $token);

require_once __DIR__ . "/../../config/database.php";

global $pdo;

$sql = "SELECT * FROM usuarios
        WHERE reset_token_hash = ?";

$stmt = $pdo->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("Token não encontrado");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token expirado");
}

if (strlen($_POST["password"]) < 8) {
    die("A senha deve ter pelo menos 8 caracteres");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("A senha deve conter pelo menos uma letra");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("A senha deve conter pelo menos um número");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("As senhas devem ser iguais");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "UPDATE usuarios
        SET senha = ?,
            reset_token_hash = NULL,
            reset_token_expires_at = NULL
        WHERE usuario_id = ?";

$stmt = $pdo->prepare($sql);

$stmt->bind_param("ss", $password_hash, $user["usuario_id"]);

$stmt->execute();

session_start();
$_SESSION['mensagem_toast'] = ['success', 'Senha atualizada com sucesso! Faça login com a nova senha.'];
header('Location: ../../../view/pages/visitante/login.php');
exit;