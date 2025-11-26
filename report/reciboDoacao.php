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
        body {
            margin: 50px;
            text-align: justify;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
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
    <h3><?= $ong ?></h3>
    <h3>CNPJ: <?= $cnpj_formatado ?></h3>

</body>
</html>
