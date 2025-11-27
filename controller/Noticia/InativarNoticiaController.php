<?php
require_once __DIR__ . '/../../session_config.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../model/NoticiaModel.php';
require_once __DIR__ . '/../../model/OngModel.php';
require_once __DIR__ . '/../../service/EmailService.php';

class InativarNoticiaController
{
    private $noticiaModel;
    private $emailService;

    public function __construct()
    {
        $this->noticiaModel = new NoticiaModel();
        $this->emailService = new EmailService();
    }

    public function inativarNoticia()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['noticia-id'])) {
            try {
                $noticiaId = $_POST['noticia-id'];

                // Buscar dados da notícia e ONG responsável antes da inativação
                $noticiaData = $this->noticiaModel->buscarPerfilNoticia($noticiaId);
                
                if (!$noticiaData) {
                    $_SESSION['mensagem_toast'] = ['erro', 'Notícia não encontrada!'];
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                }

                $ongModel = new OngModel();
                $ongData = $ongModel->buscarId($noticiaData['ong_id']);

                $resultado = $this->noticiaModel->inativarNoticia($noticiaId);

                if ($resultado) {
                    // Enviar email de notificação para a ONG
                    try {
                        if ($ongData && isset($ongData['email'])) {
                            $this->emailService->enviarEmailInativacaoNoticia(
                                $ongData['email'], 
                                $noticiaData['titulo']
                            );
                        }
                    } catch (Exception $e) {
                        // Log do erro, mas não impede a inativação
                        error_log("Erro ao enviar email de inativação de notícia: " . $e->getMessage());
                    }

                    $_SESSION['mensagem_toast'] = ['sucesso', 'Notícia inativada com sucesso!'];
                } else {
                    $_SESSION['mensagem_toast'] = ['erro', 'Falha ao inativar notícia!'];
                }
            } catch (Exception $e) {
                $_SESSION['mensagem_toast'] = ['erro', 'Falha ao inativar notícia!'];
            }
            
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $_SESSION['mensagem_toast'] = ['erro', 'ID da notícia não fornecido!'];
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}

// Processar a requisição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new InativarNoticiaController();
    $controller->inativarNoticia();
}
