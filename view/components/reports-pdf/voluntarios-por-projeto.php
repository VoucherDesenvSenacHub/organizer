<?php
$acesso = 'ong';
require_once '../../components/graphics/vertical-bars.php';
require_once '../../components/graphics/line-graphic.php';
require_once '../../components/graphics/horizontal-double-bars.php';
require_once '../../components/graphics/pie-graph.php';
require_once '../../components/graphics/calcula-graficos.php';
require_once '../../../model/Relatorios.php';
require_once '../../../model/RelatoriosModel.php';

$projetos = new RelatoriosModel();
$listaUsuarios = $projetos->buscarUsuarios();
$contagem_projetos = $projetos->contarProjetos(3);
$listagem_projetos = $projetos->listarProjetos(3);
// $todosProjetos = $projetos->listarTodosProjetos();
// $listarTabela = $projetos->listarTabelas();
// echo pdfVoluntariosPorProjeto($listagem_projetos);
// echo $listagem_projetos[0][0]['nome'];
// echo "<pre>";
// print_r($listagem_projetos);
// echo "</pre>";
$pagina = "

";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            width: 800px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1em;
        }
        table {
            text-align: left;
        }
        tr:nth-child(odd) {
            background-color: #a8a7a5;
        }
        tr:nth-child(odd) {
            background-color: #dedcd7;
        }
        #grafico {
            display: grid;
            place-items: center;
            font-size: 0.5em;
        }
    </style>
</head>
<body>
    
</body>
</html>
<h1>Relatório de apoiadores</h1>
<hr>
<div id="grafico">
<?php
    if($listagem_projetos === "Não há projetos ativos cadastrados para essa ONG"){
        echo '<h1>Não há projetos ativos cadastrados para essa ONG</h1>';
    }else {

    echo graficoBarrasVerticais(600, 320, $contagem_projetos);
    echo '<hr>';
    $contador = 0;
    foreach ($contagem_projetos as $cp){ ?>
    </div>
    <hr>
    <h2><?php echo $cp[0] ?></h2>
    <hr>
    <table>
        <thead>
            <th>Apoiadores</th>
        </thead>        
        <tbody>
            <?php foreach($listagem_projetos as $lp) {
                if($cp[0] == $lp['nome_projeto']){ ?>
            <tr><td><?php echo $lp['nome_usuario']; ?></td></tr>
            <?php 
            $contador ++;
        }}?>
        </tbody>
        <tfoot>
            <tr>
                <td><?php
        echo "Total de apoiadores: ".$contador;
        $contador = 0; ?></td>
            </tr>

        </tfoot>
    </table>
    <hr>
    <?php }} ?>
