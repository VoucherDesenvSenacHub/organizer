


<?php
$acesso = 'ong';
$tituloPagina = 'Relatórios | Organizer'; // Definir o título da página
$cssPagina = ["ong/relatorios.css"]; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
require_once '../../components/layout/base-inicio.php';
require_once '../../components/popup/download.php';
require_once '../../components/graphics/vertical-bars.php';
require_once '../../components/graphics/line-graphic.php';
require_once '../../components/graphics/horizontal-double-bars.php';
require_once '../../components/graphics/pie-graph.php';
require_once '../../components/graphics/calcula-graficos.php';
require_once '../../../model/Relatorios.php';
require_once '../../../model/RelatoriosModel.php';

$projetos = new RelatoriosModel();
$listaUsuarios = $projetos->buscarUsuarios();
$contagem_projetos = $projetos->contarProjetos(1);
$listagem_projetos = $projetos->listarProjetos(1);
// $todosProjetos = $projetos->listarTodosProjetos();
// $listarTabela = $projetos->listarTabelas();
// echo pdfVoluntariosPorProjeto($listagem_projetos);
// echo $listagem_projetos[0][0]['nome'];
// echo "<pre>";
// print_r($listagem_projetos);
// echo "</pre>";
?>
<h1>Relatório de apoiadores</h1>
<hr>
<?php 
    $contador = 0;
    foreach ($contagem_projetos as $cp){ ?>
    <h2><?php echo $cp[0] ?></h2>
    <table>
        <thead>
            <th><td>Apoiadores</td></th>
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
    <?php } ?>