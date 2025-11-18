<?php
require_once '../../model/NoticiaModel.php';
require_once __DIR__ . '/../session_config.php';
$noticiaModel = new NoticiaModel();

$noticiaId = $_POST['noticia-id'] ?? null;

if ($noticiaId) {
    $noticia = $noticiaModel->inativarNoticia($noticiaId);
    if ($noticia) {
        $_SESSION['mensagem_toast'] = ['sucesso', 'Notícia inativada com sucesso.'];
    } else {
        $_SESSION['mensagem_toast'] = ['erro', 'Erro ao inativar a notícia.'];
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    echo "ID da notícia não fornecido.";
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
