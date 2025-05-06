<?php 
    $tituloPagina = 'Relatórios'; // Definir o título da página
    $cssPagina = ["adm/relatorios.css"]; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header-adm.php';
    require_once '../../components/graphics/vertical-bars.php';
    require_once '../../components/graphics/line-graphic.php';
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
                        <svg style = "width: 600px; height: 320px">
                            <?php
                                $indices = [960, 720, 480, 240, 0];
                                $mi = 0;
                                for($i = 1; $i <=293; $i+=73){?>
                                <line x1="40" y1="<?= $i ?>" x2="600" y2="<?= $i ?>" style="stroke: black; stroke-dasharray: 4 "/> <!-- Traça as linhas horizontais -->
                                <text x="0" y="<?= $i+10 ?>"><?=$indices[$mi]?></text>
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

            <!-- Início doações por projeto - Gráfico "PIE" -->

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
                        <svg style = "width: 600px; height: 320px">
                            <line x1="70" y1="0" x2="70" y2="300" style="stroke: gray; stroke-width: 2px"/>
                            <?php
                                $divisoes = 310/sizeof($doacoesVoluntarios);
                                $centroLinha = 30;
                                foreach($doacoesVoluntarios as $dv) {
                                    $lDoacao=($dv[1]*500)/100+70;
                                    $lVoluntario=($dv[2]*500)/100+70;
                            ?>
                            <text x="1" y="<?=$centroLinha?>"><?=$dv[0]?></text>
                            <!-- Linha Doações  -->
                            <line x1="70" y1="<?=$centroLinha-12?>"
                            x2="570" y2="<?=$centroLinha-12?>"
                            style="stroke: #51CD32; stroke-width: 12px; opacity:0.3"/>
                            <line x1="70" y1="<?=$centroLinha-12?>"
                            x2="<?=$lDoacao?>" y2="<?=$centroLinha-12?>"
                            style="stroke: #51CD32; stroke-width: 12px;"/>
                            <text x="<?=$lDoacao+3?>" y="<?=$centroLinha-8?>"><?=$dv[1]?></text>
                            <!-- Linha voluntários -->
                            <line x1="70" y1="<?=$centroLinha+12?>"
                            x2="570" y2="<?=$centroLinha+12?>"
                            style="stroke: #006CA2; stroke-width: 12px; opacity:0.3"/>
                            <line x1="70" y1="<?=$centroLinha+12?>"
                            x2="<?=$lVoluntario?>" y2="<?=$centroLinha+12?>"
                            style="stroke: #006CA2; stroke-width: 12px;"/>
                            <text x="<?=$lVoluntario+3?>" y="<?=$centroLinha+16?>"><?=$dv[2]?></text>

                            <?php
                                $centroLinha += $divisoes;
                            }?>
                    </svg>
                    </div>
                    <!-- <img src="../../assets/images/volunt-doac-relat.png" alt=""> -->

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