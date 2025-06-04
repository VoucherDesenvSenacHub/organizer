<?php
session_start();
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: ../visitante/login.php?msg=login');
        exit;
    }
?>