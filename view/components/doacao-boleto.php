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
    Código copiado com sucesso!
</div>

<div id="toast2-boleto" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    PDF Salvo com sucesso!
</div>


<style>
.container-boleto {
    background-color: white;
    padding: 30px;
    border-radius: 12px;
    text-align: center;
    max-width: 500px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    font-family: 'Arial', sans-serif;
}

.container-boleto h2 {
    font-size: 20px;
    color: #0047BB;
    font-weight: 600;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}

.container-boleto img {
    margin: 20px 0;
    max-width: 100%;
    height: auto;
}

.container-boleto p {
    font-size: 16px;
    color: #1d2c4c;
    margin: 10px 0 20px;
    line-height: 1.4;
}

.botoes-boleto {
    display: flex;
    justify-content: center;
    gap: 12px;
    flex-wrap: wrap;
}

.botoes-boleto button {
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: 0.3s ease;
}

.btn-salvar {
    background-color: #002d80;
    color: white;
    border: none;
}

.btn-copiar {
    background-color: white;
    border: 2px solid #002d80;
    color: #002d80;
}

.btn-salvar:hover,
.btn-copiar:hover {
    opacity: 0.9;
}
</style>