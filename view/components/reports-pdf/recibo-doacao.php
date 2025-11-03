<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo Doação</title>
    <style>
        h1, h2, h3 {
            text-align: center;
        }
        p {
            text-indent: 30px;
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
    <h1>RECIBO</h1>
    <p>Declaramos para os devidos fins que recebemos de <?= $nome ?> a importância de <strong><?= $valor ?></strong>, referente a contribuição financeira para custeio do projeto <strong><?= $projeto ?>.</strong>, de responsabilidade da instituição <strong><?= $ong ?></strong></p>
    <br><br><br>
    <h3><?= $cidade ?>, <?= $data?></h3>
    <h2><?= $ong ?></h2>

</body>
</html>
