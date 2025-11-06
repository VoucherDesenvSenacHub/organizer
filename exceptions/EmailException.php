<?php

class EmailException extends Exception
{
    /**
     * Cria uma nova exceção relacionada a e-mails.
     */
    public function __construct(string $message = "Erro no envio de email.", int $code = 0, ?Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Exceção para configuração de email inválida.
     */
    public static function configuracaoInvalida(string $detalhes): self
    {
        return new self("Configuração de email inválida: {$detalhes}");
    }

    /**
     * Exceção para email não enviado.
     */
    public static function naoEnviado(string $email, string $erro): self
    {
        return new self("Não foi possível enviar email para '{$email}': {$erro}");
    }

    /**
     * Exceção para email inválido.
     */
    public static function emailInvalido(string $email): self
    {
        return new self("O email '{$email}' é inválido.");
    }
}