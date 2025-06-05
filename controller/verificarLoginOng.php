<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../visitante/login.php?msg=login');
    exit;
} else if (isset($_SESSION['usuario_id']) && $_SESSION['perfil_usuario'] != 'ong') {
    header('Location: ../ong/cadastro.php?msg=conta');
    exit;
}
