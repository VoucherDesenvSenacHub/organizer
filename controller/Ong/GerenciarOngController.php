<?php
require_once "../../autoload.php";
session_start();

$ongModel = new Ong();
$usuarioModel = new Usuario();

// Coletar dados do formulário
$dados = [
    'nome'          => $_POST['nome']          ?? null,
    'cnpj'          => $_POST['cnpj']          ?? null,
    'responsavel_id' => $_SESSION['usuario']['id'] ?? null,
    'telefone'      => $_POST['telefone']      ?? null,
    'email'         => $_POST['email']         ?? null,
    'cep'           => $_POST['cep']           ?? null,
    'rua'           => $_POST['rua']           ?? null,
    'numero'        => $_POST['numero']        ?? null,
    'bairro'        => $_POST['bairro']        ?? null,
    'cidade'        => $_POST['cidade']        ?? null,
    'estado'        => $_POST['estado']        ?? null,
    'banco_id'      => $_POST['banco']         ?? null,
    'agencia'       => $_POST['agencia']       ?? null,
    'conta'         => $_POST['conta']         ?? null,
    'tipo_conta'    => $_POST['tipo_conta']    ?? null,
    'descricao'     => $_POST['descricao']     ?? null,
];

// Criar nova ONG
if (empty($_POST['ong-id'])) {
    try {
        $criar = $ongModel->criarOng($dados);

        if ($criar) {
            $_SESSION['perfil_usuario'] = 'ong';
            $_SESSION['ong_id'] = $criar;

            $usuarioModel->primeiroAcesso($_SESSION['usuario']['id'], 'ong');
            $_SESSION['usuario']['acessos']['ong'] = true;

            $_SESSION['cadastro-ong'] = true;
            header('Location: ../../view/pages/ong/home.php');
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['cadastro-ong'] = false;
        header('Location: ../../view/pages/ong/cadastro.php?cadastro=erro');
        exit;
    }
}
// Editar ONG existente
else {
    try {
        $IdOng = $_POST['ong-id'];

        $editar = $ongModel->editar($IdOng, $dados);

        if ($editar) {
            $_SESSION['editar-ong'] = true;
        } else {
            $_SESSION['editar-ong'] = false;
        }

        $redirect = $_SERVER['HTTP_REFERER'] ?? '../../view/pages/ong/home.php';
        header("Location: $redirect");
        exit;
    } catch (PDOException $e) {
        $_SESSION['editar-ong'] = false;
        echo "Erro: " . $e->getMessage();
        exit;
    }
}
