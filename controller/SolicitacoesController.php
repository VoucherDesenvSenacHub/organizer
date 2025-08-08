<?php
session_start();
require_once __DIR__ . '/../autoload.php';

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'adm') {
    http_response_code(403);
    echo json_encode(['error' => 'Acesso negado']);
    exit;
}

$adminModel = new AdminModel();

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $tipo = $_GET['tipo'] ?? '';
    
    switch ($tipo) {
        case 'empresas':
            $data = $adminModel->ListarSolicitacoesEmpresas();
            break;
        case 'ongs':
            $data = $adminModel->ListarSolicitacoesOngs();
            break;
        case 'inativar':
            $data = $adminModel->ListarSolicitacoesInativar();
            break;
        default:
            http_response_code(400);
            echo json_encode(['error' => 'Tipo inválido']);
            exit;
    }
    
    echo json_encode(['success' => true, 'data' => $data]);
    
} elseif ($method === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    $tipo = $input['tipo'] ?? '';
    $id = $input['id'] ?? 0;
    $acao = $input['acao'] ?? '';
    
    if (!$tipo || !$id || !in_array($acao, ['approve', 'reject'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Parâmetros inválidos']);
        exit;
    }
    
    $resultado = $adminModel->ProcessarSolicitacao($tipo, $id, $acao);
    
    if ($resultado) {
        echo json_encode(['success' => true, 'message' => 'Ação processada com sucesso']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Erro ao processar ação']);
    }
    
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido']);
}
