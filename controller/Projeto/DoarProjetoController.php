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
    $NumberCartao = str_replace(' ', '', $_POST['number-cartao']);
    $ValidadeCartao = $_POST['validade-cartao'];
    $mesExpiracao = substr($ValidadeCartao, 0, 2);
    $anoExpiracao = substr($ValidadeCartao, 3, 4);
    $Cvv = $_POST['cvv'];
    $titular = $_POST['titular'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $PerfilProjeto = $_POST['descricaoPerfilProjeto'];

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
        //Capturar nome do projeto e usuário para validação do pagamento
        $transacao_id = $validacao->validarPagamentoCartao($NumberCartao, $titular,
        $mesExpiracao, $anoExpiracao, $Cvv, $PerfilProjeto, $ValorDoacao,
        $nome, $cpf, $email,
        "79100000", "1000", 'Casa',$telefone);

        if($transacao_id['situacao'] === "APROVADA" ){
            $resultadoDoacao = $projetoModel->realizarDoacaoProjeto($IdProjeto, $_SESSION['usuario']['id'], $ValorDoacao, $transacao_id['id']);
            if ($resultadoDoacao > 0) {
                $_SESSION['mensagem_toast'] = ['sucesso', 'Doação realizada com sucesso!'];
                include '../../view/components/reports-pdf/recibo-doacao.php';
                include '../../view/components/reports-pdf/recibo-generator.php';
                $recibo = file_get_contents('../../view/components/reports-pdf/recibo-generator.php');
                echo $recibo;
                // header('Location: ' . $_SERVER['HTTP_REFERER']);
                // exit;
            } else {
                $_SESSION['mensagem_toast'] = ['erro', 'Compra não aprovada pela operadora!'];
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
        } else {
            $_SESSION['mensagem_toast'] = ['erro', 'Falha ao processar doação!'];
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        
    }
}
