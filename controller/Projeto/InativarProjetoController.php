<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../model/ProjetoModel.php';
require_once __DIR__ . '/../../session_config.php';
require_once __DIR__ . '/../../service/EmailService.php';

class InativarProjetoController
{
    private $projetoModel;
    private $emailService;

    public function __construct()
    {
        $this->projetoModel = new ProjetoModel();
        $this->emailService = new EmailService();
    }

    public function inativarProjeto()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inativar-projeto'])) {
            try {
                $projetoId = $_POST['projeto_id'];

                // Buscar dados do projeto e ONG responsável antes da inativação
                $projetoData = $this->projetoModel->buscarPerfilProjeto($projetoId);
                
                if (!$projetoData) {
                    $_SESSION['mensagem_toast'] = ['erro', 'Projeto não encontrado!'];
                    header('Location: ../../view/pages/adm/projetos.php');
                    exit;
                }

                // Buscar dados da ONG responsável
                require_once __DIR__ . '/../../model/OngModel.php';
                $ongModel = new OngModel();
                $ongData = $ongModel->buscarId($projetoData['ong_id']);

                // Atualizar status do projeto para INATIVO
                $resultado = $this->projetoModel->inativar($projetoId);

                if ($resultado) {
                    // Enviar email de notificação para a ONG
                    try {
                        if ($ongData && isset($ongData['email'])) {
                            $this->emailService->enviarEmailInativacaoProjeto(
                                $ongData['email'], 
                                $projetoData['titulo']
                            );
                        }
                    } catch (Exception $e) {
                        // Log do erro, mas não impede a inativação
                        error_log("Erro ao enviar email de inativação de projeto: " . $e->getMessage());
                    }

                    $_SESSION['mensagem_toast'] = ['sucesso', 'Projeto inativado com sucesso!'];
                    header('Location: ../../view/pages/adm/projetos.php');
                    exit;
                } else {
                    $_SESSION['mensagem_toast'] = ['erro', 'Falha ao inativar projeto!'];
                    header('Location: ../../view/pages/adm/projetos.php');
                    exit;
                }
            } catch (Exception $e) {
                $_SESSION['mensagem_toast'] = ['erro', 'Falha ao inativar projeto!'];
                header('Location: ../../view/pages/adm/projetos.php');
                exit;
            }
        }
    }
}

// Processar a requisição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new InativarProjetoController();
    $controller->inativarProjeto();
}