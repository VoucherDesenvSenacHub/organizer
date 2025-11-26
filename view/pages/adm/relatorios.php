<?php
$acesso = 'adm';
$tituloPagina = 'Relatórios | Organizer';
$cssPagina = ["adm/relatorios.css"]; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
require_once '../../components/layout/base-inicio.php';
require_once '../../components/graphics/vertical-bars.php';
require_once '../../components/graphics/line-graphic.php';
require_once '../../components/graphics/horizontal-double-bars.php';
require_once '../../components/graphics/pie-graph.php';
require_once '../../components/graphics/calcula-graficos.php';
// require_once '../../../model/Relatorios.php';
require_once __DIR__ . '/../../../autoload.php';
$load = false;
// valores padrão para evitar avisos quando a página é carregada sem POST
$load = false;
$largura = 600;
$altura = 300;
// dados padrão (vazios) para gráficos — formato esperado pelas funções de renderização
$voluntarios = [["Nenhum projeto", 0]]; // para graficoBarrasVerticais: [ [nome, qtd], ... ]
$doacoesVoluntarios = [["Nenhum projeto", 0, 0]]; // para graficoHorizontalDuplo: [ [nome, doacoesPercent, voluntariosPercent], ... ]
$doacoesPorProjeto = [["Nenhum projeto", 0]]; // para graficoPizza quando não há ong_id disponível
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $largura = isset($_POST['largura']) ? (int)$_POST['largura'] : $largura;
    $altura = isset($_POST['altura']) ? (int)$_POST['altura'] : $altura;
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
                <!-- Início voluntários por projeto -->
                <div class="card1">
                    <div class="icon">
                        Apoiadores por Projeto
                        <button onclick="clicar()"><img src="../../assets/images/pages/ong/relatorios/icon-download.png" alt=""></button>
                    </div>
                    <div class="graficos">
                        <?php
                        // Assinatura: graficoBarrasVerticais($width, $height, $dados)
                        echo graficoBarrasVerticais($largura, $altura, $voluntarios);
                        ?>
                    </div>
                </div>
                <!-- Fim voluntários por Projeto -->

                <!-- Início doações Mensais -->
                <div class="card1">
                    <div class="icon">
                        Doações Mensais
                        <button onclick="clicar()"><img src="../../assets/images/pages/ong/relatorios/icon-download.png" alt=""></button>
                    </div>
                    <div class="grafico-linhas">
                        <?php
                        // graficoLinhas($width, $height, $idOng)
                        // Como esta é a visão de admin, passamos 0 (nenhuma ONG específica) para evitar erros.
                        echo graficoLinhas($largura, $altura, 0);
                        ?>

                    </div>
                </div>
                <!-- Fim doações Mensais -->

                <!-- Início doações por projeto - Gráfico "PIE" -->
                <div class="card1">
                    <div class="icon">
                        Doações por projeto
                        <button onclick="clicar()"><img src="../../assets/images/pages/ong/relatorios/icon-download.png" alt=""></button>
                    </div>
                    <div class="grafico-pizza">
                        <?php
                        // graficoPizza($width, $height, $idOng)
                        // Sem uma ONG específica, passamos 0 para gerar um gráfico vazio/indicativo
                        echo graficoPizza($largura, $altura, 0);
                        ?>
                    </div>
                </div>
                <!-- Fim doações por projeto -->

                <!-- Início doações voluntários por projeto -->
                <div class="card1">
                    <div class="icon">
                        Doações/Apoiadores por Projeto
                        <button onclick="clicar()"><img src="../../assets/images/pages/ong/relatorios/icon-download.png" alt=""></button>

                    </div>
                    <div class="grafico-horizontal">
                        <?php echo graficoHorizontalDuplo($largura, $altura, $doacoesVoluntarios) ?>

                    </div>
                    <div class="quadrado2">
                        <img src="../../assets/images/greenSquare.png" alt="">
                        <p>Doações</p>
                        <img src="../../assets/images/blueSquare.png" alt="">
                        <p>Voluntários</p>
                    </div>
                </div>
            </div>
            <!-- Fim doações voluntários por projeto -->
            <div id="download">
                <i class="fa-solid fa-download"></i>
                <p>Download Iniciado</p>
            </div>
        </div>
    </section>
</main>

<?php
$jsPagina = ["relatorios.js"];
require_once '../../components/layout/footer/footer-logado.php';
?>