<?php 
    $host = 'localhost';
    $dbname = 'organizer';
    $user = 'root';
    $password = '';
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Conexão bem-sucedida!";
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
?>