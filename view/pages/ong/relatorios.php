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
require_once '../../../model/OngModel.php';
require_once '../../../model/ProjetoModel.php';

$projetos = new RelatoriosModel();
$apoiadores = new ProjetoModel();
$novasOngs = new OngModel();
$listaUsuarios = $projetos->buscarUsuarios();
$listaApoiadores = $apoiadores->buscarApoiadoresProjeto(1);
$listagem_projetos = $projetos->listarProjetos(3);
$todosProjetos = $projetos->listarTodosProjetos();
// echo "<pre>";
// print_r($todosProjetos);
// echo "</pre>";
$load = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $largura = $_POST['largura'];
    $altura = $_POST['altura'];
    $load = true;
}
?>
<main>
    <?php echo calculaGraficos($load); ?>
    <div id="principal">
        <div class="titulo">
            <h1><i class="fa-solid fa-chart-pie"></i> PAINEL DE RELATÓRIOS</h1>
        </div>

        <div class="cards">
            <div class="card1">
                <div class="icon">
                    Voluntários por Projeto
                    <button onclick="clicar()"><img src="../../assets/images/pages/ong/relatorios/icon-download.png" alt=""></button>

                </div>

                <div class="graficos">
                <?php
                    echo graficoBarrasVerticais($largura, $altura, $listagem_projetos);
                ?>
                </div>
            </div>

            <div class="card1">
                <div class="icon">
                    Doações Mensais
                    <button onclick="clicar()"><img src="../../assets/images/pages/ong/relatorios/icon-download.png" alt=""></button>
                </div>
                <div class="grafico-linhas">
                    <?php echo graficoLinhas([960, 720, 480, 240, 0], $largura, $altura, $doacoesMensais) ?>
                </div>
            </div>

            <div class="card1">
                <div class="icon">
                    Doações por projeto
                    <button onclick="clicar()"><img src="../../assets/images/pages/ong/relatorios/icon-download.png" alt=""></button>
                </div>
                <div class="grafico-pizza">
                    <?php echo graficoPizza($largura, $altura, $doacoesPorProjeto) ?>
                </div>
            </div>

            <div class="card1">
                <div class="icon">
                    Doações/Voluntários por Projeto
                    <button onclick="clicar()"><img src="../../assets/images/pages/ong/relatorios/icon-download.png" alt=""></button>
                </div>
                <div class="grafico-horizontal">
                    <?php echo graficoHorizontalDuplo($largura, $altura, $doacoesVoluntarios) ?>
                </div>
            </div>
        </div>

    </div>
</main>

<?php
$jsPagina = ["relatorios.js"]; //Colocar o arquivo .js (exemplo: 'ONG/cadastro.js')
require_once '../../components/layout/footer/footer-logado.php';
?>