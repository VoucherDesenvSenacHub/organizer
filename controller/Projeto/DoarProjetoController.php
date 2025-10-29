<?php
require_once __DIR__ . '/../../model/ProjetoModel.php';
require_once __DIR__ . '/../../model/Interacoes/ValidarPagamentoModel.php';
session_start();
$projetoModel = new ProjetoModel();
$validacao = new ValidarPagamentoModel();

if (isset($_POST['valor-doacao'])) {

    // Dados do Projeto
    $IdProjeto = $_POST['projeto-id'];
    $ValorArrecadado = $_POST['valor-arrecadado'];
    $ValorMeta = $_POST['meta'];
    $NumberCartao = $_POST['number-cartao'];
    $ValidadeCartao = $_POST['validade-cartao'];
    $mesExpiracao = substr($ValidadeCartao, 0, 2);
    $anoExpiracao = substr($ValidadeCartao, 2, 4);
    $Cvv = $_POST['cvv'];
    $titular = $_POST['titular'];

    // Pegar a doação
    $ValorDoacao = $_POST['valor-doacao'];
    if ($ValorDoacao == 'outro') {
        $ValorDoacao = $_POST['valor-personalizado'];
    }
    if ($ValorDoacao + $ValorArrecadado > $ValorMeta) {
        echo "<script>alert('O valor ultrapassou a meta!! Doe um valor menor.');window.history.back();</script>";
        exit;
    } elseif ($ValorDoacao <= 0) {
        echo "<script>alert('Valor inválido!! Doe um valor maior.');window.history.back();</script>";
        exit;
    } else {
        //Capturar nome do projeto
        //Capturar nome, cpf, email, cep, númeroEndereco, complementoEndereco e telefone do usuário
        $transacao_id = $validacao->validarPagamentoCartao($NumberCartao, $usuario['nome'],
        $mesExpiracao, $anoExpiracao, $Cvv, $PerfilProjeto['nome'], $ValorDoacao,
        $titular, $usuario['cpf'], $usuario['email'],
        79100000, 1000, 'Casa',$usuario['telefone']);
        //Executar a rotina de validação no gateway antes de prosseguir com a doação
        //Criar uma classe para tratar o processo de pagamento pelo gateway, que retornará $transacao_id caso seja aprovada
        
        $resultadoDoacao = $projetoModel->realizarDoacaoProjeto($IdProjeto, $_SESSION['usuario']['id'], $ValorDoacao, $transacao_id);
        if ($resultadoDoacao > 0) {
            $_SESSION['mensagem_toast'] = ['sucesso', 'Doação realizada com sucesso!'];
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $_SESSION['mensagem_toast'] = ['erro', 'Falha ao processar doação!'];
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}
