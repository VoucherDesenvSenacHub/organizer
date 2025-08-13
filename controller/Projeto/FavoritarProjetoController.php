<?php
require_once __DIR__ . '/../../model/ProjetoModel.php';
session_start();

$projetoModel = new Projeto();
$usuario_id = $_SESSION['usuario']['id'];
$projeto_id = $_POST['projeto-id-favorito'] ?? null;

if ($projeto_id) {
    $favorito = $projetoModel->favoritarProjeto($usuario_id, $projeto_id);
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
header('Location: ' . $_SERVER['HTTP_REFERER'] . '?msg=favorito_erro');
exit;