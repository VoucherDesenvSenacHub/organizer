<aside id="aside">
    <div class="topo-aside">
        <div class="btn-fechar">
            <button onclick="fechar_aside()"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="meu-perfil">
            <img src="../../assets/images/meu-perfill.png" alt="">
            <div>
                <span>Olá, Julia</span>
                <button class="open-popup" onclick="abrir_popup_confirmacao('meu-perfil')" id="meu-perfil-popup">Meu perfil ></button>
            </div>
        </div>
        <div class="aside-nav">
            <i class="fa-solid fa-coins"></i>
            <p>Minhas doações</p>
            </div>
        <div class="aside-nav">
            <i class="fa-solid fa-heart"></i>
            <p>Favoritos</p>
        </div>
        <div class="aside-nav">
            <i class="fa-solid fa-credit-card"></i>
            <p>Meu cartões</p>
        </div>
        <div class="aside-nav">
            <i class="fa-solid fa-user-group"></i>
            <p>Participações</p>
        </div>
    </div>
    <div class="aside-nav">
        <button onclick="abrir_popup_confirmacao('fundo-confirmacao')" id="popup-confirmacao-aside">
            <i class="fa-solid fa-right-from-bracket"></i>
            Sair
        </button>
    </div>
</aside>