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
            <!-- Início voluntários por projeto -->
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
                        $altura = $vol[1] * 280 / 100?>
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
                </div>
            <!-- Fim voluntários por Projeto -->
            
            <!-- Início doações Mensais -->
                <div class="card1">
                    <div class="icon">
                        Doações Mensais
                        <button onclick="clicar()"><img src="../../assets/images/icon-download-report.png" alt=""></button>
                    </div>
                    <div class="grafico">
                        <div class="eixo-y">
                            <p>960</p>
                            <p>720</p>
                            <p>480</p>
                            <p>240</p>
                            <p>0</p>
                        </div>
                        <div class="grade">
                            <div class="linha"></div>
                            <div class="linha"></div>
                            <div class="linha"></div>
                            <div class="linha"></div>
                        </div>
                    </div>
                    <div class="grafico-linhas">
                        <?php foreach($doacoesMensais as $ponto){
                            $localPonto = ($ponto[1] /5) - 135;
                            ?>
                            <div class="ponto" style="bottom: <?php echo $localPonto . 'px;'?>">
                                <svg width="200" height="200" >
                                    <line x1="0" y1="<?=$localPonto?>" x2="100" y2="100" style="stroke: blue; stroke-width: 2;"/>
                                </svg>
                            </div>
                            
                        <?php } ?>

                    </div>
                    <div class="rodape-grafico">
                        <?php foreach($doacoesMensais as $mes){?>
                        <div>
                            <p><?php echo($mes[0]);?> </p>
                        </div>
                        <?php }?>
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