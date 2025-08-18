<?php
require_once __DIR__ . '/../../model/ProjetoModel.php';
session_start();

$projetoModel = new Projeto();

$usuarioId = $_SESSION['usuario']['id'];
$projetoId = $_POST['projeto-id'] ?? null;

if ($projetoId) {
    $favorito = $projetoModel->favoritarProjeto($usuarioId, $projetoId);
    if ($favorito) {
        $_SESSION['favorito'] = true;
    } else {
        $_SESSION['favorito'] = false;
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    echo "ID do projeto não fornecido.";
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;