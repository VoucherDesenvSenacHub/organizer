<?php
require_once '../../model/OngModel.php';
require_once __DIR__ . '/../../session_config.php';
$ongModel = new OngModel();

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
        require_once '../../model/UsuarioModel.php';
        $usuarioModel = new UsuarioModel();
        $usuarioModel->primeiroAcesso($_SESSION['usuario']['id'], 'ong');
        $_SESSION['usuario']['acessos']['ong'] = true;
        
        require_once __DIR__ . '/../../service/EmailService.php';
        $emailService = new EmailService();
        
        try {
            $emailService->enviarEmailBoasVindasOng($dados['email'], $dados['nome']);
        } catch (Exception $e) {
            // Log erro do email, mas não impede o cadastro
            error_log("Erro ao enviar email de boas-vindas ONG: " . $e->getMessage());
        }
        
        $_SESSION['mensagem_toast'] = ['sucesso', 'Cadastro realizado com Sucesso!'];
        header('Location: ../../view/pages/ong/home.php');
        exit;
    }
} catch (PDOException $e) {
    $_SESSION['mensagem_toast'] = ['erro', 'Falha ao realizar cadastro!'];
    header('Location: ../../view/pages/ong/cadastro.php?e');
    exit;
}
