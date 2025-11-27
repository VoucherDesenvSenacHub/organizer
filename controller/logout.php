<?php
require_once __DIR__ . '/../session_config.php'; 

// Destrói a sessão atual
session_unset();
session_destroy();

// Remove cookie de sessão persistente (30 dias)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Inicia nova sessão apenas para exibir o toast
session_start();
$_SESSION['mensagem_toast'] = ['sucesso', 'Tchau, até mais tarde!'];

header('Location: ../view/pages/visitante/home.php');
exit;
