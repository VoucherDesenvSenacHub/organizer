<?php

require_once __DIR__ . '/../util/HttpClientUtil.php';

class PagamentoService
{
    public static function processarPagamentoCartao(
        $numeroCartao,
        $nomeCartao,
        $expiracaoMes,
        $expiracaoAno,
        $cvv,
        $descricaoProduto,
        $valorProduto,
        $nome,
        $cpfCnpj,
        $email,
        $cep,
        $enderecoNumero,
        $enderecoComplemento,
        $telefone
    ) {
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
        $httpClient = new HttpClientUtil();
        $pagamentoCartao = $httpClient->post($url, $payload);
        return $pagamentoCartao;
    }
}
