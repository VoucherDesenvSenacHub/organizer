<?php
$cssPagina = ["doador/tela-de-cartoes.css"]; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
?>

<div class="popup-fundo" id="cartao-popup">
        <div class="credit-card-popup">
            <h2>CARTÃO DE CRÉDITO</h2>

            <div class="input-group">
                <label>Número do Cartão</label>
                <input type="text" placeholder="0000 0000 0000 0000" class="card-number">
            </div>

            <div class="row">
                <div class="input-group">
                    <label for="" >Validade</label>
                    <input type="date" placeholder="MM/AA">
                </div>

                <div class="input-group">
                    <label>CVV</label>
                    <input type="text" placeholder="CVV" class="cvv">
                </div>
            </div>

            <div class="input-group">
                <label for="name" >Titular do cartão</label>
                <input type="name" placeholder="Nome Completo">
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

