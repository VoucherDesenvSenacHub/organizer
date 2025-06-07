<?php
session_start();
function VerificarAcesso($acesso)
{
    if ($acesso == 'visitante') {
        return;
    }
    if (!isset($_SESSION['usuario_id'])) {
        return header('Location: ../visitante/login.php?msg=login');
        exit;
    }
    if (isset($_SESSION['usuario_id']) && $_SESSION['perfil_usuario'] !== $acesso) {
        return header('Location: ../visitante/acesso.php');
        exit;
    }
};