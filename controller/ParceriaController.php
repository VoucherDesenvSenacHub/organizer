<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require_once __DIR__ . '/../autoload.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

$camposObrigatorios = ['nome', 'email', 'cnpj', 'telefone', 'mensagem'];
foreach ($camposObrigatorios as $campo) {
    if (empty($input[$campo])) {
        http_response_code(400);
        echo json_encode(['error' => "Campo '$campo' é obrigatório"]);
        exit;
    }
}

if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['error' => 'Email inválido']);
    exit;
}

$dados = [
    'nome' => trim($input['nome']),
    'email' => trim($input['email']),
    'cnpj' => preg_replace('/[^0-9]/', '', $input['cnpj']),
    'telefone' => preg_replace('/[^0-9]/', '', $input['telefone']),
    'mensagem' => trim($input['mensagem'])
];

try {
    $adminModel = new AdminModel();
    $resultado = $adminModel->CriarSolicitacaoParceria($dados);
    
    if ($resultado) {
        echo json_encode([
            'success' => true, 
            'message' => 'Solicitação de parceria enviada com sucesso! Nossa equipe entrará em contato em breve.'
        ]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Erro ao processar solicitação. Tente novamente.']);
    }
} catch (Exception $e) {
    http_response_code(500);
    if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
        if (strpos($e->getMessage(), 'email') !== false) {
            echo json_encode(['error' => 'Este email já possui uma solicitação cadastrada.']);
        } elseif (strpos($e->getMessage(), 'cnpj') !== false) {
            echo json_encode(['error' => 'Este CNPJ já possui uma solicitação cadastrada.']);
        } else {
            echo json_encode(['error' => 'Dados duplicados encontrados.']);
        }
    } else {
        echo json_encode(['error' => 'Erro interno do servidor']);
    }
}
?>
