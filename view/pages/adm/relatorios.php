<?php 
    $tituloPagina = 'Relatórios'; // Definir o título da página
    $cssPagina = ["adm/relatorios.css"]; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header-adm.php';
    require_once '../../components/graphics/vertical-bars.php';
    require_once '../../components/graphics/line-graphic.php';
    require_once '../../components/graphics/horizontal-double-bars.php';
    require_once '../../../model/Relatorios.php';
?>
    <main>
        <div id="principal">
            <div class="titulo">
                RELATÓRIOS
            </div>

            <div class="cards">
            <!-- Início voluntários por projeto -->
                <div class="card1">
                    <div class="icon">
                    Voluntários por Projeto
                        <button onclick="clicar()"><img src="../../assets/images/icon-download-report.png" alt=""></button>
                    </div>
                    <div class="graficos">
                        <?php 
                            echo graficoBarrasVerticais([100, 75, 50, 25, 0], 600, 320, $voluntarios);
                        ?>
                    </div>
                </div>
            <!-- Fim voluntários por Projeto -->
            
            <!-- Início doações Mensais -->
                <div class="card1">
                    <div class="icon">
                        Doações Mensais
                        <button onclick="clicar()"><img src="../../assets/images/icon-download-report.png" alt=""></button>
                    </div>
                    <div class="grafico-linhas">
                    <?php echo graficoLinhas([960, 720, 480, 240, 0], 600, 320, $doacoesMensais)?>                        
                        
                    </div>
                </div>
            <!-- Fim doações Mensais -->

            <!-- Início doações por projeto - Gráfico "PIE" -->

                <div class="card1">
                    <div class="icon">
                        Doações por projeto
                        <button onclick="clicar()"><img src="../../assets/images/icon-download-report.png" alt=""></button>
                    </div>
                    <img src="../../assets//images/pie-graph.png" alt="" id="pie-graph">
                </div>
            <!-- Fim doações por projeto -->

            <!-- Início doações voluntários por projeto -->
                <div class="card1">
                    <div class="icon">
                        Doações/Voluntários por Projeto
                        <button onclick="clicar()"><img src="../../assets/images/icon-download-report.png" alt=""></button>
                        
                    </div>
                    <div class="grafico-horizontal">
                        <?php echo graficoHorizontalDuplo(600, 320, $doacoesVoluntarios)?>
                        
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
                <img src="../../assets/images/icon.png" alt="">
                <p>Download Iniciado</p>
            </div>

        </div>
    </main>
    
<?php
    $jsPagina = ["relatorios.js"]; //Colocar o arquivo .js (exemplo: 'ONG/cadastro.js')
    require_once '../../components/footer.php';
?>