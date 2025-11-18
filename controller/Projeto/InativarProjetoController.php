<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../model/ProjetoModel.php';
require_once __DIR__ . '/../../session_config.php';

class InativarProjetoController
{
    private $projetoModel;

    public function __construct()
    {
        $this->projetoModel = new ProjetoModel();
    }

    public function inativarProjeto()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inativar-projeto'])) {
            try {
                $projetoId = $_POST['projeto_id'];

                // Atualizar status do projeto para INATIVO
                $resultado = $this->projetoModel->inativar($projetoId);

                if ($resultado) {
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