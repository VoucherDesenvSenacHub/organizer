<div class="fundo-popup" id="cartao-popup" style="display: none;">
    <div class="container-cartao">
        <h2>CARTÃO DE CRÉDITO</h2>
        <input type="text" placeholder="0000 0000 0000 0000">
        <div class="row-cartao">
            <input type="text" placeholder="MM/AA">
            <input type="text" placeholder="CVV">
        </div>
        <input type="text" placeholder="Nome Completo">

        <button class="btn-confirmar" onclick="copiar_link('toast-credito')">CONFIRMAR COMPRA</button>
    </div>
    <div id="toast-credito" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    Sua Compra foi realizada com sucesso!
</div>

</div>

<style>
.container-cartao {
    background: white;
    padding: 70px 40px;
    border-radius: 16px;
    max-width: 450px;
    width: 100%;
    text-align: center;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    font-family: 'Arial', sans-serif;
}

.container-cartao h2 {
    color: #007bff;
    font-size: 24px;
    margin-bottom: 35px;
    letter-spacing: 1px;
    font-weight: 500;
}

.container-cartao input {
    width: 100%;
    padding: 14px;
    margin-bottom: 18px;
    border: none;
    background-color: #f1f1f1;
    border-radius: 10px;
    font-size: 16px;
    color: #333;
}

.row-cartao {
    display: flex;
    gap: 12px;
}

.row-cartao input {
    flex: 1;
    margin-bottom: 18px; /* mantém o espaçamento igual aos outros inputs */
}

.btn-confirmar {
    background-color: #1a2b57;
    color: white;
    padding: 14px 0;
    border: none;
    border-radius: 10px;
    font-weight: bold;
    font-size: 16px;
    width: 100%;
    cursor: pointer;
    transition: 0.3s ease;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.btn-confirmar:hover {
    opacity: 0.9;
}
</style>