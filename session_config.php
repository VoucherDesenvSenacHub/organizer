<?php
// Tempo em segundos (30 dias)
$lifetime = 60 * 60 * 24 * 30;

// Define que o cookie da sessão dura 30 dias
session_set_cookie_params([
    'lifetime' => $lifetime,
    'path' => '/',
    'domain' => '', 
    'secure' => isset($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Lax'
]);

// Se a sessão não existir, inicia
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Atualiza a expiração do cookie a cada requisição (sliding session)
setcookie(session_name(), session_id(), time() + $lifetime, '/');
