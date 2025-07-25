<?php
$acesso = 'ong';
$tituloPagina = 'Relatórios | Organizer'; // Definir o título da página
$cssPagina = ["ong/relatorios.css"]; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
require_once '../../components/layout/base-inicio.php';
require_once '../../components/popup/download.php';
?>
<main>
    <div id="principal">
        <div class="titulo">
            <h1><i class="fa-solid fa-chart-pie"></i> PAINEL DE RELATÓRIOS</h1>
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
                        <p>Voluntarios</p>
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

    </div>
</main>

<?php
$jsPagina = ["relatorios.js"]; //Colocar o arquivo .js (exemplo: 'ONG/cadastro.js')
require_once '../../components/layout/footer/footer-logado.php';
?>