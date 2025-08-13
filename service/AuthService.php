<?php

class AuthService {
    public static function verificaLoginOng() {
        session_start();
        if (!isset($_SESSION['ong_id'])) {
            header('Location: /login.php');
            exit;
        }
    }
}