<?php
require_once __DIR__ . "/../../config/database.php";
class ValidarPagamentoModel
{
    // Dados do cartão
    public $numeroCartao;
    public $nomeCartao;
    public $expiracaoMes;
    public $expiracaoAno;
    public $cvv;

    // Dados do produto
    public $descricaoProduto;
    public $valorProduto;

    // Dados pessoais e de contato
    public $nome;
    public $cpfCnpj;
    public $email;
    public $cep;
    public $enderecoNumero;
    public $enderecoComplemento;
    public $telefone;

    // Construtor opcional (pode facilitar a inicialização)
    public function __construct(
        $numeroCartao = null,
        $nomeCartao = null,
        $expiracaoMes = null,
        $expiracaoAno = null,
        $cvv = null,
        $descricaoProduto = null,
        $valorProduto = null,
        $nome = null,
        $cpfCnpj = null,
        $email = null,
        $cep = null,
        $enderecoNumero = null,
        $enderecoComplemento = null,
        $telefone = null
    ) {
        $this->numeroCartao = $numeroCartao;
        $this->nomeCartao = $nomeCartao;
        $this->expiracaoMes = $expiracaoMes;
        $this->expiracaoAno = $expiracaoAno;
        $this->cvv = $cvv;
        $this->descricaoProduto = $descricaoProduto;
        $this->valorProduto = $valorProduto;
        $this->nome = $nome;
        $this->cpfCnpj = $cpfCnpj;
        $this->email = $email;
        $this->cep = $cep;
        $this->enderecoNumero = $enderecoNumero;
        $this->enderecoComplemento = $enderecoComplemento;
        $this->telefone = $telefone;
    }
    function validarPagamentoCartao($numeroCartao, $nomeCartao, $expiracaoMes, $expiracaoAno,
        $cvv, $descricaoProduto, $valorProduto, $nome, $cpfCnpj,
        $email, $cep,$enderecoNumero, $enderecoComplemento, $telefone){
        $url = 'http://payment.avanth.kinghost.net/api/payments/pay-with-credit-card';
        $payload = [
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
                'cep' => (string) $cep,
                'enderecoNumero' => (string) $enderecoNumero,
                'enderecoComplemento' => $enderecoComplemento,
                'telefone' => $telefone
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
            ],]);
        file_put_contents('ultimo_payload.json', $json);
        $responseBody = curl_exec($pagamento);
        $curlErr = curl_error($pagamento) ?: null;
        $httpCode = curl_getinfo($pagamento, CURLINFO_HTTP_CODE);
        curl_close($pagamento);
    
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
    if ($httpCode < 200 || $httpCode >= 300) {
        $msg = $decoded['message'] ?? ($decoded['erro'] ?? 'Resposta com código HTTP '.$httpCode);
        return [
            'success' => false,
            'error' => $msg,
            'http_code' => $httpCode,
            'raw' => $decoded
        ];
    }
    $id = $decoded['id'] ?? ($decoded['cartao']['id'] ?? null);
    $situacao = $decoded['situacao'] ?? null;

    return [
        'success' => true,
        'id' => $id,
        'situacao' => $situacao,
        'raw' => $decoded
    ];
    }
}
