<?php
require_once '../../model/NoticiaModel.php';
require_once '../../service/AuthService.php';
AuthService::verificaLoginOng();

$noticiaModel = new NoticiaModel();

// Pegar os dados
$TituloNoticia    = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
$SubtituloNoticia = filter_input(INPUT_POST, 'subtitulo', FILTER_SANITIZE_SPECIAL_CHARS);
$TextoNoticia     = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);
$SubtextoNoticia  = filter_input(INPUT_POST, 'subtexto', FILTER_SANITIZE_SPECIAL_CHARS);

// Criar uma Notícia
if (!$_POST['noticia-id']) {
    $IdOng = $_SESSION['ong_id'];

    if ($TituloNoticia && $SubtituloNoticia && $TextoNoticia && $SubtextoNoticia) {
        $noticiaCriada = $noticiaModel->criar($TituloNoticia, $SubtituloNoticia, $TextoNoticia, $SubtextoNoticia, $IdOng);
        if ($noticiaCriada) {
            $_SESSION['criar-noticia'] = true;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
    $_SESSION['criar-noticia'] = false;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
// Editar uma Notícia
else {
    $IdNoticia = $_POST['noticia-id'];
    $noticiaEditada = $noticiaModel->editar($IdNoticia, $TituloNoticia, $SubtituloNoticia, $TextoNoticia, $SubtextoNoticia);
    if ($noticiaEditada) {
        $_SESSION['editar-noticia'] = true;
    } else {
        $_SESSION['editar-noticia'] = false;
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}