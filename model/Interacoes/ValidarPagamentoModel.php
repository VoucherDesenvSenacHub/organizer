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
                'cep' => $cep,
                'enderecoNumero' => $enderecoNumero,
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
        $responseBody = curl_exec($pagamento);
        $curlErr = curl_error($pagamento) ?: null;
        $httpCode = curl_getinfo($pagamento, CURLINFO_HTTP_CODE);
        curl_close($pagamento);
        $transacao_id = 0;
        return $transacao_id;
    }
}
