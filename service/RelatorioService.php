<?php

require_once  __DIR__ . "/../model/RelatoriosModel.php";

class RelatorioService
{
    public function gerarReciboDoacao(
        $idOng,
        $projeto,
        $valor,
        $data,
        $nome,
        $ong,
        $cnpj,
        $cidade,
        $estado
    ) {
        // Limpa caracteres de máscara do dado CNPJ
        $cnpj = str_replace('.', '', $cnpj);
        $cnpj = str_replace('-', '', $cnpj);
        $cnpj = str_replace('/', '', $cnpj);

        // Formata o CNPJ com máscara para exibição no PDF do recibo
        $cnpj_formatado = substr($cnpj, 0, 2) . '.' .
            substr($cnpj, 2, 3) . '.' .
            substr($cnpj, 5, 3) . '/' .
            substr($cnpj, 8, 4) . '-' .
            substr($cnpj, 12, 2);

        ob_start();
        include __DIR__ . '/../report/reciboDoacao.php';
        $html = ob_get_clean();

        require_once __DIR__ . '/../util/PdfUtil.php';
        $pdfUtil = new PdfUtil();
        $pdfUtil->gerarPdf($html, 'Recibo.pdf');
    }

    public function gerarVoluntariosProjeto($idOng)
    {   
        ob_start();
        include __DIR__ . '/../report/voluntariosProjeto.php';
        $html = ob_get_clean();

        require_once __DIR__ . '/../util/PdfUtil.php';
        $pdfUtil = new PdfUtil();
        $pdfUtil->gerarPdf($html, 'Voluntários por Projeto.pdf');
    }

    public function gerarDoacoesMensais($idOng)
    {
        ob_start();
        include __DIR__ . '/../report/doacoesMensais.php';
        $html = ob_get_clean();

        require_once __DIR__ . '/../util/PdfUtil.php';
        $pdfUtil = new PdfUtil();
        $pdfUtil->gerarPdf($html, 'Doações Mensais.pdf');
    }

    public function gerarDoacoesProjeto($idOng)
    {
        ob_start();
        include __DIR__ . '/../report/doacoesProjeto.php';
        $html = ob_get_clean();

        require_once __DIR__ . '/../util/PdfUtil.php';
        $pdfUtil = new PdfUtil();
        $pdfUtil->gerarPdf($html, 'Doações por Projeto.pdf');
    }
}
