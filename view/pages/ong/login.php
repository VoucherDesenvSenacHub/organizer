<?php 
    $tituloPagina = 'Cadastro ONG'; // Definir o título da página
    $cssPagina = ['ong/login.css']; //Colocar o arquivo .css 
    require_once '../../components/header.php';
?>
<!-- Início DIV principal -->
<div id="principal">
    <div class="principal-esq">
        <div class="titulo-login">
            <h1>LOGIN CORPORATIVO</h1>
        </div>
        <form class="form-login">
            <div class="form-email">
                <label for="email">Email</label><br>
                <input type="email" id="email-corp" placeholder="usuario@conta.com"><br>
            </div>
            <div class="form-senha">
                <label for="senha">Senha</label><br>
                <input type="password" id="password-corp" placeholder="**********"><br>
                    <button id="ver-senha" type="button" onclick="showHide('password-corp', 'eyepassword')">
                        <span class="material-symbols-outlined" id="eyepassword">
                            visibility
                        </span>
                    </button>
            </div>
            <div class="form-opcoes">
                <div id="chk-box">
                    <input type="checkbox" id="manter-conectado">
                    <label for="checkbox">Manter conectado</label>
                </div>
                <div>
                    <a href="#" id="esqueci-senha" onclick="esqueciSenha(true)">Esqueci a senha</a>
                </div>
            </div>
            <div id="login-ong">

                <button class="login-submit"><a href="home.php">Entrar</a></button>

            </div>
        </form>
        <div id="cadastrar-ong">
            <a href="cadastro.php"><span>Quer cadastrar sua ONG: </span><span id="laranja"> Criar ONG</span></a>
        </div>
    </div>
    <div class="principal-dir">
        <img src="../../assets/images/figura-principal.png" alt="">
    </div>
</div>
<!-- Fim DIV principal  -->

<!-- Recuperar senha -->
<div id="password-recovery">
    <div id="pr-left">
        <img src="../../assets/images/password-recovery.png" alt="">
    </div>
    <div id="pr-right">
        <h1>RECUPERAR SENHA</h1>
        <p>Digite seu email abaixo<br>para receber um link de recuperação</p>
        <form>
            <div class="form-email">
                <label for="recovery-mail">Email</label><br>
                <input type="email" id="recovery-email" placeholder="seuemail@conta.com">
            </div>
            <div>
                <button class="login-cancel" onclick="esqueciSenha(false)">Cancelar</button>
                <button class="login-submit">Enviar</button>
            </div>
        </form>
    </div>
</div>
<?php
    $jsPagina = ['ongs.js']; //Colocar o arquivo .js
    require_once '../../components/footer.php';
?>