<?php
$acesso = 'ong';
require_once '../../components/graphics/line-graphic.php';
require_once '../../../model/RelatoriosModel.php';
require_once '../../../model/OngModel.php';

$ongs = new OngModel();
$doacoes = $ongs->buscarDoadores($idOng);
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
        echo "<pre>";
        print_r ($doacoes);
        echo "</pre>";
    ?>
</body>
</html>