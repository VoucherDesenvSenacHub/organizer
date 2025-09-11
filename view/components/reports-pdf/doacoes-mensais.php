<?php
$acesso = 'ong';
require_once '../../components/graphics/line-graphic.php';
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


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Este será o relatório de doações mensais</h1>
    <?php
    for($month = 1; $month <=12; $month++):
        $arrecadacao = $relatorio->painelDeArrecadacao($idOng, $month, $year);
        if($arrecadacao['total_doado'] === null){
            $valorTotal = '0,00';
        }else {
            $valorTotal = $arrecadacao['total_doado'];
        }
        echo "Valor arrecadado em ".$month.'/'.$year.' R$ '.$valorTotal.'<br>';
    endfor;
    // foreach($dadosDasTabelas as $d):
    //     $date = new DateTime($d['data_doacao']);
    //     $mesAtual = $date->format('m');
    //     echo $mesAtual.'<br>';
    // endforeach;
        // echo "<pre>";
        // print_r ($dadosDasTabelas);
        // echo "</pre>";
        // echo "<pre>";
        // print_r ($listaDoacoes);
        // echo "</pre>";
    ?>
</body>
</html>