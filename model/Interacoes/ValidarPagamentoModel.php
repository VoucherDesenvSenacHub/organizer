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

    public function validarPagamentoCartao($numeroCartao, $nomeCartao, $expiracaoMes, $expiracaoAno,
        $cvv, $descricaoProduto, $valorProduto, $nome, $cpfCnpj,
        $email, $cep,$enderecoNumero, $enderecoComplemento, $telefone){
            // Implementar tratamento dos dados recebidos e de erros

        }
}
