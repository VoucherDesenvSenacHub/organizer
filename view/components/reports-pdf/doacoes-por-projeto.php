<?php
$acesso = 'ong';
require_once '../../components/graphics/pie-graphic.php';
require_once '../../../model/RelatoriosModel.php';
require_once '../../../model/OngModel.php';

$ongs = new OngModel();
$relatorio = new RelatoriosModel();
$doacoes = $ongs->buscarDoadores($idOng);
$listaDoacoes = $ongs->dashboardOng($idOng);
$dadosDasTabelas = $relatorio->listarDadosTabela($idOng);
$year = date('Y');
$projetos = new RelatoriosModel();
$contagem_projetos = $projetos->contarProjetos($idOng);
$listagem_projetos = $projetos->listarProjetos($idOng);
$mesPorExtenso = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
                  'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <style>
        h1, h2, h3 {
            text-align: center;
        }
        @page {
            margin: 1cm 1cm 2cm 1cm;
        }
        body {
            margin: 50px;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1em;
        }
        .no-break {
            page-break-inside: avoid;
            page-break-before: avoid;
            page-break-after: avoid;
        }

        table {
            margin: auto;
            text-align: left;
            border: 1px solid black;
            page-break-inside: avoid;
            border-collapse: collapse;
        }
        td,
        th,
        tr {
            page-break-inside: avoid;
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
        th {
            text-align: left;
        }
        .valor {
            text-align: right;
        }
        .mes {
            text-align: left;
        }

        #grafico {
            display: grid;
            place-items: center;
            font-size: 0.5em;
        }
    </style>

</head>
<body>
    <h1>Relatório de arrecadação mensal</h1>
    <h2>Exercício <?php echo $year ?></h2>
    <table class="no-break">
        <thead>
            <th>Mês</th>
            <th>Valor - R$</th>
        </thead>
        <tbody>
            <?php
            $totalAnual = 0;
                for($month = 1; $month <=12; $month++): 
                    $arrecadacao = $relatorio->painelDeArrecadacao($idOng, $month, $year);
                    if($arrecadacao['total_doado'] === null){
                        $valorTotal = 0;
                    }else {
                        $valorTotal = (float)$arrecadacao['total_doado'];
                        $totalAnual += $valorTotal;
                    }
                    $valorTotal = number_format($valorTotal, 2, ',','.');
                ?>
                <tr>
                    <td class="mes">
                        <?= $mesPorExtenso[$month-1] ?>
                    </td>
                    <td class="valor">
                        <?= $valorTotal ?>
                    </td>
                </tr>
            <?php
                endfor;
            ?>
        </tbody>
        <tfoot>
            <td>Total arrecadado R$</td>
            <td class="valor"><?= number_format($totalAnual, 2,',','.');?></td>
        </tfoot>
    </table>
    
    
</body>
</html>