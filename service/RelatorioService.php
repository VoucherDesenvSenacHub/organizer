<?php

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
        $acesso = 'ong';
        require_once __DIR__ .'/../model/RelatoriosModel.php';

        $projetos = new RelatoriosModel();
        $contagem_projetos = $projetos->contarProjetos($idOng); // Relaciona todos os projetos da ONG em uso
        $listagem_projetos = $projetos->listarProjetos($idOng); // Relaciona todos os voluntários vinculados à ONG em uso
        $totalDeApoiadores = sizeof($listagem_projetos); // Captura a quantidade total de apoiadores da ONG
        $dadosPercentuais = "";
        foreach ($contagem_projetos as $lperc):
            $projeto = $lperc[0];
            $proporcional = number_format($lperc[1] * 100 / $totalDeApoiadores, 2);
            echo $projeto;
            $dadosPercentuais = $dadosPercentuais . "
        <h1>$projeto => $proporcional% dos apoiadores</h1>
    ";
        endforeach;
        /*
        Aqui serão processadas as buscas no banco de dados e tratamento dos dados para transferência
        para o template voluntariosProjeto.php
        */
        echo "<h1>Voluntarios por Projeto</h1>";


        //Geração do PDF:

        // ob_start();
        // include __DIR__ . '/../report/voluntariosProjeto.php';
        // $html = ob_get_clean();

        // require_once __DIR__ . '/../util/PdfUtil.php';
        // $pdfUtil = new PdfUtil();
        // $pdfUtil->gerarPdf($html, 'Voluntários Por Projeto.pdf');
    }

    public function gerarDoacoesMensais($idOng)
    {
        echo "<h1>Doações Mensais";
    }

    public function gerarDoacoesProjeto($idOng)
    {
        echo "<h1>Doações por Projeto";
    }
}
