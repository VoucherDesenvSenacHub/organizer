<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../exceptions/EmailException.php";

class EmailUtil
{
    private $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);
        $this->configurarMailer();
    }

    /**
     * Configura o PHPMailer com as configurações do sistema
     */
    private function configurarMailer()
    {
        try {
            // Configurações do servidor SMTP
            $this->mailer->isSMTP();
            $this->mailer->SMTPAuth = true;
            $this->mailer->Host = "smtp.example.com"; // Configurar necessário
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mailer->Port = 587;
            $this->mailer->Username = "your-user@example.com"; // Configurar conforme necessário
            $this->mailer->Password = "your-password"; // Configurar conforme necessário

            $this->mailer->isHtml(true);
            $this->mailer->setFrom("noreply@organizer.com", "Organizer");

        } catch (Exception $e) {
            throw EmailException::configuracaoInvalida("Erro ao configurar email: " . $e->getMessage());
        }
    }

    /**
     * Envia um email
     */
    public function enviar($destinatario, $assunto, $mensagem)
    {
        try {
            // Valida o email
            if (!filter_var($destinatario, FILTER_VALIDATE_EMAIL)) {
                throw EmailException::emailInvalido($destinatario);
            }

            // Configura o email
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($destinatario);
            $this->mailer->Subject = $assunto;
            $this->mailer->Body = $mensagem;

            // Envia o email
            $resultado = $this->mailer->send();

            if (!$resultado) {
                throw EmailException::naoEnviado($destinatario, "Falha no envio");
            }

            return true;

        } catch (Exception $e) {
            if ($e instanceof EmailException) {
                throw $e;
            }
            throw EmailException::naoEnviado($destinatario, $e->getMessage());
        }
    }

    /**
     * Atualiza a configuração do email
     */
    public function atualizarConfiguracao($host, $username, $password, $port = 587, $secure = PHPMailer::ENCRYPTION_STARTTLS)
    {
        try {
            $this->mailer->Host = $host;
            $this->mailer->Username = $username;
            $this->mailer->Password = $password;
            $this->mailer->Port = $port;
            $this->mailer->SMTPSecure = $secure;

            return true;
        } catch (Exception $e) {
            throw EmailException::configuracaoInvalida("Erro ao atualizar configuração: " . $e->getMessage());
        }
    }
}