<?php

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
        /* p {
            text-indent: 30px;
        }
        @page {
            margin: 1cm 1cm 2cm 1cm;
        } */
        body {
            margin: 50px;
            text-align: justify;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1.3em;
        }
        .no-break {
            page-break-inside: avoid;
            page-break-before: avoid;
            page-break-after: avoid;
        }
    </style>
</head>
<body>
    <h1>RECIBO</h1>
    <br><br><br>
    <p>Declaramos para os devidos fins que recebemos do(a) Sr.(a) <strong> <?= $nome ?> </strong> a importância de <strong><?= $valor ?></strong>, referente a contribuição financeira para custeio do projeto <strong><?= $projeto ?>.</strong>, de responsabilidade da instituição <strong><?= $ong ?></strong>.</p>
    <br><br><br>
    <h3><?= $cidade ?> - <?= $estado ?>, <?= $data?></h3>
    <br><br><br>
    <h2><?= $ong ?></h2>
    <h3>CNPJ: <?= $cnpj_formatado ?></h3>

</body>
</html>
