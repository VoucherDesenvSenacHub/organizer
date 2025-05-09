<?php
session_start();

if (!isset($_SESSION['doador_id'])) {
    header('Location: login.php?msg=login');
    exit;
}

?>