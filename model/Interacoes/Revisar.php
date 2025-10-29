<?php

/*
{
    "cartao": {
        "numero": $numeroCartao,
        "nome": $nomeCartao,
        "expiracaoMes": $expiracaoMes,
        "expiracaoAno": $expiracaoAno,
        "cvv": $cvv
    },
    "produto": {
        "descricao": $descricaoProduto,
        "valor": $valorProduto
    },
    "titular": {
        "nome": $nome,
        "cpfCnpj": $cpfCnpj,
        "email": $email,
        "cep": $cep,
        "enderecoNumero": $enderecoNumero,
        "enderecoComplemento": $enderecoComplemento,
        "telefone": $telefone
    }
}
A resposta da API é um json com o seguinte formato:
{
  "id": 86,
  "tipo": "CARTAO_CREDITO",
  "situacao": "APROVADA",
  "descricao": "Fone de Ouvido Bluetooth",
  "valor": "400",
  "cartao": {
    "id": 86,
    "numero": "4111111111111113",
    "nome": "Adercio",
    "expiracaoMes": "12",
    "expiracaoAno": "2028",
    "cvv": "123",
    "token": "019a303e-2027-78ce-8783-012e4e724fa1",
    "bandeira": "VISA",
    "titular": {
      "id": 86,
      "nome": "João da Silva",
      "cpfCnpj": "12345678900",
      "email": "joao.silva@email.com",
      "cep": "01001000",
      "enderecoNumero": 123,
      "enderecoComplemento": "Apto 45",
      "telefone": "11912345678"
    }
  }
}

*/
/**
 * Envia pagamento via cURL (POST JSON) e retorna array com resultado.
 *
 * Retorna:
 *  - ['success' => true, 'id' => int, 'situacao' => string, 'raw' => decoded_json]
 *  - ou ['success' => false, 'error' => 'mensagem', 'http_code' => int|null, 'curl_error' => string|null]
 */

function sendPaymentWithCreditCard(array $dados): array {
    $url = 'http://payment.avanth.kinghost.net/api/payments/pay-with-credit-card';

    // Monta o payload (array) — presume que $dados já contém as chaves necessárias
    $payload = [
        'cartao' => [
            'numero' => $dados['cartao']['numero'] ?? '',
            'nome' => $dados['cartao']['nome'] ?? '',
            'expiracaoMes' => $dados['cartao']['expiracaoMes'] ?? '',
            'expiracaoAno' => $dados['cartao']['expiracaoAno'] ?? '',
            'cvv' => $dados['cartao']['cvv'] ?? ''
        ],
        'produto' => [
            'descricao' => $dados['produto']['descricao'] ?? '',
            'valor' => $dados['produto']['valor'] ?? ''
        ],
        'titular' => [
            'nome' => $dados['titular']['nome'] ?? '',
            'cpfCnpj' => $dados['titular']['cpfCnpj'] ?? '',
            'email' => $dados['titular']['email'] ?? '',
            'cep' => $dados['titular']['cep'] ?? '',
            'enderecoNumero' => $dados['titular']['enderecoNumero'] ?? '',
            'enderecoComplemento' => $dados['titular']['enderecoComplemento'] ?? '',
            'telefone' => $dados['titular']['telefone'] ?? ''
        ]
    ];

    $json = json_encode($payload, JSON_UNESCAPED_UNICODE);

    $pagamento = curl_init($url);
    curl_setopt_array($pagamento, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $json,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Accept: application/json',
            'Content-Length: ' . strlen($json)
        ],
        // opcional: timeout
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_TIMEOUT => 30,
    ]);

    $responseBody = curl_exec($pagamento);
    $curlErr = curl_error($pagamento) ?: null;
    $httpCode = curl_getinfo($pagamento, CURLINFO_HTTP_CODE);
    curl_close($pagamento);

    if ($responseBody === false && $curlErr) {
        return [
            'success' => false,
            'error' => 'Erro cURL ao executar requisição.',
            'http_code' => $httpCode ?: null,
            'curl_error' => $curlErr
        ];
    }

    // Tenta decodificar JSON
    $decoded = json_decode($responseBody, true);
    if ($decoded === null && json_last_error() !== JSON_ERROR_NONE) {
        return [
            'success' => false,
            'error' => 'Resposta não é JSON válido.',
            'http_code' => $httpCode,
            'curl_error' => $curlErr,
            'raw_response' => $responseBody
        ];
    }

    // Se HTTP não for 2xx, sinaliza erro (mas tenta extrair mensagem se houver)
    if ($httpCode < 200 || $httpCode >= 300) {
        $msg = $decoded['message'] ?? ($decoded['erro'] ?? 'Resposta com código HTTP '.$httpCode);
        return [
            'success' => false,
            'error' => $msg,
            'http_code' => $httpCode,
            'raw' => $decoded
        ];
    }

    // Extrai id e situacao (existem no JSON de exemplo)
    $id = $decoded['id'] ?? ($decoded['cartao']['id'] ?? null);
    $situacao = $decoded['situacao'] ?? null;

    return [
        'success' => true,
        'id' => $id,
        'situacao' => $situacao,
        'raw' => $decoded
    ];
}


// ---------------------- Exemplo de uso ----------------------

// Substitua pelas variáveis reais / provenientes do seu formulário
$numeroCartao = '4111111111111113';
$nomeCartao = 'Adercio';
$expiracaoMes = '12';
$expiracaoAno = '2028';
$cvv = '123';

$descricaoProduto = 'Fone de Ouvido Bluetooth';
$valorProduto = '400';

$nome = 'João da Silva';
$cpfCnpj = '12345678900';
$email = 'joao.silva@email.com';
$cep = '01001000';
$enderecoNumero = 123;
$enderecoComplemento = 'Apto 45';
$telefone = '11912345678';

// Monta o array $dados
$dados = [
    'cartao' => [
        'numero' => $numeroCartao,
        'nome' => $nomeCartao,
        'expiracaoMes' => $expiracaoMes,
        'expiracaoAno' => $expiracaoAno,
        'cvv' => $cvv
    ],
    'produto' => [
        'descricao' => $descricaoProduto,
        'valor' => $valorProduto
    ],
    'titular' => [
        'nome' => $nome,
        'cpfCnpj' => $cpfCnpj,
        'email' => $email,
        'cep' => $cep,
        'enderecoNumero' => $enderecoNumero,
        'enderecoComplemento' => $enderecoComplemento,
        'telefone' => $telefone
    ]
];

// Envia
$result = sendPaymentWithCreditCard($dados);

// Exibe resultado (apenas para exemplo)
if ($result['success']) {
    echo "Pagamento enviado com sucesso.\n";
    echo "ID: " . $result['id'] . "\n";
    echo "Situação: " . $result['situacao'] . "\n";
    // var_dump($result['raw']); // descomente se precisar ver a resposta completa
} else {
    echo "Erro ao enviar pagamento: " . ($result['error'] ?? 'Erro desconhecido') . "\n";
    if (isset($result['http_code'])) echo "HTTP code: " . $result['http_code'] . "\n";
    if (!empty($result['curl_error'])) echo "cURL error: " . $result['curl_error'] . "\n";
    // opcional: var_dump($result['raw_response'] ?? $result['raw']);
}
