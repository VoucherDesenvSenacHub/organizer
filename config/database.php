<?php 
    $host = 'centerbeam.proxy.rlwy.net';
    $port = 28838;
    $dbname = 'organizer';
    $user = 'root';
    $password = 'GxbLQsKICwpVBaOQegbVxZvLHfgSIorV'; 

    // BANCO DE DADOS LOCAL (PARA TESTES):
        $host = 'localhost';
        $port = 3306;
        $dbname = 'organizer2';
        $user = 'root';
        $password = '';
    
    try {
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Conexão bem-sucedida!";
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
?>
