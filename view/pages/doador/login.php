<?php 
    $tituloPagina = 'Login do Doador';
    $cssPagina = ['doador/login.css'];
    require_once '../../components/header.php';
?>
<!-- COMEÇAR SEU CÓDIGO AQUI -->
<main>
    <div id="container-login" class="container">
        <form action="home.php" method="GET">
            <h1>FAÇA SEU LOGIN</h1>
            <div class="input-group">
                <div class="input-item">
                    <label for="email">Email<span>*</span></label>
                    <input id="email" type="email" placeholder="usúario@conta.com" required>
                </div>
                <div class="input-item">
                    <label for="senha">Senha<span>*</span></label>
                    <input id="senha" type="password" placeholder="********" required>
                </div>
                <div class="remember-forgot">
                    <div class="remember">
                        <input type="checkbox" id="lembrar">
                        <label for="lembrar">Manter conectado</label>
                    </div>
                    <button type="button" onclick="abrir_popup('fundo-cadastro-popup')">Esqueci a senha</button>
                </div>
            </div>
            <button class="btn">ENTRAR</button>
            <span>Não tem uma conta? <a href="cadastro.php">Criar Conta</a></span>
        </form>
            <img alt="Celular-Login" src="../../assets/images/pages/login_doador.png">
    </div>
</main>
<div id="fundo-cadastro-popup" class="popup-fundo">
    <div class="container-popup" id="popup-recuperar-senha">
        <img src="../../assets/images/pages/esqueci-senha-doador.png" alt="">
        <div>
            <h2>RECUPERAR SENHA</h2>
            <p>Digite seu email abaixo para receber um link de recuperação</p>
            <form action="">
                <div class="input-item">
                    <label for="recuperar-email">Email<span>*</span></label>
                    <input id="recuperar-email" type="email" placeholder="usúario@conta.com" required>
                </div>
                <button class="btn">ENVIAR</button>
            </form>
        </div>
    </div>
</div>


<?php
    $jsPagina = [];
    require_once '../../components/footer.php';
?>