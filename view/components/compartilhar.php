<div class="popup-fundo" id="compartilhar-popup">
    <div class="container-popup">
        <button id="x-fechar" class="fa-solid fa-xmark" onclick="fechar_popup('compartilhar-popup')"></button>
        <!-- <div class="img">
            <img src="../../assets/images/pages/requer-login.png">
        </div> -->
        <div class="msg">
            <h1>COMPARTILHAR</h1>
            <p>Copie o link e compartilhe com mais pessoas</p>
            <input type="text" value="https://ong.projetos/4342.com" id="link-compartilhar" readonly>
            <button class="btn" onclick="copiar_link('toast-copiar')">COPIAR</button>
        </div>
    </div>
</div>
<!-- Toast de link copiado -->
<div id="toast-copiar" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    Link copiado com sucesso!
</div>