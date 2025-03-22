<?php
$tituloPagina = 'Meus cartões'; // Definir o título da página
$cssPagina = ["doador/tela-de-cartoes.css"]; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
require_once '../../components/header.php';
?>
<!-- COMEÇAR SEU CÓDIGO AQUI -->
<div class="conteiner">
    <div class="principal">
        <h1>MEUS CARTÕES</h1>
        <div class="container-white">

            <div class="cartoes-container">
                <!-- Cartão 1 -->
                <div class="cartao">
                    <h2>Cartão</h2>
                    <div class="numero-cartao">***** ***** ***** 7501</div>
                    <div class="validade">Data de validade 02/31</div>
                </div>

                <!-- Cartão 2 -->
                <div class="cartao">
                    <h2>Cartão</h2>
                    <div class="numero-cartao">***** ***** ***** 9503</div>
                    <div class="validade">Data de validade 05/25</div>
                </div>

                <!-- Cartão 3 -->
                <div class="cartao">
                    <h2>Cartão</h2>
                    <div class="numero-cartao">***** ***** ***** 8523</div>
                    <div class="validade">Data de validade 01/27</div>
                </div>

                <!-- Botão Adicionar -->
                <div class="adicionar-cartao">
                    <span>Adicionar cartão</span>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
$jsPagina = []; //Colocar o arquivo .js (exemplo: 'cadastro.js')
require_once '../../components/footer.php';
?>