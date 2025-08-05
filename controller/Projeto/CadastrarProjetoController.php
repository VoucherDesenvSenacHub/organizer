<?php
require_once __DIR__ . '/../../model/ProjetoModel.php';
session_start();

if (!isset($_SESSION['ong_id'])) {
    header('Location: /login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $meta = filter_input(INPUT_POST, 'meta', FILTER_VALIDATE_FLOAT);
    $ong = $_SESSION['ong_id'];

    if ($nome && $descricao && $meta !== false) {
        $projetoModel = new Projeto();
        $sucesso = $projetoModel->criar($nome, $descricao, $meta, $ong);

        if ($sucesso) {
            header('erro.php');
            exit;
        }
    }
    // Se algo falhar:
    header('teste.php');
    exit;
}

var_dump($sucesso);