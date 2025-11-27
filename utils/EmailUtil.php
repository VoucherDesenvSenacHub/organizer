<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;
use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../exceptions/EmailException.php";

class EmailUtil
{
    private $mailer;
    private $ativo = true; // indica se o email pode funcionar

    public function __construct()
    {
        try {
            $dotenv = new Dotenv();
            $dotenv->load(__DIR__ . '/../.env');

            $this->mailer = new PHPMailer(true);

            // Configurações SMTP
            $this->mailer->isSMTP();
            $this->mailer->Host = $_ENV['EMAIL_HOST'];
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = $_ENV['EMAIL_USERNAME'];
            $this->mailer->Password = $_ENV['EMAIL_PASSWORD'];
            $this->mailer->SMTPSecure = $_ENV['EMAIL_SMTP_SECURE'];
            $this->mailer->Port = (int) $_ENV['EMAIL_PORT'];
            $this->mailer->CharSet = 'UTF-8';
            $this->mailer->isHTML(true);
            $this->mailer->setFrom(
                $_ENV['EMAIL_USERNAME'],
                $_ENV['EMAIL_FROM_NAME'] ?: 'Suporte'
            );
            $this->mailer->SMTPDebug = 0;

        } catch (PHPMailerException $e) {

            // Não lançar exception aqui!
            error_log("Falha ao configurar PHPMailer: " . $e->getMessage());

            // Desativa envio de email
            $this->mailer = null;
            $this->ativo = false;
        }
    }

    /**
     * Envia um e-mail.
     */
    public function enviar($destinatario, $assunto, $mensagem)
    {
        // Se o email está desativado, apenas registra e não quebra o sistema
        if (!$this->ativo || $this->mailer === null) {
            error_log("Envio de e-mail ignorado (PHPMailer indisponível).");
            return false;
        }

        if (!filter_var($destinatario, FILTER_VALIDATE_EMAIL)) {
            error_log("Email inválido: " . $destinatario);
            return false;
        }

        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($destinatario);
            $this->mailer->Subject = $assunto;
            $this->mailer->Body = $mensagem;

            return $this->mailer->send();

        } catch (PHPMailerException $e) {
            // Não lançar exception — apenas registra o erro
            error_log("Erro ao enviar e-mail: " . $e->getMessage());
            return false;
        }
    }
}