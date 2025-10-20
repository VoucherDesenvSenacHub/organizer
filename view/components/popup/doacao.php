<div class="popup-fundo" id="doacao-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('doacao-popup')"></button>
        <h1>QUANTO VOCÊ DESEJA DOAR?</h1>
        <form action="../../../controller/Projeto/DoarProjetoController.php" method="POST">
            <div id="radio-group">
                <input type="hidden" name="projeto-id" value="<?= $IdProjeto ?>">
                <input type="hidden" name="valor-arrecadado" value="<?= $PerfilProjeto['valor_arrecadado'] ?>">
                <input type="hidden" name="meta" value="<?= $PerfilProjeto['meta'] ?>">
                <label>
                    <input type="radio" name="valor-doacao" value="10" required>
                    <span>R$ 10</span>
                </label>
                <label>
                    <input type="radio" name="valor-doacao" value="30">
                    <span>R$ 30</span>
                </label>
                <label>
                    <input type="radio" name="valor-doacao" value="50">
                    <span>R$ 50</span>
                </label>
                <label>
                    <input type="radio" name="valor-doacao" value="100">
                    <span>R$ 100</span>
                </label>
                <label id="input-value">
                    <input type="radio" name="valor-doacao" value="outro">
                    <span>R$</span>
                    <input type="number" name="valor-personalizado" placeholder="Outro Valor">
                </label>
            <!-- </div> -->
            <!-- <div class="popup-fundo" id="popup-adicionar-cartao">
                <div class="credit-card-popup"> -->
            <div id="popup-adicionar-cartao">
                <div class="credit-card-popup">
                    <div class="input-grupo">
                        <label>Número do Cartão</label>
                        <input id="number-cartao" type="text" placeholder="0000 0000 0000 0000" class="card-number"
                        minlength="16" maxlength="16">
                    </div>
    
                    <div class="row">
                        <div class="input-grupo">
                            <label for="">Validade</label>
                            <input id="validade-cartao" type="text" placeholder="MM/AA" minlength="4" maxlength="4">
                        </div>
    
                        <div class="input-grupo">
                            <label>CVV</label>
                            <input id="cvv" type="text" placeholder="CVV" class="cvv" minlength="3" maxlength="3">
                        </div>
                    </div>
    
                    <div class="input-grupo">
                        <label for="name">Titular do cartão</label>
                        <input id="titular" type="text" placeholder="Nome impresso no cartão" maxlength="200" onkeypress="return /[a-z\s]/i.test(event.key)">
                    </div>
                    <!--
                        number-cartao
                        validade-cartao
                        cvv
                        titular
                    -->
                    <div>
                        <!-- <button class="add-button" id="addButton">
                            <span class="button-text">CONFIRMAR</span>
                            <div class="loader"></div>
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none" />
                                <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                            </svg>
                        </button> -->
                    </div>
                </div>
            </div>
        </div>
            <button type="submit" class="btn" onclick="abrir_popup('efetuar-pagamento')">PAGAR COM CARTÃO</button>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    $("#number-cartao").mask("0000 0000 0000 0000");
    $("#CVV").mask("000");
    $("#validade-cartao").mask("00/00");
</script>