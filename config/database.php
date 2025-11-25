<?php
require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

(new Dotenv())->load(__DIR__ . '/../.env');

try {
    $pdo = new PDO(
        "mysql:host={$_ENV['DB_HOST']};port={$_ENV['DB_PORT']};dbname={$_ENV['DB_DATABASE']};charset=utf8",
        $_ENV['DB_USERNAME'],
        $_ENV['DB_PASSWORD'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    
    $GLOBALS['pdo'] = $pdo;
    
} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Erro ao conectar ao banco de dados");
}