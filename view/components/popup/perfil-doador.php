<?php
require_once __DIR__ . '/../../../model/UsuarioModel.php';
require_once __DIR__ . '/../../../model/ImagemModel.php';

$usuarioModel = new UsuarioModel();
$usuario = $usuarioModel->buscar_perfil($_SESSION['usuario']['id']);
// var_dump($usuario);
// exit;
?>


<div class="popup-fundo perfil-usuario-popup" id="perfil-doador-popup">
    <form class="container-popup" 
      action="../../../controller/usuario/EditarPerfilController.php" 
      method="POST" 
      enctype="multipart/form-data"
      onsubmit="return confirm('Tem certeza que deseja alterar seus dados?')">
        <button type="button" class="btn-fechar-popup fa-solid fa-xmark"
            onclick="fechar_popup('perfil-doador-popup')"></button>
        <div id="left" class="box">
            <div id="perfil">
                <div class="upload-area-doador" id="uploadAreaDoador">
                    <input type="file" id="foto_usuario" name="foto_usuario" accept="image/*" style="display:none;">
                    <img id="preview-foto" src="<?= !empty($usuario['caminho'])
                        ? '../../../' . $usuario['caminho']
                        : '../../assets/images/global/user-placeholder.jpg'
                        ?>">
                    <div id="uploadTextDoador">
                        <i class="fa-solid fa-cloud-upload-alt"></i><br>
                        Arraste ou clique para trocar
                    </div>
                    <button type="button" class="btn-remover" id="btnRemoverDoador" title="Remover Imagem"
                        onclick="removerFotoPerfilDoador()">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
                <p><?= htmlspecialchars($usuario['nome']) ?></p>
            </div>
            <button type="button" class="btn" title="Sair" onclick="abrir_popup('sair-da-conta-popup')">
                <i class="fa-solid fa-right-from-bracket"></i>
                Sair
            </button>
        </div>
        <div id="right" class="box">
            <h1>PERFIL</h1>

            <input type="hidden" name="id_usuario" value="<?= $_SESSION['usuario']['id'] ?>">
            <div class="input-group">
                <div class="input-box">
                    <label for="nome_usuario">Nome</label>
                    <input name="nome_usuario" id="nome_usuario" type="text"
                        value="<?= htmlspecialchars($usuario['nome']) ?>" required>
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-box inputM">
                    <label for="telefone_usuario">Telefone</label>
                    <input data-mask="(##) #####-####" name="telefone_usuario" id="telefone_usuario" type="text"
                        value="<?= htmlspecialchars($usuario['telefone']) ?>" required minlength="15" maxlength="15"
                        inputmode="numeric"
                        pattern="(\(\d{2}\)\s\d{5}-\d{4}|\d{11})"
                        title="Informe o número de telefone corretamente.">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="input-box inputM">
                    <label for="cpf_usuario">CPF</label>
                    <input data-mask="###.###.###-##" name="cpf_usuario" id="cpf_usuario" type="text"
                        value="<?= htmlspecialchars($usuario['cpf']) ?>" required minlength="14" maxlength="14" inputmode="numeric"
                        pattern="(\d{3}\.\d{3}\.\d{3}-\d{2}|\d{11})" title="Informe o CPF corretamente.">
                    <i class="fa-regular fa-address-card"></i>
                </div>
                <div class="input-box">
                    <label for="datan">Data de Nascimento</label>
                    <input name="data_usuario" id="datan" type="date" value="<?= $usuario['data_nascimento'] ?>"
                        required>
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
            </div>
            <h1>LOGIN</h1>
            <div class="input-box">
                <label for="email_usuario">Email</label>
                <input name="email_usuario" id="email_usuario" type="email"
                    value="<?= htmlspecialchars($usuario['email']) ?>" required>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div id="acoes-perfil">
                <button class="btn" type="button" onclick="abrir_popup('nova-senha-doador-popup')">
                    <i class="fa-solid fa-key"></i>
                    Alterar Senha
                </button>
                <button class="btn" type="submit"><i class="fa-solid fa-floppy-disk"></i>Salvar</button>
            </div>
        </div>
    </form>
</div>