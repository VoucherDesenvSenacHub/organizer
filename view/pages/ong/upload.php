<?php
session_start();
require_once __DIR__ . '/../../../autoload.php';
$imagemModel = new ImagemModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagem'])) {
    try {
        $idImagem = $imagemModel->salvarImagem($_FILES['imagem']);

        // Mensagem de sucesso
        $_SESSION['toast'] = "Upload realizado com sucesso!";
        $_SESSION['toast_tipo'] = 'success';

        // Redireciona para a página de perfil
        header('Location: home.php');
        exit;
    } catch (Exception $e) {
        $_SESSION['toast'] = "Erro: " . $e->getMessage();
        $_SESSION['toast_tipo'] = 'error';
        header('Location: home.php');
        exit;
    }
} else {
    $_SESSION['toast'] = "Nenhuma imagem enviada.";
    $_SESSION['toast_tipo'] = 'warning';
    header('Location: home.php');
    exit;
}
