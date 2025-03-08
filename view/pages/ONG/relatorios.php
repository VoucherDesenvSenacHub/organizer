<?php 
    $tituloPagina = 'Relatórios'; // Definir o título da página
    $cssPagina = ["ONG/relatorios.css"]; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header.php';
?>
    <main>
        <div id="principal">
            <div class="titulo">
                RELATÓRIOS
            </div>

            <div class="cards">
                <div class="card1">
                    <div class="icon">
                        Projetos ativos/inativos
                        <button onclick="clicar()"><img src="assets/imgs/icon.png" alt=""></button>
                    </div>
                    <img src="assets/imgs/grafico1.png" alt="grafico">
                    <div class="sub">
                        <img src="assets/imgs/Legends1.png" alt="">
                    </div>
                </div>

                <div class="card1">
                    <div class="icon">
                        Doações
                        <button onclick="clicar()"><img src="assets/imgs/icon.png" alt=""></button>
                    </div>
                    <img src="assets/imgs/grafico2.png" alt="">
                    <div class="sub">
                        <img src="assets/imgs/Legends2.png" alt="">
                    </div>
                </div>

                <div class="card1">
                    <div class="icon">
                        Acessos no sistema
                        <button onclick="clicar()"><img src="assets/imgs/icon.png" alt=""></button>
                    </div>
                    <img src="assets/imgs/grafico3.png" alt="">
                    <div class="sub">
                        <img src="assets/imgs/Legends3.png" alt="">
                    </div>
                </div>

                <div class="card1">
                    <div class="icon">
                        Categorias das ONGS
                        <button onclick="clicar()"><img src="assets/imgs/icon.png" alt=""></button>
                    </div>
                    <img src="assets/imgs/grafico4.png" alt="">
                </div>
            </div>

            <div id="download">
                <img src="assets/imgs/icon.png" alt="">
                <p>Download Iniciado</p>
            </div>

        </div>
    </main>
    
<?php
    $jsPagina = ["relatorios.js"]; //Colocar o arquivo .js (exemplo: 'ONG/cadastro.js')
    require_once '../../components/footer.php';
?>
