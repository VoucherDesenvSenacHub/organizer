<?php
require_once __DIR__ . '/../../model/ProjetoModel.php';
require_once __DIR__ . '../../service/AuthService.php';
AuthService::verificaLoginOng();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $meta = filter_input(INPUT_POST, 'meta', FILTER_VALIDATE_FLOAT);
    $ong = $_SESSION['ong_id'];

    if ($nome && $descricao && $meta) {
        $projetoModel = new ProjetoModel();
        $sucesso = $projetoModel->criar($nome, $descricao, $meta, $ong);
        if ($sucesso) {
            header('Location: ../../view/pages/ong/projetos.php?msg=sucesso');
            exit;
        }
    }

    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?msg=erro');
    exit;
}