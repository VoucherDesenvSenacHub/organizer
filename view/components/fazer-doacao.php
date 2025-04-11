<div class="popup-fundo" id="doacao-popup">
    <div class="container-popup">
        <button id="x-fechar" class="fa-solid fa-xmark" onclick="fechar_popup('doacao-popup')"></button>
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
            <button  type="button" class="btn" id="btn-continuar" >CONTINUAR</button>
        </form>
    </div>
</div>
<!--  PHP - PIX -->

<div class="fundo-popup" id="pix-popup" style="display: none;">
    <div class="container-popup-pix">
        <div class="pix-esquerda">
            <span class="titulo-pix">Escaneie o QR Code</span>
            <p class="pagar-pix">Para pagar com Pix.</p>
            <div>
                <img src="../../assets/images/image186.png" alt="QR Code" width="200px">
                <br>
                <button class="copiar-e-colar" onclick="copiar_link('toast-pix')">PIX COPIA E COLA</button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Pix -->
<div id="toast-pix" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    Pix copiado!
</div>


<!--  PHP - CARTÃO -->


<div class="fundo-popup" id="cartao-popup" style="display: none;">
    <div class="container-cartao">
        <h2>CARTÃO DE CRÉDITO</h2>

        <div class="input-group">
            <label>Número do Cartão</label>
            <input type="text" placeholder="0000 0000 0000 0000" required>
        </div>

        <div class="row">
            <div class="input-group">
                <label>Validade</label>
                <input type="text" placeholder="MM/AA" required>
            </div>

            <div class="input-group">
                <label>CVV</label>
                <input type="text" placeholder="CVV" required>
            </div>
        </div>

        <div class="input-group">
            <label>Titular do cartão</label>
            <input type="text" placeholder="Nome Completo" required>
        </div>

        <button class="confirm-button" onclick="copiar_link('toast-cartao')">CONFIRMAR COMPRA</button>
    </div>
    
</div>
<div id="toast-cartao" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    Compra confirmada!
</div>

<!--  PHP - BOLETO -->


<div class="fundo-popup" id="boleto-popup" style="display: none;">
    <div class="container-boleto">
        <h2><i class="fa-solid fa-barcode" style="color: #0056D2;"></i> Boleto Bancário</h2>
        <img src="../../assets/images/image 188.png" alt="Código de barras" width="300">
        <p style="font-size: 18px; margin: 10px 0;">23790.12345 12345.678901 23456.789012 3 87650000000100</p>
        <div class="botoes-boleto">
            <button class="btn-salvar" onclick="copiar_link('toast2-boleto')">SALVAR PDF</button>
            <button class="btn-copiar" onclick="copiar_link('toast-boleto', '23790123451234567890123456789012387650000000100')">Copiar Código</button>
        </div>
    </div>
</div>

<div id="toast-boleto" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    Código copiado!
</div>

<div id="toast2-boleto" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    PDF Salvo!
</div>


<!-- JAVASCRIPT DOS POPUPS DE FORMAS DE PAGAMENTOS  -->

<script>
function copiar_link(toastId, texto = '') {
    navigator.clipboard.writeText(texto).then(() => {
        const toast = document.getElementById(toastId);
        toast.style.display = "flex";
        setTimeout(() => {
            toast.style.display = "none";
        }, 3000);
    });
}

function fechar_popup(id) {
    const el = document.getElementById(id);
    if (el) el.style.display = "none";
}

document.getElementById("btn-continuar").addEventListener("click", function () {
    const metodoSelecionado = document.querySelector('input[name="radio"]:checked').value;

    fechar_popup("doacao-popup");

    if (metodoSelecionado === "pix") {
        document.getElementById("pix-popup").style.display = "flex";
    } else if (metodoSelecionado === "boleto") {
        document.getElementById("boleto-popup").style.display = "flex";
    } else if (metodoSelecionado === "cartao") {
        document.getElementById("cartao-popup").style.display = "flex";
    }
});

// Fechar ao clicar fora
window.addEventListener('click', function (e) {
    ['pix-popup', 'boleto-popup', 'cartao-popup'].forEach(id => {
        const popup = document.getElementById(id);
        const container = popup.querySelector('.container-popup-pix') || popup.querySelector('.container-boleto') || popup.querySelector('.container-cartao');
        if (e.target === popup) {
            popup.style.display = 'none';
        }
    });
});
</script>