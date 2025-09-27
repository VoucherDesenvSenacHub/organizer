<?php
require_once __DIR__ . '/../../model/Interacoes/FavoritarModel.php';
session_start();

$favoritoModel = new FavoritarModel();

$usuarioId = $_SESSION['usuario']['id'];
$tipo = $_POST['tipo'] ?? null; // 'projeto' ou 'ong'
$id = $_POST['id'] ?? null;

header('Content-Type: application/json');

if ($tipo && $id) {
    $favorito = $favoritoModel->favoritar($usuarioId, $tipo, $id);

    if ($favorito) {
        echo json_encode(['tipo' => 'favorito', 'mensagem' => ucfirst($tipo) . ' adicionado aos favoritos!']);
    } else {
        echo json_encode(['tipo' => 'desfavorito', 'mensagem' => ucfirst($tipo) . ' removido dos favoritos!']);
    }
} else {
    echo json_encode(['tipo' => 'erro', 'mensagem' => 'Dados inválidos.']);
}
exit;
