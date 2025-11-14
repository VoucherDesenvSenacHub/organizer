<?php

require_once __DIR__ . "/../model/RelatoriosModel.php";
require_once __DIR__ . '/../model/OngModel.php';

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
        $projetos = new RelatoriosModel();
        $contagem_projetos = $projetos->contarProjetos($idOng); // Relaciona todos os projetos da ONG em uso
        $listagem_projetos = $projetos->listarProjetos($idOng); // Relaciona todos os voluntários vinculados à ONG em uso
        $totalDeApoiadores = sizeof($listagem_projetos); // Captura a quantidade total de apoiadores da ONG
        $dadosPercentuais = "";
        foreach ($contagem_projetos as $lperc):
            $projeto = $lperc[0];
            $proporcional = number_format($lperc[1] * 100 / $totalDeApoiadores, 2);
            $dadosPercentuais = $dadosPercentuais . "
        <h1>$projeto => $proporcional% dos apoiadores</h1>
    ";
        endforeach;
        if (count($listagem_projetos) == 0) {
                $dadosPercentuais =  '<h1>Não há projetos ativos cadastrados para essa ONG</h1>';
            }

        // Geração do PDF
        ob_start();
        include __DIR__ . '/../report/voluntariosProjeto.php';
        $html = ob_get_clean();

        require_once __DIR__ . '/../util/PdfUtil.php';
        $pdfUtil = new PdfUtil();
        $pdfUtil->gerarPdf($html, 'Voluntários por Projeto.pdf');
    }

    public function gerarDoacoesMensais($idOng)
    {
        $ongs = new OngModel();
        $relatorio = new RelatoriosModel();
        $doacoes = $ongs->buscarDoadores($idOng);
        $listaDoacoes = $ongs->dashboardOng($idOng);
        $dadosDasTabelas = $relatorio->listarDadosTabela($idOng);
        $year = date('Y');
        $projetos = new RelatoriosModel();
        $contagem_projetos = $projetos->contarProjetos($idOng);
        $listagem_projetos = $projetos->listarProjetos($idOng);
        $tabela = "";
        $mesPorExtenso = [
            'Janeiro',
            'Fevereiro',
            'Março',
            'Abril',
            'Maio',
            'Junho',
            'Julho',
            'Agosto',
            'Setembro',
            'Outubro',
            'Novembro',
            'Dezembro'
        ];
        $totalAnual = 0;
        for ($month = 1; $month <= 12; $month++):
            $arrecadacao = $relatorio->painelDeArrecadacao($idOng, $month, $year);
            if ($arrecadacao['total_doado'] === null) {
                $valorTotal = 0;
            } else {
                $valorTotal = (float)$arrecadacao['total_doado'];
                $totalAnual += $valorTotal;
            }
            $valorTotal = number_format($valorTotal, 2, ',', '.');
            $mes = $mesPorExtenso[$month - 1];
            $tabela = $tabela . "
        <tr>
        <td class='mes'>
            $mes
        </td>
        <td class='valor'>
            $valorTotal
        </td>
        </tr>
    ";
        endfor;

        //Geração do PDF

        ob_start();
        include __DIR__ . '/../report/doacoesMensais.php';
        $html = ob_get_clean();

        require_once __DIR__ . '/../util/PdfUtil.php';
        $pdfUtil = new PdfUtil();
        $pdfUtil->gerarPdf($html, 'Doações Mensais.pdf');
    }

    public function gerarDoacoesProjeto($idOng)
    {
        $relatorio = new RelatoriosModel();
        $arrecadacao = $relatorio->somarArrecadacaoProjetos($idOng);
        $totalGeral = 0;
        foreach ($arrecadacao as $a):
            $totalGeral += $a['total_doacoes'];
        endforeach;
        $totalRodape = "R$ " . number_format($totalGeral, 2, ',', '.');
        $tabela = "";
        foreach ($arrecadacao as $a):
            $nomeDoProjeto = $a['nome_projeto'];
            $valorArrecadado = "R$ " . number_format($a['total_doacoes'], 2, ',', '.');
            if ($totalGeral != 0) {
                $percentual = number_format($a['total_doacoes'] * 100 / $totalGeral, 2) . "%";
            } else {
                $percentual = "0%";
            }
            $tabela = $tabela . "
                <tr>
                <td class='projeto'>
                $nomeDoProjeto
                </td>
                <td class='valor'>
                $valorArrecadado
                </td>
                <td class='valor'>
                $percentual
                </td>
                </tr>
                ";
        endforeach;
        $rodape = "
                <td class='projeto'>
                    Total arrecadado:
                </td>
                <td class='valor'>
                    $totalRodape
                </td>
                <td class='valor'>
                    ---
                </td>
                ";


        // Geração do PDF

        ob_start();
        include __DIR__ . '/../report/doacoesProjeto.php';
        $html = ob_get_clean();

        require_once __DIR__ . '/../util/PdfUtil.php';
        $pdfUtil = new PdfUtil();
        $pdfUtil->gerarPdf($html, 'Doações por Projeto.pdf');
    }
}
