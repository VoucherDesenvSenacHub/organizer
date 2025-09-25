<?php
require_once __DIR__ . '/../../model/ProjetoModel.php';
session_start();

$projetoModel = new ProjetoModel();

$usuarioId = $_SESSION['usuario']['id'];
$projetoId = $_POST['projeto-id'] ?? null;

if ($projetoId) {
    $favorito = $projetoModel->favoritarProjeto($usuarioId, $projetoId);
    if ($favorito) {
        $_SESSION['mensagem_toast'] = ['favorito', 'Adicionado aos favoritos!'];
    } else {
        $_SESSION['mensagem_toast'] = ['desfavorito', 'Removido dos favoritos!'];
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    echo "ID do projeto não fornecido.";
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
