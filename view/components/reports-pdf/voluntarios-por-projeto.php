<?php
$acesso = 'ong';
require_once '../../components/graphics/vertical-bars.php';
require_once '../../../model/RelatoriosModel.php';

$projetos = new RelatoriosModel();
$contagem_projetos = $projetos->contarProjetos(4);
$listagem_projetos = $projetos->listarProjetos(4);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* * {
            box-sizing: border-box;
        } */
        body {
            margin: 0;
            padding: 0;
            width: 800px;
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

        tr:nth-child(odd) {
            background-color: #a8a7a5;
        }

        tr:nth-child(odd) {
            background-color: #dedcd7;
        }

        td,
        th,
        tr {
            page-break-inside: avoid;
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
    <div id="grafico">
        <?php
            if ($listagem_projetos === "Não há projetos ativos cadastrados para essa ONG") {
                echo '<h1>Não há projetos ativos cadastrados para essa ONG</h1>';
            } else {
                echo graficoBarrasVerticais(600, 320, $contagem_projetos);
            }
        ?>
    </div>
    <?php
        $contador = 0;
        foreach ($contagem_projetos as $cp):
    ?>
    <div class="no-break">
        <h2><?php echo $cp[0] ?></h2>
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
    </div>
    <?php endforeach; ?>
</body>
</html>
