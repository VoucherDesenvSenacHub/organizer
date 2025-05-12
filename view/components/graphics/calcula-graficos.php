<?php 
if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $largura = $_POST['largura'];
        $altura = $_POST['altura'];
        echo "Calculei</br>";
        echo "Largura: ". $largura."</br>";
        echo "Altura: ". $altura."</br>";
        // return header ('location: ..\..\pages\adm\relatorios.php');
    }
