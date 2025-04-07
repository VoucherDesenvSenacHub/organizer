<?php
$tituloPagina = 'Meus cartões'; // Definir o título da página
$cssPagina = ["doador/tela-de-cartoes.css"]; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
require_once '../../components/header-usuario.php';
?>

<body>


    <!-- COMEÇAR SEU CÓDIGO AQUI -->
    <div class="conteiner">
        <div class="principal">
            <h1>MEUS CARTÕES</h1>
            <div class="container-white">

                <div class="cartoes-container">
                    <!-- Cartão 1 -->
                    <div onclick="abrir_popup('popup-excluir-cartao')" class="cartao" data-cartao-id="1">
                        <h2>Cartão</h2>
                        <div class="numero-cartao">***** ***** ***** 7501</div>
                        <div class="validade">Data de validade 02/31</div>
                    </div>

                    <!-- Cartão 2 -->
                    <div onclick="abrir_popup('popup-excluir-cartao')" class="cartao" data-cartao-id="2">
                        <h2>Cartão</h2>
                        <div class="numero-cartao">***** ***** ***** 9503</div>
                        <div class="validade">Data de validade 05/25</div>
                    </div>

                    <!-- Cartão 3 -->
                    <div onclick="abrir_popup('popup-excluir-cartao')" class="cartao" data-cartao-id="3">
                        <h2>Cartão</h2>
                        <div class="numero-cartao">***** ***** ***** 8523</div>
                        <div class="validade">Data de validade 01/27</div>
                    </div>

                    <!-- Botão Adicionar (mantenha como está) -->
                    <div onclick="abrir_popup('popup-adicionar-cartao')" class="adicionar-cartao">
                        <button><span>Adicionar cartão</span></button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="popup-fundo" id="popup-adicionar-cartao">
        <div class="credit-card-popup">
            <h2>CARTÃO DE CRÉDITO</h2>

            <div class="input-group">
                <label>Número do Cartão</label>
                <input type="text" placeholder="0000 0000 0000 0000" class="card-number">
            </div>

            <div class="row">
                <div class="input-group">
                    <label>Validade</label>
                    <input type="text" placeholder="MM/AA">
                </div>

                <div class="input-group">
                    <label>CVV</label>
                    <input type="text" placeholder="CVV" class="cvv">
                </div>
            </div>

            <div class="input-group">
                <label>Titular do cartão</label>
                <input type="text" placeholder="Nome Completo">
            </div>
            <div>
                <button class="add-button" id="addButton">
                    <span class="button-text">ADICIONAR</span>
                    <div class="loader"></div>
                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none" />
                        <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="exclusao-sucesso" class="toast">
        <i class="fa-regular fa-circle-check"></i>
        Cartão excluido com sucesso!
    </div>
    <!-- Popup de Confirmação de Exclusão -->
    <div class="popup-fundo" id="popup-excluir-cartao">
        <div class="popup-overlay">
            <div class="popup-container">
                <div class="popup-content">
                    <h2>EXCLUIR ESSE CARTÃO?</h2>
                    <div class="button-container">
                        <button class="btn btn-no">NÃO</button>
                        <button class="btn btn-yes">SIM</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup de Confirmação de Sucesso -->
    <div class="popup-fundo" id="popup-exclusao-sucesso">
        <div class="popup-container">
            <div class="popup-content">
                <h2>CARTÃO EXCLUIDO</h2>
                <div class="button-container">
                    <button class="btn btn-back">VOLTAR</button>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
$jsPagina = ['tela-de-cartoes.js']; //Colocar o arquivo .js (exemplo: 'cadastro.js')
require_once '../../components/footer.php';
?>