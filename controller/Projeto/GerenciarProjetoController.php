<?php
require_once __DIR__ . '/../../model/ProjetoModel.php';
require_once __DIR__ . '/../../model/ImagemModel.php';
require_once __DIR__ . '/../../service/AuthService.php';
require_once __DIR__ . '/../../service/UploadService.php';

AuthService::verificaLoginOng();

$projetoModel = new ProjetoModel();
$imagemModel  = new ImagemModel();
$upload = new UploadService();

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
        $projetoCriado = $projetoModel->criar($NomeProjeto, $DescricaoProjeto, $MetaProjeto, $CategoriaIdProjeto, $IdOng);

        if ($projetoCriado) {
            $idProjeto = $projetoCriado;

            // Upload de imagens (se houver)
            $upload->uploadImgProjeto($_FILES['imagens'], $idProjeto);

            $_SESSION['mensagem_toast'] = ['sucesso', 'Projeto criado com sucesso!'];
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    $_SESSION['mensagem_toast'] = ['erro', 'Falha ao criar Projeto!'];
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Editar um Projeto
else {
    $idProjeto       = $_POST['projeto-id'];
    $ValorArrecadado = $_POST['valor-arrecadado'] ?? 0;

    if ($MetaProjeto < $ValorArrecadado) {
        echo "<script>alert('Meta inválida: o valor deve ser maior do que o que já foi arrecadado.');window.history.back();</script>";
        exit;
    } else {
        $projetoEditado = $projetoModel->editar($idProjeto, $NomeProjeto, $DescricaoProjeto, $MetaProjeto, $CategoriaIdProjeto);

        if ($projetoEditado) {
            
            $upload->uploadImgProjeto($_FILES['imagens'], $idProjeto,  true);

            $_SESSION['mensagem_toast'] = ['sucesso', 'Projeto salvo com sucesso!'];
        } else {
            $_SESSION['mensagem_toast'] = ['erro', 'Falha ao salvar Projeto!'];
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
