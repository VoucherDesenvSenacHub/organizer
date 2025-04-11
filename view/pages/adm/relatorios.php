<?php 
    $tituloPagina = 'Relatórios'; // Definir o título da página
    $cssPagina = ["adm/relatorios.css"]; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header-adm.php';
    require_once '../../../model/Relatorios.php';
?>
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
                    <div class="grafico">
                        <div class="eixo-y">
                            <p>100</p>
                            <p>75</p>
                            <p>50</p>
                            <p>25</p>
                            <p>0</p>
                        </div>
                        <div class="grade">
                            <div class="linha"></div>
                            <div class="linha"></div>
                            <div class="linha"></div>
                            <div class="linha"></div>
                        </div>
                    </div>
                    <div class="barras-verticais">
                        <?php foreach($voluntarios as $vol){
                        $altura = $vol[1] * 200 / 100?>
                        <div class="barra" style="height: <?php echo ($altura)?>px;">
                            <p><?= $vol[1]?></p>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="rodape-grafico">
                        <?php foreach($voluntarios as $vol){?>
                        <div>
                            <p><?php echo($vol[0]);?> </p>
                        </div>
                        <?php }?>
                    </div>

                    <!-- <div class="sub">
                        
                        <img src="../../assets/images/graph-vol-proj.png" alt="">

                        <div class="quadrado">
                            <img src="../../assets/images/SquareFill.png" alt="">
                            <p>voluntarios</p>
                        </div>

                    </div> -->
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
