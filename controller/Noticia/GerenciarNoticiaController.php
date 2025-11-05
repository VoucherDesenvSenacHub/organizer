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
            $IdNoticia = $noticiaCriada;

            // Upload de imagens (se houver)
            if (!empty($_FILES['fotos']['name'][0])) {
                $pasta = __DIR__ . '/../../upload/images/noticias/';
                if (!is_dir($pasta)) {
                    mkdir($pasta, 0777, true);
                }

                $tamanhoMaximo = 20 * 1024 * 1024; // 20 MB em bytes

                foreach ($_FILES['fotos']['name'] as $i => $nome) {
                    if ($_FILES['fotos']['error'][$i] === UPLOAD_ERR_OK) {

                        // 🔹 Verifica tamanho antes de mover
                        if ($_FILES['fotos']['size'][$i] > $tamanhoMaximo) {
                            $_SESSION['mensagem_toast'] = ['erro', "A imagem '{$nome}' ultrapassa 20 MB e não foi enviada."];
                            header('Location: ' . $_SERVER['HTTP_REFERER']);
                            exit;
                        }

                        $tmp   = $_FILES['fotos']['tmp_name'][$i];
                        $novoNome = uniqid() . '-' . basename($nome);
                        $destino  = __DIR__ . '/../../upload/images/noticias/' . $novoNome;

                        if (move_uploaded_file($tmp, $destino)) {
                            $IdImagem = $imagemModel->salvarCaminhoImagem('upload/images/noticias/' . $novoNome);
                            $imagemModel->vincularNaNoticia($IdImagem, $IdNoticia);
                        }
                    }
                }
            }

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
        if (!empty($_FILES['fotos']['name'][0])) {
            $imagemModel->deletarPorNoticia($IdNoticia);

            $tamanhoMaximo = 20 * 1024 * 1024; // 20 MB

            foreach ($_FILES['fotos']['name'] as $i => $nome) {
                if ($_FILES['fotos']['error'][$i] === UPLOAD_ERR_OK) {

                    // 🔹 Validação de tamanho
                    if ($_FILES['fotos']['size'][$i] > $tamanhoMaximo) {
                        $_SESSION['mensagem_toast'] = ['erro', "A imagem '{$nome}' ultrapassa 20 MB e não foi enviada."];
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        exit;
                    }

                    $tmp   = $_FILES['fotos']['tmp_name'][$i];
                    $novoNome = uniqid() . '-' . basename($nome);
                    $destino  = __DIR__ . '/../../upload/images/noticias/' . $novoNome;

                    if (move_uploaded_file($tmp, $destino)) {
                        $IdImagem = $imagemModel->salvarCaminhoImagem('upload/images/noticias/' . $novoNome);
                        $imagemModel->vincularNaNoticia($IdImagem, $IdNoticia);
                    }
                }
            }
        }

        $_SESSION['mensagem_toast'] = ['sucesso', 'Notícia atualizada com sucesso!'];
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        $_SESSION['mensagem_toast'] = ['erro', 'Falha ao atualizar notícia!'];
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

