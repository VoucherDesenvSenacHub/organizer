<?php
require_once '../../model/NoticiaModel.php';
require_once '../../model/ImagemModel.php';
require_once '../../service/AuthService.php';
require_once __DIR__ . '/../../service/UploadService.php';

AuthService::verificaLoginOng();

$noticiaModel = new NoticiaModel();
$imagemModel = new ImagemModel();
$upload = new UploadService();

// Pegar os dados
$TituloNoticia = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
$SubtituloNoticia = filter_input(INPUT_POST, 'subtitulo', FILTER_SANITIZE_SPECIAL_CHARS);
$TextoNoticia = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);
$SubtextoNoticia = filter_input(INPUT_POST, 'subtexto', FILTER_SANITIZE_SPECIAL_CHARS);

// Criar uma Notícia
if (empty($_POST['noticia-id'])) {
    $IdOng = $_SESSION['ong_id'];

    if ($TituloNoticia && $SubtituloNoticia && $TextoNoticia && $SubtextoNoticia) {
        $noticiaCriada = $noticiaModel->criar($TituloNoticia, $SubtituloNoticia, $TextoNoticia, $SubtextoNoticia, $IdOng);

        if ($noticiaCriada) {
            $IdNoticia = $noticiaCriada;

            $upload->uploadImagens($_FILES['fotos'], $IdNoticia, 'noticia');

            $_SESSION['mensagem_toast'] = ['sucesso', 'Notícia criada com sucesso!'];
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    $_SESSION['mensagem_toast'] = ['erro', 'Falha ao criar Notícia!'];
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Editar uma Notícia
else {
    $IdNoticia = $_POST['noticia-id'];
    $noticiaEditada = $noticiaModel->editar($IdNoticia, $TituloNoticia, $SubtituloNoticia, $TextoNoticia, $SubtextoNoticia);

    if ($noticiaEditada) {
        $upload->uploadImagens($_FILES['fotos'], $IdNoticia, 'noticia', true);

        $_SESSION['mensagem_toast'] = ['sucesso', 'Notícia atualizada com sucesso!'];
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        $_SESSION['mensagem_toast'] = ['erro', 'Falha ao atualizar notícia!'];
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

