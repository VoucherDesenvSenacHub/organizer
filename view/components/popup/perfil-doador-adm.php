<div class="popup-fundo" id="perfil-doador-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('perfil-doador-popup')"></button>
        <div id="left" class="box">
            <div id="perfil">
                <img src="../../assets/images/pages/perfil_julia.png">
                <p><?= $usuario->nome ?></p>
            </div>
            <button class="btn" title="Inativar Usuário">
                <i class="fa-solid fa-user-xmark"></i>
                BLOQUEAR
            </button>
        </div>
        <div id="right" class="box">
            <h1>PERFIL</h1>
            <div class="input-group">
                <div class="input-box">
                    <label for="nome">Nome</label>
                    <input id="nome" type="text" value="<?= $usuario->nome ?>" readonly>
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-box inputM">
                    <label for="telefone">Telefone</label>
                    <input id="telefone" type="tel" value="<?= $usuario->telefone ?>" readonly>
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="input-box inputM">
                    <label for="cpf">CPF</label>
                    <input id="cpf" type="text" value="<?= $usuario->cpf ?>" readonly>
                    <i class="fa-regular fa-address-card"></i>
                </div>
                <div class="input-box">
                    <label for="datan">Data de Nascimento</label>
                    <input id="datan" type="date" value="<?= $usuario->data_nascimento ?>" readonly>
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
            </div>
            <h1>LOGIN</h1>
            <div class="input-box">
                <label for="email">Email</label>
                <input id="email" type="email" value="<?= $usuario->email ?>" readonly>
                <i class="fa-solid fa-envelope"></i>
            </div>
        </div>
    </div>
</div>