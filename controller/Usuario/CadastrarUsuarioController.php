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
    'senha'            => $_POST['senha'],
    'cep'              => $_POST['cep'],
    'rua'              => $_POST['rua'],
    'numero'           => $_POST['numero'],
    'bairro'           => $_POST['bairro'],
    'cidade'           => $_POST['cidade'],
    'estado'           => $_POST['estado']
];

$cadastroUsuario = $usuarioModel->cadastro($dados);

if ($cadastroUsuario) {
    require_once __DIR__ . '/../../service/EmailService.php';
    $emailService = new EmailService();
    
    try {
        $emailService->enviarEmailBoasVindas($dados['email'], $dados['nome']);
    } catch (Exception $e) {
        // Log erro do email, mas não impede o cadastro
        error_log("Erro ao enviar email de boas-vindas: " . $e->getMessage());
    }
    
    // Redireciona para a página de login com mensagem de sucesso se o cadastro foi bem-sucedido
    $_SESSION['mensagem_toast'] = ['sucesso', 'Cadastro efetuado com sucesso!'];
    header('Location: ../../view/pages/visitante/login.php');
} else {
    // Redireciona de volta para a página de cadastro com indicação de erro
    $_SESSION['mensagem_toast'] = ['erro', 'Falha ao realizar cadastro!'];
    header('Location: ../../view/pages/visitante/cadastro.php');
}
exit;
