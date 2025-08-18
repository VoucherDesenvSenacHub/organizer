<?php
require_once __DIR__ . '/../../model/ProjetoModel.php';
require_once '../../service/AuthService.php';
AuthService::verificaLoginOng();

$projetoModel = new Projeto();

// Pegar os dados
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
$meta = filter_input(INPUT_POST, 'meta', FILTER_VALIDATE_FLOAT);

// Criar um Projeto
if (!$_POST['projeto-id']) {
    $ong = $_SESSION['ong_id'];

    if ($nome && $descricao && $meta) {
        $sucesso = $projetoModel->criar($nome, $descricao, $meta, $ong);
        if ($sucesso) {
            $_SESSION['criar-projeto'] = true;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
    $_SESSION['criar-projeto'] = false;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Editar um Projeto
else {
    $projetoId = $_POST['projeto-id'];
    $valor_arrecadado = $projetoModel->buscarValor($projetoId);
    if ($meta < $valor_arrecadado) {
        echo "<script>alert('Meta inválida: o valor deve ser maior do que o que já foi arrecadado.');window.history.back();</script>";
        exit;
    } else {
        $edicao = $projetoModel->editar($projetoId, $nome, $descricao, $meta);
        if ($edicao) {
            $_SESSION['editar-projeto'] = true;
        } else {
            $_SESSION['editar-projeto'] = false;
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}