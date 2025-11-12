<?php

class RelatorioService
{

    public function gerarReciboDoacao(
        $idOng,
        $projeto,
        $valor,
        $data,
        $nome,
        $ong,
        $cnpj,
        $cidade,
        $estado
    ) {
        // Limpa caracteres de máscara do dado CNPJ
        $cnpj = str_replace('.', '', $cnpj);
        $cnpj = str_replace('-', '', $cnpj);
        $cnpj = str_replace('/', '', $cnpj);

        // Formata o CNPJ com máscara para exibição no PDF do recibo
        $cnpj_formatado = substr($cnpj, 0, 2) . '.' .
            substr($cnpj, 2, 3) . '.' .
            substr($cnpj, 5, 3) . '/' .
            substr($cnpj, 8, 4) . '-' .
            substr($cnpj, 12, 2);
    }

    public function gerarVoluntariosProjeto($idOng)
    {
        /*
        Aqui serão processadas as buscas no banco de dados e tratamento dos dados para transferência
        para o template voluntariosProjeto.php
        */
    }

    public function gerarDoacoesMensais($idOng) {}

    public function gerarDoacoesProjeto($idOng) {}
}
