<div class="popup-fundo" id="doacao-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('doacao-popup')"></button>
        <h1>QUANTO VOCÊ DESEJA DOAR?</h1>
        <form action="#">
            <h4>Valores</h4>
            <div id="quant-doacao">
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-dinheiro.png" alt="">
                    <h3>R$ 10</h3>
                </div>
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-dinheiro.png" alt="">
                    <h3>R$ 30</h3>
                </div>
                <div class="icon-title">
                    <img src="../../assets/images/pages/icone-dinheiro.png" alt="">
                    <h3>R$ 50</h3>
                </div>
            </div>
            <div class="inputBox">
                <label for="outro-valor">Outro Valor:</label>
                <input type="number" id="outro-valor" placeholder="R$">
            </div>
            <h4>Modo de Pagamento</h4>
            <div class="modo-pagamento">
                <label class="radio">
                    <input name="radio" type="radio" value="pix" checked>
                    <span>PIX</span>
                </label>
                <label class="radio">
                    <input name="radio" type="radio" value="boleto">
                    <span>BOLETO</span>
                </label>
                <label class="radio">
                    <input name="radio" type="radio" value="cartao">
                    <span>CARTÃO</span>
                </label>
            </div>
            <button class="btn">CONTINUAR</button>
        </form>
    </div>
</div>