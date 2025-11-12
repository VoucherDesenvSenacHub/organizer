<?php

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $idOng = $_POST['id-ong'];
        $relatorio = $_POST['relatorio'];
        $titulo = 'Relatorio.pdf';
        if($relatorio === 'recibo-doacao.php'){
            $projeto = $_POST['projeto'];
            $valor = $_POST['valor'];
            $data = $_POST['data'];
            $nome = $_POST['nome'];
            $ong = $_POST['ong'];
            $cnpj = $_POST['cnpj'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $titulo = 'Recibo.pdf';
        }
    }