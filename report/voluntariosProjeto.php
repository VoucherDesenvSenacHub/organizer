<?php
require_once __DIR__ . '/../model/RelatoriosModel.php';

$projetos = new RelatoriosModel();
$contagem_projetos = $projetos->contarProjetos($idOng); // Relaciona todos os projetos da ONG em uso
$listagem_projetos = $projetos->listarProjetos($idOng); // Relaciona todos os voluntários vinculados à ONG em uso
$totalDeApoiadores = sizeof($listagem_projetos); // Captura a quantidade total de apoiadores da ONG
$dadosPercentuais = "";
foreach($contagem_projetos as $lperc):
    $projeto = $lperc[0];
    $proporcional = number_format($lperc[1]*100/$totalDeApoiadores, 2);
    echo $projeto;
    $dadosPercentuais = $dadosPercentuais."
        <h1>$projeto => $proporcional% dos apoiadores</h1>
    ";
endforeach;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h1, h3 {
            text-align: left;
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
            text-align: left;
            page-break-inside: avoid;
        }
        td,
        th,
        tr {
            page-break-inside: avoid;
        }
        th {
            text-align: left;
        }

        #grafico {
            display: grid;
            place-items: center;
            font-size: 0.5em;
        }
    </style>
</head>

<body class="no-break">
    <h1 class="no-break">Relatório de apoiadores</h1>
    <hr>
    <div id="grafico">
        <?php
            if (count($listagem_projetos) == 0) {
                echo '<h1>Não há projetos ativos cadastrados para essa ONG</h1>';
            } else {
                echo $dadosPercentuais;
            }
        ?>
    </div>
    <hr>
    <?php
        $contador = 0;
        foreach ($contagem_projetos as $cp):
    ?>
    <div class="no-break">
        <h3><?php echo $cp[0] ?></h3>
        <table class="no-break">
            <thead>
                <th>Apoiadores</th>
            </thead>
            <tbody>
                <?php
                    foreach ($listagem_projetos as $lp):
                        if ($cp[0] == $lp['nome_projeto']):
                            $contador++;
                ?>
                        <tr>
                            <td><?php echo $lp['nome_usuario']; ?></td>
                        </tr>
                <?php
                        endif;
                    endforeach;
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <?php
                            echo "Total de apoiadores: " . $contador;
                            $contador = 0;
                        ?>
                    </td>
                </tr>

            </tfoot>
        </table>
        <hr>
    </div>
    <?php endforeach; ?>
</body>
</html>