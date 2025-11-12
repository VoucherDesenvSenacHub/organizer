<?php

require_once __DIR__ . "/../service/RelatorioService.php";

$relatorio = new RelatorioService();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $idOng = $_POST['id-ong'];
    $relatorioId = $_POST['relatorio'];
    if ($relatorioId === 'recibo') {
        $projeto = $_POST['projeto'];
        $valor = $_POST['valor'];
        $data = $_POST['data'];
        $nome = $_POST['nome'];
        $ong = $_POST['ong'];
        $cnpj = $_POST['cnpj'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
    }
}
switch ($relatorioId) {
    case 'voluntarios':
        $relatorio->gerarVoluntariosProjeto($idOng);
        break;

    case 'doacoes-mensais':
        $relatorio->gerarDoacoesMensais($idOng);
        break;

    case 'doacoes-projeto':
        $relatorio->gerarDoacoesProjeto($idOng);
        break;

    case 'recibo':
        $relatorio->gerarReciboDoacao(
            $idOng,
            $projeto,
            $valor,
            $data,
            $nome,
            $ong,
            $cnpj,
            $cidade,
            $estado);
        break;
}
