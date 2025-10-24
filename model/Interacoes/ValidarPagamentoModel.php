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
}
