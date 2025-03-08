<?php 
    $tituloPagina = 'Login Administrador'; // Definir o título da página
    $cssPagina = ['ADM/n_login_adm.css']; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header.php';
?>

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
                    <button id="ver-senha"><img src="../assets-telas-adm/images/eye.png" alt=""></button>
                </div>
                <div class="form-opcoes">
                    <div id="chk-box">
                        <input type="checkbox" id="manter-conectado">
                        <label for="checkbox">Manter conectado</label>
                    </div>
                </div>
                <div id="login-adm">
                    <button class="login-submit">Entrar</a></button>
                </div>
            </form>
        </div>
        <div class="principal-dir">
            <img src="../assets-telas-adm/images/login_adm.png" alt="">
        </div>
    </div>
    <!-- Fim DIV principal  -->

    </div>
    <script src="main.js"></script>
</body>

