<?php
$tituloPagina = 'Doadores ADM'; // Definir o título da página
$cssPagina = ['adm/ver-doadores.css']; //Colocar o arquivo .css 
require_once '../../components/layout/base-inicio.php';
?>

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


<main>
    <div id="principal">
        <div class="top">
            <h1 class="top-text">DOADORES</h1>
            <form id="form-busca" action="ongs.php" method="GET">
                <input type="text" name="pesquisa" placeholder="Busque uma ONG" required>
                <button class="btn"><i class="fa-solid fa-search"></i></button>
            </form>
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
        <nav id="navegacao">
            <a class="active" href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">></a>
        </nav>
    </div>
</main>

<?php
$jsPagina = ['ver-doadores-adm.js']; //Colocar o arquivo .js
require_once '../../components/footer.php';
?>