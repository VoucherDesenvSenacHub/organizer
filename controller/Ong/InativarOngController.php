<?php
require_once __DIR__ . '/../../autoload.php';
require_once __DIR__ . '/../../service/EmailService.php';
require_once __DIR__ . '/../../session_config.php';

class InativarOngController
{
    private $ongModel;
    private $emailService;

    public function __construct()
    {
        $this->ongModel = new OngModel();
        $this->emailService = new EmailService();
    }

    public function inativarOng()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['inativar-ong'])) {
            return;
        }

        try {

            $ongId = $_POST['ong_id'] ?? null;

            // Buscar dados
            $ongData = $this->ongModel->buscarId($ongId);

            if (!$ongData) {
                $_SESSION['mensagem_toast'] = ['erro', 'ONG não encontrada!'];
                $this->redirecionar();
                return;
            }

            // Inativar ONG
            $resultado = $this->ongModel->inativar($ongId);

            if ($resultado) {

                // enviar email
                try {
                    $this->emailService->enviarEmailInativacaoOng(
                        $ongData['email'],
                        $ongData['nome']
                    );
                } catch (Exception $e) {
                    error_log("Erro ao enviar email: " . $e->getMessage());
                }

                if ($_SESSION['perfil_usuario'] === 'adm') {
                    $_SESSION['mensagem_toast'] = ['sucesso', 'ONG inativada com sucesso!'];
                    header('Location: ../../view/pages/adm/ongs.php');
                    exit;
                } else {
                    session_destroy();
                    session_start();
                    $_SESSION['mensagem_toast'] = ['sucesso', 'Sua ONG foi inativada com sucesso!'];
                    header('Location: ../../view/pages/visitante/login.php');
                    exit;
                }
            } else {
                $_SESSION['mensagem_toast'] = ['erro', 'Falha ao inativar ONG!'];
                $this->redirecionar();
                exit;
            }
        } catch (Exception $e) {
            $_SESSION['mensagem_toast'] = ['erro', 'Erro inesperado ao inativar ONG!'];
            $this->redirecionar();
            exit;
        }
    }

    private function redirecionar()
    {
        if (!empty($_SESSION['perfil_usuario']) && $_SESSION['perfil_usuario'] === 'adm') {
            header('Location: ../../view/pages/adm/ongs.php');
        } else {
            header('Location: ../../view/pages/ong/conta.php');
        }
        exit;
    }
}

// Executa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new InativarOngController();
    $controller->inativarOng();
}