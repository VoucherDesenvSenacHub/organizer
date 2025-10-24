<?php

class AuthService {
    public static function verificaLoginOng() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['ong_id'])) {
            header('Location: /login.php');
            exit;
        }
    }
}