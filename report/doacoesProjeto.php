<?php
$acesso = 'ong';
require_once __DIR__ . '/../model/RelatoriosModel.php';
require_once __DIR__ . '/../model/OngModel.php';

$ongs = new OngModel();
$relatorio = new RelatoriosModel();
$arrecadacao = $relatorio->somarArrecadacaoProjetos($idOng);
$totalGeral = 0;
foreach($arrecadacao as $a):
    $totalGeral += $a['total_doacoes'];
endforeach;
$totalRodape = "R$ ".number_format($totalGeral, 2, ',','.');
$tabela = "";
foreach($arrecadacao as $a):
    $nomeDoProjeto = $a['nome_projeto'];
    $valorArrecadado = "R$ ".number_format($a['total_doacoes'], 2, ',','.');
    if($totalGeral != 0){
        $percentual = number_format($a['total_doacoes']*100/$totalGeral, 2)."%";
    }else{
        $percentual = "0%";
    }
    $tabela = $tabela."
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
        tfoot {
            font-weight: bold;
        }
        .valor {
            width: 150px;
            text-align: right;
        }
        .projeto {
            width: 280px;
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
    <h2>Relatório de arrecadação total por projeto</h2>
    <table class="no-break">
        <thead>
            <th>Projeto</th>
            <th>Valor - R$</th>
            <th>Percentual (%)</th>
        </thead>
        <tbody>
            <?= $tabela ?>
        </tbody>
        <tfoot>
            <?= $rodape ?>
        </tfoot>
    </table>
    </body>
</html>