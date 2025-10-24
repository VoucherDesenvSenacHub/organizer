<?php
require_once __DIR__ . '/../../model/ProjetoModel.php';
session_start();
$pagamento = curl_init();
$projetoModel = new ProjetoModel();

if (isset($_POST['valor-doacao'])) {

    // Dados do Projeto
    $IdProjeto = $_POST['projeto-id'];
    $ValorArrecadado = $_POST['valor-arrecadado'];
    $ValorMeta = $_POST['meta'];
    $NumberCartao = $_POST['number-cartao'];
    $ValidadeCartao = $_POST['validade-cartao'];
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
        //Executar a rotina de validação no gateway antes de prosseguir com a doação
        //Criar uma classe para tratar o processo de pagamento pelo gateway, que retornará $transacao_id caso seja aprovada
        /*
        Body:
```
{
    "cartao": {
        "numero": "",
        "nome": "",
        "expiracaoMes": "",
        "expiracaoAno": "",
        "cvv": ""
    },
    "produto": {
        "descricao": "",
        "valor": ""
    },
    "titular": {
        "nome": "",
        "cpfCnpj": "",
        "email": "",
        "cep": "",
        "enderecoNumero": "",
        "enderecoComplemento": "",
        "telefone": ""
    }
}

        */
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
