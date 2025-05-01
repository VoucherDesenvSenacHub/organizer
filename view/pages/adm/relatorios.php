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
                    <div class="graficos">
                        <svg style = "width: 600px; height: 320px;">
                            <?php
                                $indices = [100, 75, 50, 25, 0];
                                $mi = 0;
                                // Traça as linhas horizontais e índices
                                for($i = 1; $i <=293; $i+=73){?>
                                <line x1="40" y1="<?= $i ?>" x2="600" y2="<?= $i ?>" style="stroke: black; stroke-dasharray: 4 "/> 
                                <text x="0" y="<?= $i+15 ?>" textlenght="7"><?=$indices[$mi]?></text>
                            <?php
                                $mi++;
                                };
                                ?>
                                <!-- Traça as linhas verticais extremas da esquerda e direita -->
                            <line x1="40" y1="0" x2="40" y2="290" style="stroke: black; stroke-dasharray: 4 "/>
                            <line x1="599" y1="0" x2="599" y2="290" style="stroke: black; stroke-dasharray: 4 "/>
                                <?php
                                    $divisoes = (540/sizeof($voluntarios));
                                    $pontoX = 40+($divisoes/2); //Posição inicial do gráfico
                                    for($i = 0; $i<sizeof($voluntarios); $i++){
                                        $pontoY = 290 - (($voluntarios[$i][1]*290)/100); //Calcula a altura da barra vertical?> 
                            <line x1="<?=$pontoX?>" y1="290"
                            x2="<?=$pontoX?>"y2 ="<?=$pontoY?>"
                            style="stroke: #8DD9FF; stroke-width: 40px"/>
                            <text x="<?=$pontoX-($divisoes/2)+15?>" y="320"><?=$voluntarios[$i][0]?></text>
                            <text x="<?=$pontoX-5?>" y="<?=$pontoY-3?>"><?=$voluntarios[$i][1]?></text>
                                <?php
                                    $pontoX = $pontoX+$divisoes;
                                }?>
                        
                        </svg>
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
                        <svg style = "width: 600px; height: 320px">
                            <?php
                                $indices = [960, 720, 480, 240, 0];
                                $mi = 0;
                                for($i = 1; $i <=293; $i+=73){?>
                                <line x1="40" y1="<?= $i ?>" x2="600" y2="<?= $i ?>" style="stroke: black; stroke-dasharray: 4 "/> <!-- Traça as linhas horizontais -->
                                <text x="0" y="<?= $i+15 ?>"><?=$indices[$mi]?></text>
                            <?php
                                $mi++;
                                };
                            for($i = 0; $i < sizeof($doacoesMensais); $i++){
                                $localTexto = ($i*46.66)+40;                                
                                ?>
                            <text x="<?= $localTexto ?>" y="315" textlenght="7"><?=$doacoesMensais[$i][0] ?></text>
                            <line x1="<?= $localTexto ?>" y1="1" x2="<?= $localTexto ?>" y2="293" style="stroke: black; stroke-dasharray: 4 "/>
                            <?php }?>
                            <line x1="599" y1="1" x2="599" y2="293" style="stroke: black; stroke-dasharray: 4 "/>
                        <?php
                            $x1 = 60;
                            $x2 = $x1+46.66;
                            for($i = 0; $i < sizeof($doacoesMensais); $i++){
                            $localPonto = 293 - (293 * $doacoesMensais[$i][1]/960);
                            if($i == sizeof($doacoesMensais)-1){
                                $localPonto2 = $localPonto;
                                $x2 = $x1;
                            }else{
                                $localPonto2 = 293 - (293 * $doacoesMensais[$i+1][1]/960);
                            }
                            ?>
                                <line x1="<?=$x1?>" y1="<?=$localPonto?>" x2="<?=$x2?>" y2="<?=$localPonto2?>"
                                style="stroke: #007AFF; stroke-width: 2;"/>
                                <circle r="4" cx="<?=$x1?>" cy="<?=$localPonto?>" fill="#007AFF"/>
                                
                                <?php
                                    $x1 += 46.66;
                                    $x2 += 46.66;
                                }
                                ?>
                        </svg>
                    </div>
                </div>
            <!-- Fim doações Mensais -->

            <!-- Início doações por projeto -->

                <div class="card1">
                    <div class="icon">
                        Doações por projeto
                        <button onclick="clicar()"><img src="../../assets/images/icon-download-report.png" alt=""></button>
                    </div>
                    <!-- <div>
                        <svg width="600" height="300">
                            <path style="stroke: #000; fill: none;" d="M0,0 c150,0 300,150 300,300
                            
                            "/>
                            <circle cx="300" cy="150" r="145" style="stroke: #000; fill: none;"/>
                        </svg>
                    </div> -->
                    <!-- <img src="../../assets//images/pie-graph.png" alt="" id="pie-graph"> -->
                </div>
            <!-- Fim doações por projeto -->

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