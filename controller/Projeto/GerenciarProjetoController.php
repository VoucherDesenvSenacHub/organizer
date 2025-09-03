<?php
require_once __DIR__ . '/../../model/ProjetoModel.php';
require_once '../../service/AuthService.php';
AuthService::verificaLoginOng();

$projetoModel = new ProjetoModel();


// Pegar os dados
$NomeProjeto = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$DescricaoProjeto = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
$MetaProjeto = filter_input(INPUT_POST, 'meta', FILTER_VALIDATE_FLOAT);

// Criar um Projeto
if (!$_POST['projeto-id']) {
    $IdOng = $_SESSION['ong_id'];
    $categoriaProjetoId = $_POST['categoria'];

    if($MetaProjeto <= 0) {
        echo "<script>alert('Valor Inválido! Adicione uma meta maior.');window.history.back();</script>";
        exit;
    }

    if ($NomeProjeto && $DescricaoProjeto && $MetaProjeto) {
        $projetoCriado  = $projetoModel->criar($NomeProjeto, $DescricaoProjeto, $MetaProjeto, $IdOng, $categoriaProjetoId);
        if ($projetoCriado) {
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
    $IdProjeto = $_POST['projeto-id'];
    $ValorArrecadado = $_POST['valor-arrecadado'];
    if ($MetaProjeto < $ValorArrecadado) {
        echo "<script>alert('Meta inválida: o valor deve ser maior do que o que já foi arrecadado.');window.history.back();</script>";
        exit;
    } else {
        $edicao = $projetoModel->editar($IdProjeto, $NomeProjeto, $DescricaoProjeto, $MetaProjeto);
        if ($edicao) {
            $_SESSION['editar-projeto'] = true;
        } else {
            $_SESSION['editar-projeto'] = false;
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
