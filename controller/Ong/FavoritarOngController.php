<?php
require_once __DIR__ . '/../../model/OngModel.php';
session_start();

$ongModel = new OngModel();

$usuarioId = $_SESSION['usuario']['id'];
$ongId = $_POST['ong-id'] ?? null;

if ($ongId) {
    $favorito = $ongModel->favoritarOng($usuarioId, $ongId);
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
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;