<?php 
    $tituloPagina = 'Login do Doador';
    $cssPagina = ['doador/login.css'];
    require_once '../../components/header.php';
?>
<!-- COMEÇAR SEU CÓDIGO AQUI -->
<main>
    <div id="container-login" class="container">
        <form>
            <h1>FAÇA SEU LOGIN</h1>
            <div class="input-group">
                <div class="input-item">
                    <label for="email">Email</label>
                    <input id="email" type="email" placeholder="usúario@conta.com" required>
                </div>
                <div class="input-item">
                    <label for="senha">Senha</label>
                    <input id="senha" type="password" placeholder="********" required>
                </div>
                <div class="remember-forgot">
                    <div class="remember">
                        <input type="checkbox" id="lembrar">
                        <label for="lembrar">Manter conectado</label>
                    </div>
                    <a href="#">Esqueci a senha</a>
                </div>
            </div>
            <button class="btn">ENTRAR</button>
            <span>Não tem uma conta? <a href="cadastro.php">Criar Conta</a></span>
        </form>
            <img alt="Celular-Login" src="../../assets/images/pages/login_doador.png">
    </div>
</main>

<?php
    $jsPagina = [];
    require_once '../../components/footer.php';
?>