<?php

class AuthService {
    public static function verificaLoginUsuario() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: /login.php');
            exit;
        }
    }
}