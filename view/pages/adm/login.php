<?php 
    $tituloPagina = 'Login do Doador';
    $cssPagina = ['adm/login.css'];
    require_once '../../components/header.php';
?>
<!-- COMEÇAR SEU CÓDIGO AQUI -->
<main>
    <div id="container-login" class="container">
        <form action="home.php" method="GET">
            <h1>ACESSO RESTRITO</h1>
            <div class="input-group">
                <div class="input-item">
                    <label for="email">Email<span>*</span></label>
                    <input id="email" type="email" maxlength="45" placeholder="usúario@conta.com" required>
                </div>
                <div class="input-item">
                    <label for="senha">Senha<span>*</span></label>
                    <input id="senha" type="password" maxlength="20" placeholder="********" required>
                </div>
                <div class="remember-forgot">
                    <div class="remember">
                        <input type="checkbox" id="lembrar">
                        <label for="lembrar">Manter conectado</label>
                    </div>
                </div>
            </div>
            <button class="btn">ENTRAR</button>
        </form>
            <img alt="Celular-Login" src="../../assets/images/login_adm.png">
    </div>
</main>

<?php
    $jsPagina = ['login-doador.js'];
    require_once '../../components/footer.php';
?>