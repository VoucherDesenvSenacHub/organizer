<?php
require_once __DIR__ . '/../../model/ProjetoModel.php';
session_start();

$projetoModel = new ProjetoModel();

$usuarioId = $_SESSION['usuario']['id'];
$projetoId = $_POST['projeto-id'] ?? null;
$acao = $_POST['acao'] ?? null;

switch ($acao) {
    case 'apoiar':
        $apoio = $projetoModel->apoiarProjeto($usuarioId, $projetoId);
        if ($apoio) {
            $_SESSION['mensagem_toast'] = ['sucesso', 'Projeto apoiado com sucesso!'];
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        break;

    case 'desapoiar':
        $desapoiado = $projetoModel->desapoiarProjeto($usuarioId, $projetoId);
        if ($desapoiado) {
            $_SESSION['mensagem_toast'] = ['info', 'Você não apoia mais este Projeto!'];
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        break;

    default:
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
}
