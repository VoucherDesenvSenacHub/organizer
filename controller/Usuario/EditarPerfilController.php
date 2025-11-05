<?php
require_once __DIR__ . '/../../model/UsuarioModel.php';
require_once __DIR__ . '/../../model/ImagemModel.php';

session_start();

$imagemModel = new ImagemModel();
$usuarioModel = new UsuarioModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Atualização de dados do perfil
    if (isset($_POST['id_usuario'])) {
        $id = $_POST['id_usuario'];
        $nome = $_POST['nome_usuario'];
        $telefone = preg_replace('/[^0-9]/', '', $_POST['telefone_usuario']);
        $cpf = preg_replace('/[^0-9]/', '', $_POST['cpf_usuario']);
        $data = $_POST['data_usuario'];
        $email = $_POST['email_usuario'];
        $idade = $usuarioModel->calcularIdade($data);

        if ($idade < 18) {
            $_SESSION['mensagem_toast'] = ['erro', 'Você precisa ter 18 anos ou mais para atualizar o cadastro.'];
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        try {
            $resultado = 0;
            $imagemPadrao = 'view/assets/images/global/user-placeholder.jpg';
            $usuario = $usuarioModel->buscar_perfil($_SESSION['usuario']['id']);

            // --- REMOVER FOTO ---
            if (isset($_POST['remover_foto']) && $_POST['remover_foto'] === 'true') {
                $idImagemAtual = $usuario['imagem_id'] ?? null;
                if ($idImagemAtual) {
                    $imagemModel->deletarImagem($idImagemAtual);
                }
                $usuarioModel->atualizarImagem($_SESSION['usuario']['id'], null);
                $_SESSION['usuario']['foto'] = $imagemPadrao;
                $resultado = 1;
            }

            // --- UPLOAD DE NOVA FOTO ---
            if (!empty($_FILES['foto_usuario']['name'])) {
                $file = $_FILES['foto_usuario'];
                $fileSize = $file['size'];
                $maxSize = 20 * 1024 * 1024; // 20 MB

                if ($fileSize > $maxSize) {
                    $_SESSION['mensagem_toast'] = ['erro', 'A imagem deve ter no máximo 20MB.'];
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                }

                $pasta = __DIR__ . '/../../upload/images/usuarios/';
                if (!is_dir($pasta))
                    mkdir($pasta, 0777, true);

                $tmp = $file['tmp_name'];
                $nomeOriginal = basename($file['name']);
                $novoNome = uniqid() . '-' . $nomeOriginal;
                $destino = $pasta . $novoNome;

                if (move_uploaded_file($tmp, $destino)) {
                    $idImagem = $imagemModel->salvarCaminhoImagem('upload/images/usuarios/' . $novoNome);
                    $usuarioModel->atualizarImagem($_SESSION['usuario']['id'], $idImagem);
                    $_SESSION['usuario']['foto'] = 'upload/images/usuarios/' . $novoNome;
                    $resultado = 1;
                }
            }

            // --- ATUALIZAR DADOS ---
            $resultadoDados = $usuarioModel->update($id, $nome, $telefone, $cpf, $data, $email);
            if ($resultadoDados > 0) $resultado = 1;

            $_SESSION['mensagem_toast'] = $resultado > 0
                ? ['sucesso', 'Dados atualizados com sucesso!']
                : ['info', 'Nenhuma alteração feita!'];

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;

        } catch (PDOException $e) {
            error_log('Erro ao atualizar perfil: ' . $e->getMessage());
            $_SESSION['mensagem_toast'] = ['erro', 'Falha ao atualizar dados!'];
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    // --- ALTERAR SENHA ---
    if (isset($_POST['usuario_id'])) {
        $id = $_POST['usuario_id'];
        $senha = $_POST['senha_usuario'];
        $senhaconfirm = $_POST['senhaconfirm'];

        if ($senha !== $senhaconfirm) {
            $_SESSION['mensagem_toast'] = ['erro', 'As senhas não coincidem!'];
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $resultado_senha = $usuarioModel->updatesenha($id, $senha);
        $_SESSION['mensagem_toast'] = $resultado_senha
            ? ['sucesso', 'Senha alterada com sucesso!']
            : ['erro', 'Falha ao alterar senha!'];

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
