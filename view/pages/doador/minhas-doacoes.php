<?php
$tituloPagina = 'Minhas Doações';
$cssPagina = ['doador/minhas-doacoes.css'];
require_once '../../components/header-usuario.php';
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<main>
    <!-- Div Principal -->
    <div id="principal">
        <h1>Minhas Doações</h1>
        <div class="cardes">
            <div class="card">
                <div class="card_esq">
                    <img class="pleaceholder" src="../../assets/images/ong_placeholder_2.png" alt="">
                    <div class="info">
                        <h2>Projeto A</h2>
                        <p>Doado: R$100</p>
                        <p>Data:28/03/2024</p>
                    </div>
                </div>
                <button class="btn_comprovante" onclick="clicar()">Comprovante</button>
            </div>
            <div class="card">
                <div class="card_esq">
                    <img class="pleaceholder" src="../../assets/images/ong_placeholder_2.png" alt="">
                    <div class="info">
                        <h2 style="color: #007AFF">Projeto B</h2>
                        <p>Doado: R$200</p>
                        <p>Data:08/07/2023</p>
                    </div>
                </div>
                <button class="btn_comprovante" onclick="clicar()">Comprovante</button>
            </div>
            <div class="card">
                <div class="card_esq">
                    <img class="pleaceholder" src="../../assets/images/ong_placeholder_2.png" alt="">
                    <div class="info">
                        <h2 style="color: #FCC21B;">Projeto C</h2>
                        <p>Doado: R$50</p>
                        <p>Data:12/03/2023</p>
                    </div>
                </div>
                <button class="btn_comprovante" onclick="clicar()">Comprovante</button>
            </div>
        </div>
        <div class="info_top">
            <h1>RESUMO GERAL</h1>
            <p>Total doado: <span> R$350</span></p>

            <div class="grafico-container" style="display: flex; gap: 40px; align-items: flex-start;">
                <!-- Legenda em coluna -->
                <div class="legenda-custom ">
                    <div class="item">
                        <span class="cor" style="background-color: #FF6384;"></span> Projeto A
                    </div>
                    <div class="item">
                        <span class="cor" style="background-color: #007bff;"></span> Projeto B
                    </div>
                    <div class="item">
                        <span class="cor" style="background-color: #fbc02d;"></span> Projeto C
                    </div>
                </div>

                <!-- Gráfico -->
                <div>
                    <canvas id="graficoDoacoes" width="300" height="300"></canvas>
                </div>

                <!-- Download -->
                <div id="download">
                    <img src="../../assets/images/icon.png" alt="">
                    <p>Download Iniciado</p>
                </div>
            </div>
</main>
<?php
$jsPagina = ['minhas-doacoes.js'];
require_once '../../components/footer.php';
?>