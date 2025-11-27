<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;
use Symfony\Component\Dotenv\Dotenv;

$autoloadPath = __DIR__ . '/../vendor/autoload.php';
if (!file_exists($autoloadPath)) {
    // Redireciona para página explicando que precisa rodar "composer install"
    header("Location: /organizer/view/pages/dependencias.php");
    exit;
}
require_once $autoloadPath;

$envPath = __DIR__ . '/../.env';
if (!file_exists($envPath)) {
    header("Location: /organizer/view/pages/dependencias.php");
    exit;
}

require_once __DIR__ . "/../exceptions/EmailException.php";

class EmailUtil
{
    private $mailer;

    public function __construct()
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/../.env');

        $this->mailer = new PHPMailer(true);

        try {
            // Configurações do servidor SMTP (Gmail)
            $this->mailer->isSMTP();
            $this->mailer->Host = $_ENV['EMAIL_HOST'];
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = $_ENV['EMAIL_USERNAME'];
            $this->mailer->Password = $_ENV['EMAIL_PASSWORD'];
            $this->mailer->SMTPSecure = $_ENV['EMAIL_SMTP_SECURE'];
            $this->mailer->Port = (int) $_ENV['EMAIL_PORT'];
            $this->mailer->CharSet = 'UTF-8';
            $this->mailer->isHTML(true);
            $this->mailer->setFrom($_ENV['EMAIL_USERNAME'], $_ENV['EMAIL_FROM_NAME'] ?: 'Suporte');
            $this->mailer->SMTPDebug = 0;

        } catch (PHPMailerException $e) {
            throw new EmailException("Falha ao configurar o PHPMailer: " . $e->getMessage());
        }
    }

    /**
     * Envia um e-mail.
     */
    public function enviar($destinatario, $assunto, $mensagem)
    {
        if (!filter_var($destinatario, FILTER_VALIDATE_EMAIL)) {
            throw EmailException::emailInvalido($destinatario);
        }

        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($destinatario);
            $this->mailer->Subject = $assunto;
            $this->mailer->Body = $mensagem;

            $this->mailer->send();

        } catch (PHPMailerException $e) {
            throw new EmailException("Erro ao enviar e-mail: " . $e->getMessage());
        }
    }
}