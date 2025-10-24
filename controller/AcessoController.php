<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function VerificarAcesso($acesso)
{
    if ($acesso !== 'visitante' && !isset($_SESSION['usuario']['id'])) {
        $_SESSION['mensagem_toast'] = ['erro', 'Login necessário para continuar!'];
        header('Location: ../visitante/login.php');
        exit;
    }

    if(isset($_SESSION['usuario']['id']) && count(array_filter($_SESSION['usuario']['acessos'])) === 0) {
        header("Location: ../visitante/primeiro-acesso.php");
        exit;
    }

    if (isset($_SESSION['usuario']['id']) && $_SESSION['perfil_usuario'] !== $acesso) {
        header("Location: ../visitante/acesso.php");
        exit;
    }
};