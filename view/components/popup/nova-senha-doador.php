<div class="popup-fundo" id="nova-senha-doador-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('nova-senha-doador-popup')"></button>
        <h1>NOVA SENHA</h1>
        <p>Digite sua nova senha</p>
        <form action="#" method="POST" onsubmit="return confirm('Tem certeza que deseja alterar sua senha?')">
            <input type="hidden" name="usuario_id" value="<?= $_SESSION['usuario_id'] ?>">
            <div class="input-group">
                <div class="input-box">
                    <label for="senha_usuario">Senha</label>
                    <input name="senha_usuario" id="senha_usuario" type="password" minlength="8" maxlength="20" required>
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div class="input-box">
                    <label for="senhaconfirm">Confirmar Senha</label>
                    <input name="senhaconfirm" id="senhaconfirm" type="password" minlength="8" maxlength="20" required>
                    <i class="fa-solid fa-lock"></i>
                </div>
            </div>
            <button class="btn" type="submit">ALTERAR</button>
        </form>
    </div>
</div>