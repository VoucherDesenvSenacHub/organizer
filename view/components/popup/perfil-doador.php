<?php
require_once __DIR__ . '/../../../model/UsuarioModel.php';
$usuarioModel = new UsuarioModel();
$usuario = $usuarioModel->buscar_perfil($_SESSION['usuario']['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_usuario'])) {
        $id = $_POST['id_usuario'];
        $nome = $_POST['nome_usuario'];
        $telefone = preg_replace('/[^0-9]/', '', $_POST['telefone_usuario']);
        $cpf = preg_replace('/[^0-9]/', '', $_POST['cpf_usuario']);
        $data = $_POST['data_usuario'];
        $email = $_POST['email_usuario'];
        $idade = $usuarioModel->calcularIdade($data);

        if ($idade >= 18) {
            $resultado = $usuarioModel->update($id, $nome, $telefone, $cpf, $data, $email);
            if ($resultado === 1) {
                $usuario = $usuarioModel->buscar_perfil($_SESSION['usuario']['id']);
                $_SESSION['mensagem_toast'] = ['sucesso', 'Dados atualizados com sucesso!'];
            } elseif ($resultado === 0) {
                $_SESSION['mensagem_toast'] = ['info', 'Nenhuma alteração feita!'];
            } else {
                $_SESSION['mensagem_toast'] = ['erro', 'Falha ao atualizar dados!'];
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            echo "<script>alert('Você precisa ter 18 anos ou mais para atualizar o cadastro.')</script>";
        }
    }
    if (isset($_POST['usuario_id'])) {
        $id = $_POST['usuario_id'];
        $senha = $_POST['senha_usuario'];
        $senhaconfirm = $_POST['senhaconfirm'];
        if ($senha === $senhaconfirm) {
            $resultado_senha = $usuarioModel->updatesenha($id, $senha);
            if ($resultado_senha) {
                $_SESSION['mensagem_toast'] = ['sucesso', 'Senha alterada com sucesso!'];
            } else {
                $_SESSION['mensagem_toast'] = ['erro', 'Falha ao alterar senha!'];
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            echo "<script>alert('As senhas não coincidem')</script>";
        }
    };
}
?>

<div class="popup-fundo perfil-usuario-popup" id="perfil-doador-popup">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('perfil-doador-popup')"></button>
        <div id="left" class="box">
            <div id="perfil">
                <div class="upload-area" id="uploadAreaDoador">
                    <input type="file" id="foto_usuario" name="foto_usuario" accept="image/*" style="display:none;">
                    <img id="preview-foto" src="<?= $_SESSION['usuario']['foto'] ?>">
                    <div id="uploadTextDoador">
                        <i class="fa-solid fa-cloud-upload-alt"></i><br>
                        Arraste ou clique para trocar
                    </div>
                    <button type="button" class="btn-remover" id="btnRemoverDoador">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
                <p><?= $usuario['nome'] ?></p>
            </div>
            <button class="btn" title="Sair" onclick="abrir_popup('sair-da-conta-popup')">
                <i class="fa-solid fa-right-from-bracket"></i>
                Sair
            </button>
        </div>
        <div id="right" class="box">
            <h1>PERFIL</h1>
            <form action="#" method="POST" onsubmit="return confirm('Tem certeza que deseja alterar seus dados?')">
                <input type="hidden" name="id_usuario" value="<?= $_SESSION['usuario']['id'] ?>">
                <div class="input-group">
                    <div class="input-box">
                        <label for="nome_usuario">Nome</label>
                        <input name="nome_usuario" id="nome_usuario" type="text" value="<?= $usuario['nome'] ?>" required>
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="input-box inputM">
                        <label for="telefone_usuario">Telefone</label>
                        <input name="telefone_usuario" id="telefone_usuario" type="tel" value="<?= $usuario['telefone'] ?>" required minlength="11">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="input-box inputM">
                        <label for="cpf_usuario">CPF</label>
                        <input name="cpf_usuario" id="cpf_usuario" type="text" value="<?= $usuario['cpf'] ?>" required minlength="14">
                        <i class="fa-regular fa-address-card"></i>
                    </div>
                    <div class="input-box">
                        <label for="datan">Data de Nascimento</label>
                        <input name="data_usuario" id="datan" type="date" value="<?= $usuario['data_nascimento'] ?>" required>
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                </div>
                <h1>LOGIN</h1>
                <div class="input-box">
                    <label for="email_usuario">Email</label>
                    <input name="email_usuario" id="email_usuario" type="email" value="<?= $usuario['email'] ?>" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div id="acoes-perfil">
                    <button class="btn" type="button" onclick="abrir_popup('nova-senha-doador-popup')">
                        <i class="fa-solid fa-key"></i>
                        Alterar Senha
                    </button>
                    <button class="btn" type="submit"><i class="fa-solid fa-floppy-disk"></i>Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>