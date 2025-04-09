<div class="fundo-popup" id="pix-popup">
    <div class="container-popup-pix">
        <button id="x-fechar" class="fa-solid fa-xmark" onclick="fechar_popup('pix-popup')"></button>
        <div class="pix-esquerda">
            <span class="titulo-pix">Escaneie o QR Code</span>
            <p>Para pagar com Pix.</p>
            <div>
                <img src="../../assets/images/image186.png" alt="QR Code" width="200px">
                <br>
                <button class="copiar-e-colar">PIX COPIA E COLA</button>
            </div>
        </div>
        <div class="pix-direita">
            <img src="../../assets/images/Coins-amico1.png" alt="Moedas" width="300px">
        </div>
    </div>
</div>

<style>
    .fundo-popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 999;
}

.container-popup-pix {
    background-color: #fff;
    padding: 40px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    gap: 3px;
    position: relative;
    max-width: 700px;
    width: 90%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

#x-fechar {
    position: absolute;
    top: 15px;
    right: 15px;
    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
    color: #555;
}

.pix-esquerda {
    flex: 1;
}

.titulo-pix {
    color: #0056D2;
    font-size: 20px;
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

.pix-esquerda p {
    margin-top: 0;
    color: #333;
    margin-bottom: 20px;
}

.copiar-e-colar {
    margin-top: 15px;
    background-color: #002d80;
    color: white;
    border: none;
    padding: 10px 38px;
    border-radius: 2px;
    font-size: 14px;
    cursor: pointer;
}

.pix-direita {
    flex: 1;
    text-align: center;
}
</style>