<?php
require_once __DIR__ . '/../../model/ProjetoModel.php';
session_start();
// Adercio
$pagamento = curl_init();
$projetoModel = new ProjetoModel();

if (isset($_POST['valor-doacao'])) {
    // Dados do Projeto
    $IdProjeto = $_POST['projeto-id'];
    $ValorArrecadado = $_POST['valor-arrecadado'];
    $ValorMeta = $_POST['meta'];

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
        $resultadoDoacao = $projetoModel->realizarDoacaoProjeto($IdProjeto, $_SESSION['usuario']['id'], $ValorDoacao);
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
