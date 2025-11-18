<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../session_config.php';

// Verifica se usuário está logado e é administrador
if (!isset($_SESSION['usuario']) || $_SESSION['perfil_usuario'] !== 'adm') {
    http_response_code(403);
    echo json_encode(['error' => 'Acesso negado'], JSON_UNESCAPED_UNICODE);
    exit;
}

$adminModel = new AdminModel();

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

// Listar solicitações pendentes
if ($method === 'GET') {
    $tipo = $_GET['tipo'] ?? '';

    switch ($tipo) {
        case 'empresas':
            $data = $adminModel->ListarSolicitacoesEmpresas();
            break;
        case 'ongs':
            $data = $adminModel->ListarSolicitacoesOngs();
            break;
        default:
            http_response_code(400);
            echo json_encode(['error' => 'Tipo inválido'], JSON_UNESCAPED_UNICODE);
            exit;
    }

    echo json_encode(['success' => true, 'data' => $data], JSON_UNESCAPED_UNICODE);
    exit;

// Processar aprovação/rejeição de solicitações
} elseif ($method === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    // Valida se JSON está bem formado
    if (json_last_error() !== JSON_ERROR_NONE) {
        http_response_code(400);
        echo json_encode(['error' => 'JSON inválido'], JSON_UNESCAPED_UNICODE);
        exit;
    }

    $tipo = $input['tipo'] ?? '';
    $id = filter_var($input['id'] ?? null, FILTER_VALIDATE_INT);
    $acao = $input['acao'] ?? '';

    // Valida parâmetros obrigatórios
    if (!$tipo || !$id || !in_array($acao, ['approve', 'reject']) || !in_array($tipo, ['empresas', 'ongs'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Parâmetros inválidos'], JSON_UNESCAPED_UNICODE);
        exit;
    }

    $resultado = $adminModel->ProcessarSolicitacao($tipo, $id, $acao);

    // Retorna resultado da operação
    if ($resultado) {
        echo json_encode(['success' => true, 'message' => 'Ação processada com sucesso'], JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Erro ao processar ação ou registro não encontrado'], JSON_UNESCAPED_UNICODE);
    }
    exit;

// Método não permitido
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido'], JSON_UNESCAPED_UNICODE);
    exit;
}
