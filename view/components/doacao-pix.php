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
    Pix copiado com sucesso!
</div>

<!-- ESTILOS -->
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
    z-index: 1000;
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
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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

.pagar-pix {
    font-size: 20px;
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


</style>

