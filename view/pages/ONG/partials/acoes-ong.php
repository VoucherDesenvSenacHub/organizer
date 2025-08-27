<?php
session_start();
require_once __DIR__ . '/../../../autoload.php';

// Verificar se o usuário está logado como ONG
if ($_SESSION['perfil_usuario'] !== 'ong') {
    $_SESSION['popup'] = "Acesso não autorizado.";
    header("Location: ../../view/pages/ong/home.php");
    exit;
}

// Verificar se a ação é para inativar projeto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['acao'] ?? '') === 'inativar_projeto') {
    
    // Validar dados recebidos
    $projetoId = filter_input(INPUT_POST, 'projeto_id', FILTER_VALIDATE_INT);
    $motivo = trim($_POST['motivo'] ?? '');
    $escolha = trim($_POST['escolha'] ?? '');
    
    if (!$projetoId || empty($motivo) || empty($escolha)) {
        $_SESSION['popup'] = "Dados incompletos para inativação do projeto.";
        header("Location: " . ($_SERVER['HTTP_REFERER'] ?? '../../view/pages/ong/home.php'));
        exit;
    }
    
    $projetoModel = new Projeto();
    $ongModel = new Ong();
    
    // Verificar se o projeto pertence à ONG do usuário logado
    $projetoInfo = $projetoModel->buscarPerfil($projetoId);
    
    if (!$projetoInfo) {
        $_SESSION['popup'] = "Projeto não encontrado.";
        header("Location: ../../view/pages/ong/home.php");
        exit;
    }
    
    $ongIdUsuario = $_SESSION['ong_id'] ?? 0;
    
    if ($projetoInfo['ong_id'] != $ongIdUsuario) {
        $_SESSION['popup'] = "Você não tem permissão para inativar este projeto.";
        header("Location: ../../view/pages/ong/home.php");
        exit;
    }

    // Tentar inativar o projeto
    try {
        $sucesso = $projetoModel->inativarProjeto($projetoId, $motivo, $escolha);
        
        if ($sucesso) {
            $_SESSION['popup'] = "Projeto inativado com sucesso!";
        } else {
            $_SESSION['popup'] = "Erro ao inativar o projeto. Tente novamente.";
        }
    } catch (Exception $e) {
        $_SESSION['popup'] = "Erro ao processar a solicitação: " . $e->getMessage();
    }
    
    header("Location: ../../view/pages/ong/projetos.php");
    exit;
} else {
    $_SESSION['popup'] = "Ação não permitida.";
    header("Location: ../../view/pages/ong/home.php");
    exit;
}