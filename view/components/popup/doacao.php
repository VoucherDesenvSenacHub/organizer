
<div class="popup-fundo" id="doacao-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('doacao-popup')"></button>
        <h1>QUANTO VOCÊ DESEJA DOAR?</h1>
        <form action="../../../controller/Projeto/DoarProjetoController.php" method="POST">
            <div id="radio-group">
                <input type="hidden" name="projeto-id" value="<?= $IdProjeto ?>">
                <input type="hidden" name="valor-arrecadado" value="<?= $PerfilProjeto['valor_arrecadado'] ?>">
                <input type="hidden" name="meta" value="<?= $PerfilProjeto['meta'] ?>">
                <input type="hidden" name="descricaoPerfilProjeto" value="<?= $PerfilProjeto['nome'] ?>">
                <input type="hidden" name="nome" value="<?= $usuario['nome'] ?>">
                <input type="hidden" name="cpf" value="<?= $usuario['cpf'] ?>">
                <input type="hidden" name="email" value="<?= $usuario['email'] ?>">
                <input type="hidden" name="telefone" value="<?= $usuario['telefone'] ?>">
                <input type="hidden" name="id-ong" value="0">
                <input type="hidden" name="relatorio" value="recibo-doacao.php">

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
            <div id="popup-adicionar-cartao">
                <div class="credit-card-popup">
                    <div class="input-grupo">
                        <label>Número do Cartão</label>
                        <input data-mask="#### #### #### ####" id="number-cartao" name="number-cartao" type="text" placeholder="0000 0000 0000 0000" class="card-number"
                        minlength="19" maxlength="19">
                    </div>
    
                    <div class="row">
                        <div class="input-grupo">
                            <label for="">Validade</label>
                            <input data-mask="##/##" id="validade-cartao" name="validade-cartao" type="text" placeholder="MM/AA" minlength="5" maxlength="5">
                        </div>
    
                        <div class="input-grupo">
                            <label>CVV</label>
                            <input data-mask="###" id="cvv" name="cvv" type="text" placeholder="CVV" class="cvv" minlength="3" maxlength="3">
                        </div>
                    </div>
    
                    <div class="input-grupo">
                        <label for="name">Titular do cartão</label>
                        <input id="titular" name="titular" type="text" placeholder="Nome impresso no cartão" maxlength="200" onkeypress="return /[a-z\s]/i.test(event.key)">
                    </div>
                </div>
            </div>
        </div>
            <button type="submit" class="btn" onclick="abrir_popup('efetuar-pagamento')">PAGAR COM CARTÃO</button>
        </form>
    </div>
</div>  
</script>