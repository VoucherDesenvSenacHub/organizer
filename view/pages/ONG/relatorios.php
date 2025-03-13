<?php 
    $tituloPagina = 'Relatórios'; // Definir o título da página
    $cssPagina = ["ONG/relatorios.css"]; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header.php';
?>
 <!-- <main>
        <section>
            <div id="principal">
                <div class="topo-relatorios">
                    <h1>RELATÓRIOS</h1>
                </div>
                <div class="conteudo-relatorios">
                    <div class="relatorio-voluntarios">
                        <div class="topo-grafico">
                            <h2>Voluntários por Projeto</h2>
                            <button>
                                <img src="../../assets/images/icon-download-report.png" alt="">
                            </button>
                        </div>
                            <img src="../../assets/images/graph-vol-proj.png" alt="">
                        <span class="rodape-grafico">
                            <img src="../assets/images/SquareFill.png" alt="">
                            <p>Voluntários</p>
                        </span>
                    </div>
                    <div class="relatorio-doacoes-mensais">
                        <div class="topo-grafico">
                            <h2>Doações Mensais</h2>
                            <button>
                                <img src="../assets/images/icon-download-report.png" alt="">
                            </button>
                        </div>
                        <img src="../../assets/images/montly-donation.png" alt="">
                        <span class="rodape-grafico">
                            <img src="../assets/images/donation.png" alt="">
                            <p>Doações</p>
                        </span>
                    </div>
                    <div class="relatorio-doacoes-projeto">
                        <div class="topo-grafico">
                            <h2>Doações por Projeto</h2>
                            <button>
                                <img src="../../assets/images/icon-download-report.png" alt="">
                            </button>
                        </div>
                        <img src="../../assets//images/pie-graph.png" alt="" id="pie-graph">
                        <img src="../assets//images/legend-pie-graph.png" alt="" id="legend-pie-graph">
                    </div>
                    <div class="relatorio-doacoes-voluntario">
                        <div class="topo-grafico">
                            <h2>Doações/Voluntários por Projeto</h2>
                            <button>
                                <img src="../../assets/images/icon-download-report.png" alt="">
                            </button>
                        </div>
                        <img src="../assets/images/yAxisTop.png" alt="" id="axis">
                        <img src="../assets/images/volunt-doac-relat.png" alt="">
                        <span class="rodape-grafico">
                            <img src="..//assets/images/greenSquare.png" alt="">
                            <p>Doações</p>
                            <img src="../../assets/images/blueSquare.png" alt="">
                            <p>Voluntários</p>
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </main>

     -->




    <main>
        <div id="principal">
            <div class="titulo">
                RELATÓRIOS
            </div>

            <div class="cards">
                <div class="card1">
                    <div class="icon">
                    Voluntários por Projeto
                        <button onclick="clicar()"><img src="../../assets/images/icon-download-report.png" alt=""></button>
                        
                    </div>

                    <div class="sub">
                        
                        <img src="../../assets/images/graph-vol-proj.png" alt="">

                        <div class="quadrado">
                            <img src="../../assets/images/SquareFill.png" alt="">
                            <p>voluntarios</p>
                        </div>

                    </div>
                </div>

                <div class="card1">
                    <div class="icon">
                        Doações Mensais
                        <button onclick="clicar()"><img src="../../assets/images/icon-download-report.png" alt=""></button>
                    </div>
                    <img src="../../assets/images/grafico2.png" alt="">
                    <div class="sub">
                        <img src="../../assets/images/Legends2.png" alt="">
                    </div>
                </div>

                <div class="card1">
                    <div class="icon">
                        Doações por projeto
                        <button onclick="clicar()"><img src="../../assets/images/icon-download-report.png" alt=""></button>
                    </div>
                    <img src="../../assets//images/pie-graph.png" alt="" id="pie-graph">
                </div>

                <div class="card1">
                    <div class="icon">
                        Doações/Voluntários por Projeto
                        <button onclick="clicar()"><img src="../../assets/images/icon-download-report.png" alt=""></button>
                    </div>
                    <img src="../../assets/images/volunt-doac-relat.png" alt="">

                    <div class="quadrado2">
                        <img src="../../assets/images/greenSquare.png" alt="">
                        <p>Doações</p>
                        <img src="../../assets/images/blueSquare.png" alt="">
                        <p>Voluntários</p>
                    </div>
                </div>
            </div>

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
