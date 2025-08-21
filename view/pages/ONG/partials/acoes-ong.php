<?php
session_start();
require_once __DIR__ . '/../../../autoload.php';

$projetoModel = new Projeto();

if ($_SESSION['perfil_usuario'] !== 'ong') {
    header("Location: home.php");
    exit;
}

if ($_POST['acao'] === 'inativar_projeto' && !empty($_POST['projeto_id'])) {
    $projetoId = intval($_POST['projeto_id']);
    $motivo    = trim($_POST['motivo'] ?? '');
    $escolha   = trim($_POST['escolha'] ?? '');

    $sucesso = $projetoModel->inativarProjeto($projetoId, $motivo, $escolha);

    if ($sucesso) {
        $_SESSION['popup'] = "Solicitação de inativação enviada com sucesso!";
    } else {
        $_SESSION['popup'] = "Erro ao inativar o projeto. Tente novamente.";
    }

    header("Location: home.php");
    exit;
}
