<?php
$acesso = 'visitante';
$tituloPagina = 'Login | Organizer';
$cssPagina = ['visitante/login.css'];
require_once '../../components/layout/base-inicio.php';
?>
<main>
    <div id="container-login" class="container">
        <form action="../../../controller/Usuario/LoginUsuarioController.php" method="POST">
            <h1>FAÇA SEU LOGIN</h1>
            <div class="input-group">
                <div class="input-item">
                    <label for="email">Email<span>*</span></label>
                    <input id="email" name="email" type="email" maxlength="45" placeholder="usúario@conta.com" required>
                </div>
                <div class="input-item">
                    <label for="senha">Senha<span>*</span></label>
                    <input id="senha" name="senha" type="password" minlength="8" maxlength="20" placeholder="********" required>
                    <i id="togglePassword" class="fas fa-eye"></i>
                </div>
                <div class="remember-forgot">
                    <div class="remember">
                        <input type="checkbox" id="lembrar">
                        <label for="lembrar">Manter conectado</label>
                    </div>
                    <button type="button" onclick="abrir_popup('fundo-cadastro-popup')">Esqueci a senha</button>
                </div>
            </div>
            <button class="btn" type="submit">ENTRAR</button>
            <span>Não tem uma conta? <a href="cadastro.php">Criar Conta</a></span>
        </form>
        <div class="img">
            <img src="../../assets/images/pages/visitante/celular-usuario.png">
        </div>
    </div>
</main>
<div id="fundo-cadastro-popup" class="popup-fundo">
    <div class="container-popup" id="popup-recuperar-senha">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('fundo-cadastro-popup')"></button>
        <img src="../../assets/images/pages/visitante/esqueci-senha.png">
        <div>
            <h2>RECUPERAR SENHA</h2>
            <p>Digite seu email abaixo para receber um link de recuperação</p>
            <form action="../../../controller/Usuario/RecuperarSenhaController.php" method="POST">
                <div class="input-item">
                    <label for="recuperar-email">Email<span>*</span></label>
                    <input id="recuperar-email" name="email" type="email" maxlength="45" placeholder="usúario@conta.com" required>
                </div>
                <button class="btn">ENVIAR</button>
            </form>
        </div>
    </div>
</div>
<?php
$jsPagina = ['usuario/login.js'];
require_once '../../components/layout/footer/footer-visitante.php';
?>