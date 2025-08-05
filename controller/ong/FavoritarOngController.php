<?php
require_once __DIR__ . '/../../model/OngModel.php';
session_start();

$ongModel = new Ong();
$usuario_id = $_SESSION['usuario']['id'];
$ong_id = $_POST['ong-id-favorito'] ?? null;
if ($ong_id) {
    $favorito = $ongModel->favoritarOng($usuario_id, $ong_id);
    if ($favorito) {
        $_SESSION['favorito'] = true;
    } else {
        $_SESSION['favorito'] = false;
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    echo "ID da ONG não fornecido.";
}
header('Location: ' . $_SERVER['HTTP_REFERER'] . '?msg=favorito_erro');
exit;