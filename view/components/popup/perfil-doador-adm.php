<div class="popup-fundo perfil-usuario-popup" id="perfil-doador-adm-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('perfil-doador-adm-popup')"></button>
        <div id="left" class="box">
            <div class="upload-area-doador" id="uploadAreaDoador">
                <img id="preview-foto" src="<?= !empty($usuario['caminho'])
                        ? '../../../' . $usuario['caminho']
                        : '../../assets/images/global/user-placeholder.jpg'
                        ?>">                
            </div>
            <div><p><?= $usuario['nome'] ?></p></div>
            <button class="btn" title="Inativar Usuário">
                <i class="fa-solid fa-user-xmark"></i>
                BLOQUEAR
            </button>
        </div>
        <div id="right" class="box">
            <h1>PERFIL</h1>
            <div class="input-group">
                <div class="input-box">
                    <label>Nome</label>
                    <input type="text" value="<?= $usuario['nome'] ?>" readonly>
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-box inputM">
                    <label>Telefone</label>
                    <input data-mask="(##) #####-####" id="telefone_div" type="tel" value="<?= $usuario['telefone'] ?>" readonly>
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="input-box inputM">
                    <label>CPF</label>
                    <input data-mask="###.###.###-##" id="cpf_div" type="text" value="<?= $usuario['cpf'] ?>" readonly>
                    <i class="fa-regular fa-address-card"></i>
                </div>
                <div class="input-box">
                    <label>Data de Nascimento</label>
                    <input type="date" value="<?= $usuario['data_nascimento'] ?>" readonly>
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
            </div>
            <h1>LOGIN</h1>
            <div class="input-box">
                <label>Email</label>
                <input type="email" value="<?= $usuario['email'] ?>" readonly>
                <i class="fa-solid fa-envelope"></i>
            </div>
        </div>
    </div>
</div>