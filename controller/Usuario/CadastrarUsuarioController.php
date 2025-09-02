<!-- CADASTRO DO USUÁRIO -->
<?php
require_once __DIR__ . '/../../model/UsuarioModel.php';

session_start();

$usuarioModel = new UsuarioModel();

// Coleta os dados enviados pelo formulário de cadastro
$dados = [
    'nome'             => $_POST['nome'],
    'telefone'         => $_POST['telefone'],
    'cpf'              => $_POST['cpf'],
    'data_nascimento'  => $_POST['data_nascimento'],
    'email'            => $_POST['email'],
    'senha'            => $_POST['senha']
];

// Chama o método de cadastro no model, passando os dados recebidos
$cadastroUsuario = $usuarioModel->cadastro($dados);

if ($cadastroUsuario) {
    // Redireciona para a página de login com mensagem de sucesso se o cadastro foi bem-sucedido
    header('Location: ../../view/pages/visitante/login.php?msg=cadsucesso');
} else {
    // Redireciona de volta para a página de cadastro com indicação de erro
    header('Location: ../../view/pages/visitante/cadastro.php?cadastro=erro');
}

exit;
