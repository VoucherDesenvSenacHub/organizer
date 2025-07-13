<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function VerificarAcesso($acesso)
{
    if ($acesso !== 'visitante' && !isset($_SESSION['usuario_id'])) {
        header('Location: ../visitante/login.php?msg=login');
        exit;
    }
    if (isset($_SESSION['usuario_id']) && $_SESSION['perfil_usuario'] !== $acesso) {
        header("Location: ../visitante/acesso.php");
        exit;
    }
};
