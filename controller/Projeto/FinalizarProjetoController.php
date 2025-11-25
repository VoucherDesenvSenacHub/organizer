<?php
require_once __DIR__ . '/../../model/ProjetoModel.php';
require_once '../../service/AuthService.php';

AuthService::verificaLoginOng();

$projetoModel = new ProjetoModel();

// Pegar os dados
$motivo = filter_input(INPUT_POST, 'motivo-finalizar', FILTER_SANITIZE_SPECIAL_CHARS);
$projetoId = $_POST['projeto-id'] ?? null;

if ($motivo === 'outro') {
    $motivoDetalhado = filter_input(INPUT_POST, 'motivo', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($motivoDetalhado)) {
        $motivo = $motivoDetalhado;
    }
}

$resultado = $projetoModel->finalizarProjeto($projetoId, $motivo);
if ($resultado) {
    $_SESSION['mensagem_toast'] = ['sucesso', 'Projeto finalizado com sucesso!'];
} else {
    $_SESSION['mensagem_toast'] = ['erro', 'Falha ao finalizar Projeto!'];
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
