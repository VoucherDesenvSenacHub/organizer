<?php
// Verifica dependências essenciais (vendor/autoload e .env) para páginas que usam autoload
$autoloadPath = __DIR__ . '/vendor/autoload.php';
$envPath = __DIR__ . '/.env';
$dependenciasUrl = '/organizer/view/pages/dependencias.php';
$currentScript = basename($_SERVER['SCRIPT_NAME'] ?? '');
if (( !file_exists($autoloadPath) || !file_exists($envPath) ) && $currentScript !== 'dependencias.php') {
    header('Location: ' . $dependenciasUrl);
    exit;
}
require_once __DIR__ . '/config/database.php';

spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/model/' . $class . '.php',
        __DIR__ . '/model/' . $class . 'Model.php'
    ];
    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});