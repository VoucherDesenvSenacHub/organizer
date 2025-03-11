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
                        <button onclick="clicar()"><img src="../../assets/images/icon.png" alt=""></button>
                    </div>
                    <img src="../../assets/images/grafico1.png" alt="grafico">
                    <div class="sub">
                        <img src="../../assets/images/Legends1.png" alt="">
                    </div>
                </div>

                <div class="card1">
                    <div class="icon">
                        Doações
                        <button onclick="clicar()"><img src="../../assets/images/icon.png" alt=""></button>
                    </div>
                    <img src="../../assets/images/grafico2.png" alt="">
                    <div class="sub">
                        <img src="../../assets/images/Legends2.png" alt="">
                    </div>
                </div>

                <div class="card1">
                    <div class="icon">
                        Acessos no sistema
                        <button onclick="clicar()"><img src="../../assets/images/icon.png" alt=""></button>
                    </div>
                    <img src="../../assets/images/grafico3.png" alt="">
                    <div class="sub">
                        <img src="../../assets/images/Legends3.png" alt="">
                    </div>
                </div>

                <div class="card1">
                    <div class="icon">
                        Categorias das ONGS
                        <button onclick="clicar()"><img src="../../assets/images/icon.png" alt=""></button>
                    </div>
                    <img src="../../assets/images/grafico4.png" alt="">
                </div>
            </div>

            <div id="download">
                <img src="a../../assets/images/icon.png" alt="">
                <p>Download Iniciado</p>
            </div>

        </div>
    </main>
    
<?php
    $jsPagina = ["relatorios.js"]; //Colocar o arquivo .js (exemplo: 'ONG/cadastro.js')
    require_once '../../components/footer.php';
?>
