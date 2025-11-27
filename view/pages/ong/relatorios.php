<?php
$acesso = 'ong';
$tituloPagina = 'Relatórios | Organizer'; // Definir o título da página
$cssPagina = ["ong/relatorios.css"]; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
require_once '../../components/layout/base-inicio.php';
require_once '../../components/popup/download.php';
require_once '../../components/graphics/vertical-bars.php';
require_once '../../components/graphics/line-graphic.php';
require_once '../../components/graphics/pie-graph.php';
require_once '../../components/graphics/calcula-graficos.php';
require_once '../../../model/RelatoriosModel.php';

$projetos = new RelatoriosModel();
$IdOng = $_SESSION['ong_id'];
$listaUsuarios = $projetos->buscarUsuarios();
$contagem_projetos = $projetos->contarProjetos($IdOng);
$arrecadaProjetos = $projetos->somarArrecadacaoProjetos($IdOng);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $largura = $_POST['largura'];
    $altura = $_POST['altura'];
    $load = true;
}
?>
<main class="conteudo-principal">
    <?php echo calculaGraficos($load); ?>
    <section>
        <div id="principal">
            <div class="titulo">
                <h1><i class="fa-solid fa-chart-pie"></i> PAINEL DE RELATÓRIOS</h1>
            </div>
            <div class="cards">
                <div class="card1">
                    <div class="icon">
                        Apoiadores por Projeto
                        <form action="../../../controller/RelatorioController.php" method="POST">
                            <input type="hidden" value="<?= $IdOng ?>" name="id-ong" id="id-ong">
                            <input type="hidden" value="voluntarios" name="relatorio" id="relatorio">
                            <button onclick="clicar()">
                                <img src="../../assets/images/pages/ong/relatorios/icon-download.png" alt="">
                            </button>
                        </form>
                    </div>
                    <div class="graficos">
                        <?php
                        if (isset($load) && $load === true) {
                            echo graficoBarrasVerticais($largura, $altura, $contagem_projetos);
                        }
                        ?>
                    </div>
                </div>
                <div class="card1">
                    <div class="icon">
                        Doações Mensais
                        <form action="../../../controller/RelatorioController.php" method="POST">
                            <input type="hidden" value="<?= $IdOng ?>" name="id-ong" id="id-ong">
                            <input type="hidden" value="doacoes-mensais" name="relatorio" id="relatorio">
                            <button onclick="clicar()"><img src="../../assets/images/pages/ong/relatorios/icon-download.png" alt=""></button>
                        </form>
                    </div>
                    <div class="grafico-linhas">
                        <?php 
                        if (isset($load) && $load === true) {
                            echo graficoLinhas($largura, $altura, $IdOng);
                        }
                        ?>
                    </div>
                </div>
                <div class="card1">
                    <div class="icon">
                        Doações por projeto
                        <form action="../../../controller/RelatorioController.php" method="POST">
                            <input type="hidden" value="<?= $IdOng ?>" name="id-ong" id="id-ong">
                            <input type="hidden" value="doacoes-projeto" name="relatorio" id="relatorio">
                            <button onclick="clicar()"><img src="../../assets/images/pages/ong/relatorios/icon-download.png" alt=""></button>
                        </form>
                        <!-- <button onclick="clicar()"><img src="../../assets/images/pages/ong/relatorios/icon-download.png" alt=""></button> -->
                    </div>
                    <div class="grafico-pizza">
                        <?php
                        if (isset($load) && $load === true) {
                            echo graficoPizza($largura, $altura, $IdOng);
                        }
                        ?>
                    </div>
                </div>
            </div>
    </section>
</main>
<?php
$jsPagina = ["relatorios.js"];
require_once '../../components/layout/footer/footer-logado.php';
?>