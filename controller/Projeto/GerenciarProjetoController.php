<?php
require_once __DIR__ . '/../../model/ProjetoModel.php';
require_once __DIR__ . '/../../model/ImagemModel.php';
require_once '../../service/AuthService.php';

AuthService::verificaLoginOng();

$projetoModel = new ProjetoModel();
$imagemModel  = new ImagemModel();

// Pegar os dados
$NomeProjeto        = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$DescricaoProjeto   = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
$MetaProjeto        = filter_input(INPUT_POST, 'meta', FILTER_VALIDATE_FLOAT);
$CategoriaIdProjeto = filter_input(INPUT_POST, 'categoria', FILTER_VALIDATE_INT);

// Criar um Projeto
if (empty($_POST['projeto-id'])) {
    $IdOng = $_SESSION['ong_id'];

    if ($MetaProjeto <= 0) {
        echo "<script>alert('Valor Inválido! Adicione uma meta maior.');window.history.back();</script>";
        exit;
    }

    if ($NomeProjeto && $DescricaoProjeto && $MetaProjeto && $CategoriaIdProjeto) {
        $projetoCriado  = $projetoModel->criar($NomeProjeto, $DescricaoProjeto, $MetaProjeto, $CategoriaIdProjeto, $IdOng);

        if ($projetoCriado) {
            //Pegar o ID do Projeto criado
            $IdProjeto = $projetoCriado;

            // Upload de imagens (se houver)
            if (!empty($_FILES['imagens']['name'][0])) {
                $pasta = __DIR__ . '/../../upload/images/projetos/';
                if (!is_dir($pasta)) {
                    mkdir($pasta, 0777, true);
                }

                foreach ($_FILES['imagens']['name'] as $i => $nome) {
                    if ($_FILES['imagens']['error'][$i] === UPLOAD_ERR_OK) {
                        $tmp      = $_FILES['imagens']['tmp_name'][$i];
                        $novoNome = uniqid() . '-' . basename($nome);
                        $destino  = $pasta . $novoNome;

                        if (move_uploaded_file($tmp, $destino)) {
                            // Salvar caminho no banco de dados
                            $IdImagem = $imagemModel->salvarCaminhoImagem('upload/images/projetos/' . $novoNome);
                            // Vincular imagem ao projeto
                            $imagemModel->vincularNoProjeto($IdImagem, $IdProjeto);
                        }
                    }
                }
            }

            $_SESSION['criar-projeto'] = true;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    $_SESSION['criar-projeto'] = false;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Editar um Projeto
else {
    $IdProjeto       = $_POST['projeto-id'];
    $ValorArrecadado = $_POST['valor-arrecadado'] ?? 0;

    if ($MetaProjeto < $ValorArrecadado) {
        echo "<script>alert('Meta inválida: o valor deve ser maior do que o que já foi arrecadado.');window.history.back();</script>";
        exit;
    } else {
        $projetoEditado = $projetoModel->editar($IdProjeto, $NomeProjeto, $DescricaoProjeto, $MetaProjeto, $CategoriaIdProjeto);

        if ($projetoEditado) {
            // Só mexe nas imagens se houver upload novo
            if (!empty($_FILES['imagens']['name'][0])) {
                // Apaga vínculos de imagens antigas
                $imagemModel->deletarPorProjeto($IdProjeto);

                $pasta = __DIR__ . '/../../upload/images/projetos/';
                if (!is_dir($pasta)) {
                    mkdir($pasta, 0777, true);
                }

                foreach ($_FILES['imagens']['name'] as $i => $nome) {
                    if ($_FILES['imagens']['error'][$i] === UPLOAD_ERR_OK) {
                        $tmp      = $_FILES['imagens']['tmp_name'][$i];
                        $novoNome = uniqid() . '-' . basename($nome);
                        $destino  = $pasta . $novoNome;

                        if (move_uploaded_file($tmp, $destino)) {
                            // Salvar caminho no banco
                            $IdImagem = $imagemModel->salvarCaminhoImagem('upload/images/projetos/' . $novoNome);

                            // Vincular imagem ao projeto
                            $imagemModel->vincularNoProjeto($IdImagem, $IdProjeto);
                        }
                    }
                }
            }

            $_SESSION['editar-projeto'] = true;
        } else {
            $_SESSION['editar-projeto'] = false;
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
