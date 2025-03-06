<?php
$tituloPagina = 'Login ADM'; // Definir o título da página
$cssPagina = ['ADM/doadores_adm_style.css']; //Colocar o arquivo .css 
?>

<?php require_once '../../components/header.php'; ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />


<div id="block-popup">
    <div id="ipopup">
        <div class="msg">
            <h1>BLOQUEAR ESSE USUÁRIO?</h1>
            <div class="block-buttons">
                <button onclick="blockpopup2()" class="btn-sim">SIM</button>
                <button id="btn-nao" class="btn-nao">NÃO</button>
            </div>
        </div>
    </div>
</div>

<div id="block-popup2">
    <div id="ipopup">
        <div class="msg">
            <h1>USUÁRIO BLOQUEADO</h1>
            <span class="material-symbols-outlined">
                check
            </span>
        </div>
    </div>
</div>


<!-- Início DIV principal -->
<div id="principal">
    <div class="top">
        <h1 class="top-text">DOADORES</h1>
        <div class="buscar">
            <input type="text" id="buscar" placeholder="Buscar">
            <img src="../../assets/images/search_img.png" class="search_img">
        </div>
    </div>

    <div class="doadores">
        <div class="card_doador">
            <div class="card-esq">
                <img class="perfil_img" src="../../assets/images/Perfil-doadores.png">
                <div class="info_doador">
                    <h2 class="nome_doador">João</h2>
                    <p class="email_doador">joaozin@gmail.com</p>
                </div>
            </div>
            <div class="card-dir">
                <p class="email_doador">28/08/2024</p>
                <button onclick="blockpopup()" class="btn_delete_user">
                    <img class="img_delete_user" src="../../assets/images/delete_user.png">
                </button>
            </div>
        </div>

        <div class="card_doador">
            <div class="card-esq">
                <img class="perfil_img" src="../../assets/images/Perfil-doadores.png">
                <div class="info_doador">
                    <h2 class="nome_doador">João</h2>
                    <p class="email_doador">joaozin@gmail.com</p>
                </div>
            </div>
            <div class="card-dir">
                <p class="email_doador">28/08/2024</p>
                <button onclick="blockpopup()" class="btn_delete_user">
                    <img class="img_delete_user" src="../../assets/images/delete_user.png">
                </button>
            </div>
        </div>

        <div class="card_doador">
            <div class="card-esq">
                <img class="perfil_img" src="../../assets/images/Perfil-doadores.png">
                <div class="info_doador">
                    <h2 class="nome_doador">João</h2>
                    <p class="email_doador">joaozin@gmail.com</p>
                </div>
            </div>
            <div class="card-dir">
                <p class="email_doador">28/08/2024</p>
                <button onclick="blockpopup()" class="btn_delete_user">
                    <img class="img_delete_user" src="../../assets/images/delete_user.png">
                </button>
            </div>
        </div>

        <div class="card_doador">
            <div class="card-esq">
                <img class="perfil_img" src="../../assets/images/Perfil-doadores.png">
                <div class="info_doador">
                    <h2 class="nome_doador">João</h2>
                    <p class="email_doador">joaozin@gmail.com</p>
                </div>
            </div>
            <div class="card-dir">
                <p class="email_doador">28/08/2024</p>
                <button onclick="blockpopup()" class="btn_delete_user">
                    <img class="img_delete_user" src="../../assets/images/delete_user.png">
                </button>
            </div>
        </div>

        <div class="card_doador">
            <div class="card-esq">
                <img class="perfil_img" src="../../assets/images/Perfil-doadores.png">
                <div class="info_doador">
                    <h2 class="nome_doador">João</h2>
                    <p class="email_doador">joaozin@gmail.com</p>
                </div>
            </div>
            <div class="card-dir">
                <p class="email_doador">28/08/2024</p>
                <button onclick="blockpopup()" class="btn_delete_user">
                    <img class="img_delete_user" src="../../assets/images/delete_user.png">
                </button>
            </div>
        </div>

    </div>
    <div class="botoes">
        <button class="btn_nav1">1</button>
        <button class="btn_nav">2</button>
        <button class="btn_nav">3</button>
        <button class="btn_nav">4</button>
        <button class="btn_nav">></button>
    </div>
</div>
<!-- Fim DIV principal  -->
<script src="../assets-telas-adm/js/main.js"></script>


<?php
$jsPagina = []; //Colocar o arquivo .js
require_once '../../components/footer.php';
?>