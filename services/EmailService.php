<?php

require_once __DIR__ . "/../utils/EmailUtil.php";
require_once __DIR__ . "/../exceptions/EmailException.php";

class EmailService
{
    private $emailUtil;

    public function __construct()
    {
        $this->emailUtil = new EmailUtil();
    }

    /**
     * Envia email de redefinição de senha
     */
    public function enviarEmailRedefinirSenha($destinatario, $link)
    {
        $assunto = "Redefinição de Senha - Organizer";
        $mensagem = "
        <h2>Olá!</h2>
        <p>Recebemos uma solicitação para redefinir sua senha.</p>
        <p>Clique no link abaixo para criar uma nova senha. Esse link é válido por 1 hora.</p>
        <p><a href='{$link}' target='_blank' style='background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Redefinir minha senha</a></p>
        <br>
        <p>Se você não solicitou a redefinição, ignore este e-mail.</p>
        <p style='color: #888; font-size: 0.9em;'>Esta é uma mensagem automática. Por favor, não responda a este e-mail.</p>
        ";

        $this->emailUtil->enviar($destinatario, $assunto, $mensagem);
    }

    /**
     * Envia email de boas-vindas
     */
    public function enviarEmailBoasVindas($destinatario, $nome)
    {
        $assunto = "Bem-vindo ao Organizer!";
        $mensagem = "
        <h2>Bem-vindo, {$nome}!</h2>
        <p>Seu cadastro no Organizer foi realizado com sucesso.</p>
        <p>A partir de agora você pode utilizar todos os recursos da plataforma.</p>
        <p style='color: #888; font-size: 0.9em;'>Esta é uma mensagem automática. Por favor, não responda a este e-mail.</p>
        ";

        $this->emailUtil->enviar($destinatario, $assunto, $mensagem);
    }

    /**
     * Envia email genérico
     */
    public function enviarEmailGenerico($destinatario, $assunto, $mensagem)
    {
        // Adiciona rodapé padrão
        $mensagemCompleta = $mensagem . "
        <br>
        <p style='color: #888; font-size: 0.9em;'>Esta é uma mensagem automática. Por favor, não responda a este e-mail.</p>
        ";

        $this->emailUtil->enviar($destinatario, $assunto, $mensagemCompleta);
    }

    /**
     * Atualiza configuração de email
     */
    public function atualizarConfiguracaoEmail($host, $username, $password, $port = 587, $secure = 'tls')
    {
        $this->emailUtil->atualizarConfiguracao($host, $username, $password, $port, $secure);
    }
}