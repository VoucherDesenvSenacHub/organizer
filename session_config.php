<?php
// Verifica dependências essenciais (vendor/autoload e .env) e encaminha para a página de tutorial
$autoloadPath = __DIR__ . '/vendor/autoload.php';
$envPath = __DIR__ . '/.env';
$dependenciasUrl = '/organizer/view/pages/dependencias.php';
// Protege de loops: quando já estamos na página de dependências, não redireciona
// Determina o arquivo atual para evitar loop de redirecionamento
$currentScript = basename($_SERVER['SCRIPT_NAME'] ?? '');
if (( !file_exists($autoloadPath) || !file_exists($envPath) ) && $currentScript !== 'dependencias.php') {
    header('Location: ' . $dependenciasUrl);
    exit;
}
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
