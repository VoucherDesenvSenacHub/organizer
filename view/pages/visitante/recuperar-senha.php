<?php
$acesso = 'visitante';
$tituloPagina = 'Redefinir Senha | Organizer';
$cssPagina = ['visitante/login.css'];
require_once '../../components/layout/base-inicio.php';
?>

<main>
    <div id="container-login" class="container">
        <form action="../../../controller/Usuario/RedefinirSenhaController.php" method="POST">
            <h1>REDEFINIR SENHA</h1>
            <p>Digite sua nova senha abaixo:</p>
            
            <div class="input-group">
                <div class="input-item">
                    <label for="nova-senha">Nova Senha<span>*</span></label>
                    <input id="nova-senha" name="nova_senha" type="password" minlength="8" maxlength="20" placeholder="********" required>
                    <i id="togglePassword" class="fas fa-eye"></i>
                </div>
                <div class="input-item">
                    <label for="confirmar-senha">Confirmar Senha<span>*</span></label>
                    <input id="confirmar-senha" name="confirmar_senha" type="password" minlength="8" maxlength="20" placeholder="********" required>
                </div>
            </div>
            
            <button class="btn" type="submit">ATUALIZAR SENHA</button>
            <span><a href="login.php">Voltar para o login</a></span>
        </form>
        
        <div class="img">
            <img src="../../assets/images/pages/visitante/celular-usuario.png">
        </div>
    </div>
</main>

<?php
$jsPagina = ['usuario/login.js'];
require_once '../../components/layout/footer/footer-visitante.php';
?>