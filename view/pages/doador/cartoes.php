git<?php
$acesso = 'doador';
$tituloPagina = 'Cartões | Organizer'; // Definir o título da página
$cssPagina = ["doador/cartoes.css"]; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
require_once '../../components/layout/base-inicio.php';
?>
<body>
    <!-- COMEÇAR SEU CÓDIGO AQUI -->
    <div class="conteiner">
        <div class="principal">
            <h1><i class="fa-solid fa-credit-card"></i> MEUS CARTÕES</h1>
            <div class="container-white">

                <div class="cartoes-container">
                    <!-- Cartão 1 -->
                    <div onclick="abrir_popup('popup-excluir-cartao')" class="cartao" data-cartao-id="1">
                        <div class="nome-cartao"><i class="fa-solid fa-credit-card"></i><h3>Cartão</h3></div>
                        <div class="numero-cartao">***** ***** ***** 7501</div>
                        <div class="validade">Data de validade 02/31</div>
                    </div>

                    <!-- Cartão 2 -->
                    <div onclick="abrir_popup('popup-excluir-cartao')" class="cartao" data-cartao-id="2">
                        <div class="nome-cartao"><i class="fa-solid fa-credit-card"></i><h3>Cartão</h3></div>
                        <div class="numero-cartao">***** ***** ***** 9503</div>
                        <div class="validade">Data de validade 05/25</div>
                    </div>

                    <!-- Cartão 3 -->
                    <div onclick="abrir_popup('popup-excluir-cartao')" class="cartao" data-cartao-id="3">
                        <div class="nome-cartao"><i class="fa-solid fa-credit-card"></i><h3>Cartão</h3></div>
                        <div class="numero-cartao">***** ***** ***** 8523</div>
                        <div class="validade">Data de validade 01/27</div>
                    </div>

                    <!-- Botão Adicionar (mantenha como está) -->
                    <div onclick="abrir_popup('popup-adicionar-cartao')" class="adicionar-cartao">
                        <img class="img-add" src="../../assets/images/add-cartao.png" alt="">
                        <button><span>Adicionar cartão</span></button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="popup-fundo" id="popup-adicionar-cartao">
        <div class="credit-card-popup">
            <h2>CARTÃO DE CRÉDITO</h2>

            <div class="input-grupo">
                <label>Número do Cartão</label>
                <input id="number-cartao" type="text" placeholder="0000 0000 0000 0000" class="card-number">
            </div>

            <div class="row">
                <div class="input-grupo">
                    <label for="">Validade</label>
                    <input type="date" placeholder="MM/AA">
                </div>

                <div class="input-grupo">
                    <label>CVV</label>
                    <input  id="CVV"type="text" placeholder="CVV" class="cvv">
                </div>
            </div>

            <div class="input-grupo">
                <label for="name">Titular do cartão</label>
                <input type="text" placeholder="Nome Completo" maxlength="200" onkeypress="return /[a-z\s]/i.test(event.key)">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">

    $("#number-cartao").mask("0000 0000 0000 0000");
    $("#CVV").mask("000");
</script>
<?php
$jsPagina = ['cartoes.js']; //Colocar o arquivo .js (exemplo: 'cadastro.js')
require_once '../../components/layout/footer/footer-logado.php';
?>