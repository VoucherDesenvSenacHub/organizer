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