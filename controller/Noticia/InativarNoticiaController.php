<?php
require_once '../../model/NoticiaModel.php';
session_start();
$noticiaModel = new NoticiaModel();

$usuarioId = $_SESSION['usuario']['id'];
$noticiaId = $_POST['noticia-id'] ?? null;

if ($projetoId) {
    $noticia = $noticiaModel->inativarNoticia($noticiaId);
    header('Location: ../../');
    exit;
} else {
    echo "ID do projeto não fornecido.";
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;