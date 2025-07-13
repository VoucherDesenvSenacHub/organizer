<?php
require_once __DIR__ . '/../model/UsuarioModel.php';

session_start();

$usuarioModel = new Usuario();

$acao = $_GET['acao'] ?? $_POST['acao'] ?? null;

switch ($acao) {
    case 'login':
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $contaUsuario = $usuarioModel->login($email);

        if ($contaUsuario && password_verify($senha, $contaUsuario['senha'])) {
            // Guardar dados do usuário na sessão
            $_SESSION['usuario_id'] = $contaUsuario['usuario_id'];
            $_SESSION['usuario_nome'] = $contaUsuario['nome'];
            $_SESSION['usuario_foto'] = $contaUsuario['foto_perfil'] ?? '../../assets/images/global/user-placeholder.jpg';
            $_SESSION['usuario_adm'] = $contaUsuario['adm'];

            header('Location: ../view/pages/visitante/acesso.php');
            exit;
        }

        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?msg=logerro');
        exit;


    case 'acesso':
        $perfilUsuario = $_POST['perfil'];

        // Verificar se o usuário tem uma ONG
        if ($perfilUsuario === 'ong') {
            $ongExiste = $usuarioModel->buscarOngUsuario($_SESSION['usuario_id']);
            if (!$ongExiste) {
                header("Location: ../ong/cadastro.php?msg=conta");
                exit;
            }
            $_SESSION['ong_id'] = $ongExiste;
        }

        // Leva para home do acesso escolhido
        $_SESSION['perfil_usuario'] = $perfilUsuario;
        header("Location: ../view/pages/{$perfilUsuario}/home.php");
        exit;

    default:
        header('Location: ../view/pages/visitante/home.php');
        exit;
}