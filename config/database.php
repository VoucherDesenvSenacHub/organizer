<?php 
    // BANCO DE DADO LOCAL:
        // $host = 'localhost';
        // $port = 3306;
        // $dbname = 'organizer';
        // $user = 'root';
        // $password = '';

    // $host = 'turntable.proxy.rlwy.net';
    // $port = 14796;
    // $dbname = 'organizer';
    // $user = 'root';
    // $password = 'ABfifqyKxrpFnVSdyjIUOAQKKHjgZkct'; 

    $host = 'db4free.net';
    $port = 3306;
    $dbname = 'organizerr';
    $user = 'organizerr';
    $password = '@Senac123'; 
    
    try {
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Conexão bem-sucedida!";
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
?>
