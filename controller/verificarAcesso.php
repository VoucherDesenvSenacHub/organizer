<?php
session_start();
function VerificarAcesso($acesso)
{
    if ($acesso == 'visitante') {
        return;
    }
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: ../visitante/login.php?msg=login');
        exit;
    }
    if (isset($_SESSION['usuario_id']) && isset($_SESSION['perfil_usuario']) && $_SESSION['perfil_usuario'] !== $acesso) {
        header('Location: ../visitante/acesso.php');
        exit;
    }
};