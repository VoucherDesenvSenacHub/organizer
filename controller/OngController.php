<?php
require_once __DIR__ . '/../model/OngModel.php';

session_start();

$acao = $_GET['acao'] ?? $_POST['acao'] ?? null;

$ongModel = new Ong();

switch ($acao) {
    case 'cadastrar':
        $dados = [
            'nome' => $_POST['nome'],
            'cnpj' => $_POST['cnpj'],
            'responsavel_id' => $_SESSION['usuario']['id'],
            'telefone' => $_POST['telefone'],
            'email' => $_POST['email'],
            'cep' => $_POST['cep'],
            'rua' => $_POST['rua'],
            'numero' => $_POST['numero'],
            'bairro' => $_POST['bairro'],
            'cidade' => $_POST['cidade'],
            'estado' => $_POST['estado'],
            'banco_id' => $_POST['banco'],
            'agencia' => $_POST['agencia'],
            'conta' => $_POST['conta'],
            'tipo_conta' => $_POST['tipo_conta'],
            'descricao' => $_POST['descricao'],
        ];

        try {
            $criar = $ongModel->criarOng($dados);
            if ($criar) {
                $_SESSION['perfil_usuario'] = 'ong';
                $_SESSION['ong_id'] = $criar;
                require_once __DIR__ . '/../model/UsuarioModel.php';
                $usuarioModel = new Usuario();
                $usuarioModel->primeiroAcesso($_SESSION['usuario']['id'], 'ong');
                $_SESSION['usuario']['acessos']['ong'] = true;
                $_SESSION['cadastro-ong'] = true;
                header('Location: ../view/pages/ong/home.php');
                exit;
            }
        } catch (PDOException $e) {
            header('Location: ../view/pages/ong/cadastro.php?cadastro=erro');
            exit;
        }


    case 'favoritar':
        $usuario_id = $_SESSION['usuario']['id'];
        $ong_id = $_POST['ong-id-favorito'] ?? null;
        if ($ong_id) {
            $favorito = $ongModel->favoritarOng($usuario_id, $ong_id);
            if ($favorito) {
                $_SESSION['favorito'] = true;
            } else {
                $_SESSION['favorito'] = false;
            }

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            echo "ID da ONG não fornecido.";
        }
        break;

    default:
        header('Location: ../view/login.php');
        exit;
}
