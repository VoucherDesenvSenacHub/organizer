<?php
$tituloPagina = 'Login ADM'; // Definir o título da página
$cssPagina = ['adm/login.css']; //Colocar o arquivo .css 
?>

<?php require_once '../../components/header.php'; ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />


<!-- Início DIV principal -->
<div id="principal">
    <div class="principal-esq">
        <div class="titulo-login">
            <h1>ACESSO RESTRITO</h1>
        </div>
        <form class="form-login">
            <div class="form-email">
                <label for="email">Email</label><br>
                <input type="text" id="email-corp" placeholder="usuario@conta.com"><br>
            </div>
            <div class="form-senha">
                <label for="senha">Senha</label><br>
                <input type="password" id="password-corp" placeholder="**********"><br>
                <button id="ver-senha"><span class="material-symbols-outlined">
                        visibility
                    </span></button>
            </div>
            <div class="form-opcoes">
                <div id="chk-box">
                    <input type="checkbox" id="manter-conectado">
                    <label for="checkbox">Manter conectado</label>
                </div>
            </div>
            <div id="login-adm">
                <button class="login-submit"><a href="home.php">Entrar</a></button>
            </div>
        </form>
    </div>
    <div class="principal-dir">
        <img src="../../assets/images/login_adm.png" alt="">
    </div>
</div>
<!-- Fim DIV principal  -->

</div>
<?php
$jsPagina = []; //Colocar o arquivo .js
require_once '../../components/footer.php';
?>