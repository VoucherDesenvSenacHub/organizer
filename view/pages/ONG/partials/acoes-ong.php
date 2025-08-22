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
    
    // Validações adicionais
    if (empty($motivo) ){
        $_SESSION['popup'] = "Por favor, informe o motivo da inativação.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
    
    if (empty($escolha)) {
        $_SESSION['popup'] = "Por favor, selecione uma categoria para a inativação.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Verificar se o projeto pertence à ONG do usuário logado
    $projetoInfo = $projetoModel->buscarPerfil($projetoId);
    $ongIdUsuario = $_SESSION['ong_id'];
    
    if ($projetoInfo['ong_id'] != $ongIdUsuario) {
        $_SESSION['popup'] = "Você não tem permissão para inativar este projeto.";
        header("Location: home.php");
        exit;
    }

    $sucesso = $projetoModel->inativarProjeto($projetoId, $motivo, $escolha);

    if ($sucesso) {
        $_SESSION['popup'] = "Solicitação de inativação enviada com sucesso!";
    } else {
        $_SESSION['popup'] = "Erro ao inativar o projeto. Tente novamente.";
    }

    header("Location: projetos.php");
    exit;
}