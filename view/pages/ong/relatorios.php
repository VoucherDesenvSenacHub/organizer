<?php
$acesso = 'ong';
$tituloPagina = 'Relatórios | Organizer'; // Definir o título da página
$cssPagina = ["ong/relatorios.css"]; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
require_once '../../components/layout/base-inicio.php';
require_once '../../components/popup/download.php';
?>
<main class="conteudo-principal">
    <section>
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

                    <div class="sub">

                        <img src="../../assets/images/pages/ong/relatorios/grafico-1.png" alt="">

                        <div class="quadrado">
                            <img src="../../assets/images/pages/ong/relatorios/legenda-1.png" alt="">
                            <p>Voluntarios</p>
                        </div>

                    </div>
                </div>

                <div class="card1">
                    <div class="icon">
                        Doações Mensais
                        <button onclick="clicar()"><img src="../../assets/images/pages/ong/relatorios/icon-download.png" alt=""></button>
                    </div>
                    <img src="../../assets/images/pages/ong/relatorios/grafico-2.png" alt="">
                    <div class="sub">
                        <img src="../../assets/images/pages/ong/relatorios/legenda-2.png" alt="">
                    </div>
                </div>

                <div class="card1">
                    <div class="icon">
                        Doações por projeto
                        <button onclick="clicar()"><img src="../../assets/images/pages/ong/relatorios/icon-download.png" alt=""></button>
                    </div>
                    <img src="../../assets//images/pages/ong/relatorios/grafico-3.png" alt="" id="pie-graph">
                </div>

                <div class="card1">
                    <div class="icon">
                        Doações/Voluntários por Projeto
                        <button onclick="clicar()"><img src="../../assets/images/pages/ong/relatorios/icon-download.png" alt=""></button>
                    </div>
                    <img src="../../assets/images/pages/ong/relatorios/grafico-4.png" alt="">

                    <div class="quadrado2">
                        <img src="../../assets/images/pages/ong/relatorios/legenda-3.png" alt="">
                        <p>Doações</p>
                        <img src="../../assets/images/pages/ong/relatorios/legenda-4.png" alt="">
                        <p>Voluntários</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
$jsPagina = ["relatorios.js"]; //Colocar o arquivo .js (exemplo: 'ONG/cadastro.js')
require_once '../../components/layout/footer/footer-logado.php';
?>