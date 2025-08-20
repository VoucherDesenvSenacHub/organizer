<?php
require_once '../../model/NoticiaModel.php';
session_start();
$noticiaModel = new NoticiaModel();

$noticiaId = $_POST['noticia-id'] ?? null;

if ($noticiaId) {
    $noticia = $noticiaModel->inativarNoticia($noticiaId);
    if ($noticia) {
        $_SESSION['mensagem'] = "Notícia inativada com sucesso.";
    } else {
        $_SESSION['mensagem'] = "Erro ao inativar a notícia.";
    }
    header('Location: ../../view/pages/ong/noticias.php');
    exit;
} else {
    echo "ID da notícia não fornecido.";
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
