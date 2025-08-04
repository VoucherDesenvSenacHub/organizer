<?php
require_once __DIR__ . '/../../../autoload.php';

function cadastrarProjeto()
{
    $projetoModel = new Projeto();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'])) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $meta = $_POST['meta'];
        $ong = $_SESSION['ong_id'];
        $projetoModel->criar($nome, $descricao, $meta, $ong);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?msg=projeto_cadastrado');
    exit;
}
