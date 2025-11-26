<?php
require_once __DIR__ . '/../../autoload.php';

require_once __DIR__ . '/../../session_config.php';
require_once __DIR__ . '/../../service/EmailService.php';

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
        // Verifica se veio um POST válido
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['inativar-ong'])) {
            return;
        }

        try {
            $ongId = isset($_POST['ong_id']) ? $_POST['ong_id'] : $_SESSION['ong_id'];

            // Buscar dados da ONG antes da inativação para enviar email
            $ongData = $this->ongModel->buscarId($ongId);
            
            if (!$ongData) {
                $_SESSION['mensagem_toast'] = ['erro', 'ONG não encontrada!'];
                if ($_SESSION['perfil_usuario'] === 'adm') {
                    header('Location: ../../view/pages/adm/ongs.php');
                    exit;
                } else {
                    header('Location: ../../view/pages/ong/conta.php');
                    exit;
                }
            }

            // Atualizar status da ONG para INATIVO
            $resultado = $this->ongModel->inativar($ongId);

            if ($resultado) {
                // Enviar email de notificação
                try {
                    $this->emailService->enviarEmailInativacaoOng(
                        $ongData['email'], 
                        $ongData['nome']
                    );
                } catch (Exception $e) {
                    // Log do erro, mas não impede a inativação
                    error_log("Erro ao enviar email de inativação: " . $e->getMessage());
                }

                if ($_SESSION['perfil_usuario'] === 'adm') {
                    $_SESSION['mensagem_toast'] = ['sucesso', 'ONG inativada com sucesso!'];
                    header('Location: ../../view/pages/adm/ongs.php');
                    exit;
                } else {
                    // Limpar sessão e redirecionar para página inicial
                    session_destroy();
                    session_start();
                    $_SESSION['mensagem_toast'] = ['sucesso', 'Sua ONG foi inativada com Sucesso!'];
                    header('Location: ../../view/pages/visitante/login.php');
                    exit;
                }
            } else {
                $_SESSION['mensagem_toast'] = ['erro', 'Falha ao inativar ONG!'];
                if ($_SESSION['perfil_usuario'] === 'adm') {
                    header('Location: ../../view/pages/adm/ongs.php');
                    exit;
                } else {
                    header('Location: ../../view/pages/ong/conta.php');
                    exit;
                }
            }
        } catch (Exception $e) {
            $_SESSION['mensagem_toast'] = ['erro', 'Falha ao inativar ONG!'];
            if ($_SESSION['perfil_usuario'] === 'adm') {
                header('Location: ../../view/pages/adm/ongs.php');
                exit;
            }

            // Se for ONG normal
            session_unset();
            session_destroy();

            session_start();
            $_SESSION['mensagem_toast'] = ['sucesso', 'Sua ONG foi inativada com sucesso!'];

            header('Location: ../../view/pages/visitante/login.php');
            exit;
            

        } 
    }
}


// Executa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new InativarOngController();
    $controller->inativarOng();
}
