<?php

class AuthService
{
    public static function verificaLoginOng($redirect = '/view/pages/visitante/login.php')
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Verifica se existe sessão e se o usuário realmente é ONG
        if (
            !isset($_SESSION['ong_id']) ||
            !isset($_SESSION['perfil_usuario']) ||
            $_SESSION['perfil_usuario'] !== 'ong'
        ) {
            header("Location: {$redirect}");
            exit;
        }
    }
}
