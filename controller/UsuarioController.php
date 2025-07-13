<?php
require_once __DIR__ . '/../model/UsuarioModel.php';

session_start();

$acao = $_GET['acao'] ?? $_POST['acao'] ?? null;

switch ($acao) {
    case 'login':
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $usuarioModel = new Usuario();

        $contaUsuario = $usuarioModel->login($email);

        if ($contaUsuario && password_verify($senha, $contaUsuario['senha'])) {
            // Iniciar sessão e guardar dados do doador
            session_start();
            $_SESSION['usuario_id'] = $contaUsuario['usuario_id'];
            $_SESSION['usuario_nome'] = $contaUsuario['nome'];
            $_SESSION['usuario_foto'] = $contaUsuario['foto_perfil'] ?? '../../assets/images/global/user-placeholder.jpg';
            $_SESSION['usuario_adm'] = $contaUsuario['adm'];

            header('Location: ../view/pages/visitante/acesso.php');
            exit;
        }

        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?msg=logerro');
        exit;

    default:
        header('Location: ../view/login.php');
        exit;
}
