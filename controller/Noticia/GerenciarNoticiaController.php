<?php
require_once '../../model/NoticiaModel.php';
require_once '../../model/ImagemModel.php';
require_once '../../service/AuthService.php';

AuthService::verificaLoginOng();

$noticiaModel = new NoticiaModel();
$imagemModel  = new ImagemModel();

// Pegar os dados
$TituloNoticia    = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
$SubtituloNoticia = filter_input(INPUT_POST, 'subtitulo', FILTER_SANITIZE_SPECIAL_CHARS);
$TextoNoticia     = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);
$SubtextoNoticia  = filter_input(INPUT_POST, 'subtexto', FILTER_SANITIZE_SPECIAL_CHARS);

// Criar uma Notícia
if (empty($_POST['noticia-id'])) {
    $IdOng = $_SESSION['ong_id'];

    if ($TituloNoticia && $SubtituloNoticia && $TextoNoticia && $SubtextoNoticia) {
        $noticiaCriada = $noticiaModel->criar($TituloNoticia, $SubtituloNoticia, $TextoNoticia, $SubtextoNoticia, $IdOng);

        if ($noticiaCriada) {
            $IdNoticia = $noticiaModel->ultimoId();

            // Upload de imagens (se houver)
            if (!empty($_FILES['fotos']['name'][0])) {
                foreach ($_FILES['fotos']['name'] as $i => $nome) {
                    if ($_FILES['fotos']['error'][$i] === UPLOAD_ERR_OK) {
                        $tmp   = $_FILES['fotos']['tmp_name'][$i];
                        $novoNome = uniqid() . '-' . basename($nome);
                        $destino  = __DIR__ . '/../../upload/imagens/' . $novoNome;

                        if (move_uploaded_file($tmp, $destino)) {
                            $IdImagem = $imagemModel->salvar('upload/imagens/' . $novoNome);
                            $imagemModel->vincularNaNoticia($IdImagem, $IdNoticia);
                        }
                    }
                }
            }

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
        // Apaga imagens antigas (para substituir pelas novas)
        $imagemModel->deletarPorNoticia($IdNoticia);

        // Upload de novas imagens (se houver)
        if (!empty($_FILES['fotos']['name'][0])) {
            foreach ($_FILES['fotos']['name'] as $i => $nome) {
                if ($_FILES['fotos']['error'][$i] === UPLOAD_ERR_OK) {
                    $tmp   = $_FILES['fotos']['tmp_name'][$i];
                    $novoNome = uniqid() . '-' . basename($nome);
                    $destino  = __DIR__ . '/../../upload/imagens/' . $novoNome;

                    if (move_uploaded_file($tmp, $destino)) {
                        $IdImagem = $imagemModel->salvar('upload/imagens/' . $novoNome);
                        $imagemModel->vincularNaNoticia($IdImagem, $IdNoticia);
                    }
                }
            }
        }

        $_SESSION['editar-noticia'] = true;
    } else {
        $_SESSION['editar-noticia'] = false;
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

