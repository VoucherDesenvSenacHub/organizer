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
            <a class="link">Minhas doações</a>
            </div>
        <div class="aside-nav">
            <i class="fa-solid fa-heart"></i>
            <a class="link" href="favoritos.php">Favoritos</a>
        </div>
        <div class="aside-nav">
            <i class="fa-solid fa-credit-card"></i>
            <a class="link">Meu cartões</a>
        </div>
        <div class="aside-nav">
            <i class="fa-solid fa-user-group"></i>
            <a class="link" href="participacoes.php">Participações</a>
        </div>
    </div>
    <div class="aside-nav">
        <button onclick="abrir_popup('sair-da-conta-popup')" id="popup-confirmacao-aside" class="aside-sair">
            <i class="fa-solid fa-right-from-bracket"></i>
            Sair
        </button>
    </div>
</aside>