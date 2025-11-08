<?php
require_once __DIR__ . '/../../../model/UsuarioModel.php';
require_once __DIR__ . '/../../../model/ImagemModel.php';

$imagemModel = new ImagemModel();
$usuarioModel = new UsuarioModel();
$usuario = $usuarioModel->buscar_perfil($_SESSION['usuario']['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Atualização de dados do perfil
    if (isset($_POST['id_usuario'])) {
        $id = $_POST['id_usuario'];
        $nome = $_POST['nome_usuario'];
        $telefone = preg_replace('/[^0-9]/', '', $_POST['telefone_usuario']);
        $cpf = preg_replace('/[^0-9]/', '', $_POST['cpf_usuario']);
        $data = $_POST['data_usuario'];
        $email = $_POST['email_usuario'];
        $idade = $usuarioModel->calcularIdade($data);

        if ($idade >= 18) {
            try {
                $resultado = 0;
                $imagemPadrao = 'view/assets/images/global/user-placeholder.jpg';

                // Remover Foto
                if (isset($_POST['remover_foto']) && $_POST['remover_foto'] === 'true') {
                    // Pega imagem atual
                    $idImagemAtual = $usuario['imagem_id'] ?? null;

                    if ($idImagemAtual) {
                        // Apaga a imagem do servidor e do banco
                        $imagemModel->deletarImagem($idImagemAtual);
                    }

                    // Remove o vínculo da imagem com o usuário
                    $usuarioModel->atualizarImagem($_SESSION['usuario']['id'], null);

                    // Atualiza a sessão para o placeholder
                    $_SESSION['usuario']['foto'] = 'view/assets/images/global/user-placeholder.jpg';
                    $resultado = 1;
                }

                // Nova Imagem
                if (!empty($_FILES['foto_usuario']['name'])) {
                    $pasta = __DIR__ . '/../../../upload/images/usuarios/';
                    if (!is_dir($pasta))
                        mkdir($pasta, 0777, true);

                    $tmp = $_FILES['foto_usuario']['tmp_name'];
                    $nomeOriginal = basename($_FILES['foto_usuario']['name']);
                    $novoNome = uniqid() . '-' . $nomeOriginal;
                    $destino = $pasta . $novoNome;

                    if (move_uploaded_file($tmp, $destino)) {
                        $idImagem = $imagemModel->salvarCaminhoImagem('upload/images/usuarios/' . $novoNome);
                        $usuarioModel->atualizarImagem($_SESSION['usuario']['id'], $idImagem);

                        $_SESSION['usuario']['foto'] = 'upload/images/usuarios/' . $novoNome;
                        $resultado = 1;
                    }
                }

                //Atualizar dados
                $resultadoDados = $usuarioModel->update($id, $nome, $telefone, $cpf, $data, $email);
                if ($resultadoDados > 0)
                    $resultado = 1;

                //Mensagem usuarios
                if ($resultado > 0) {
                    $_SESSION['mensagem_toast'] = ['sucesso', 'Dados atualizados com sucesso!'];
                } else {
                    $_SESSION['mensagem_toast'] = ['info', 'Nenhuma alteração feita!'];
                }

                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } catch (PDOException $e) {
                $_SESSION['mensagem_toast'] = ['erro', 'Falha ao atualizar dados!'];
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
        } else {
            echo "<script>alert('Você precisa ter 18 anos ou mais para atualizar o cadastro.')</script>";
        }
    }

    // Atualização de senha
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
    }
}
?>



<!-- HTML do perfil -->

<div class="popup-fundo perfil-usuario-popup" id="perfil-doador-popup">
    <form class="container-popup" action="#" method="POST" enctype="multipart/form-data"
        onsubmit="return confirm('Tem certeza que deseja alterar seus dados?')">
        <button type="button" class="btn-fechar-popup fa-solid fa-xmark"
            onclick="fechar_popup('perfil-doador-popup')"></button>
        <div id="left" class="box">
            <div id="perfil">
                <div class="upload-area" id="uploadAreaDoador">
                    <input type="file" id="foto_usuario" name="foto_usuario" accept="image/*" style="display:none;">
                    <img id="preview-foto" src="<?= !empty($_SESSION['usuario']['foto'])
                        ? '../../../' . $_SESSION['usuario']['foto']
                        : 'view/assets/images/global/image-placeholder.svg'
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
                    <input name="telefone_usuario" id="telefone_usuario" type="tel"
                        value="<?= htmlspecialchars($usuario['telefone']) ?>" required minlength="11">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="input-box inputM">
                    <label for="cpf_usuario">CPF</label>
                    <input name="cpf_usuario" id="cpf_usuario" type="text"
                        value="<?= htmlspecialchars($usuario['cpf']) ?>" required minlength="14">
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