<?php
require_once __DIR__ . '/../../autoload.php';
session_start();

class InativarOngController
{
    private $ongModel;

    public function __construct()
    {
        $this->ongModel = new OngModel();
    }

    public function inativarOng()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inativar-ong'])) {
            try {
                $ongId = $_SESSION['ong_id'];

                // Atualizar status da ONG para INATIVO
                $resultado = $this->ongModel->inativar($ongId);

                if ($resultado) {
                    // Limpar sessão e redirecionar para página inicial
                    session_destroy();
                    session_start();
                    $_SESSION['mensagem_toast'] = ['sucesso', 'Sua ONG foi inativada com Sucesso!'];
                    header('Location: ../../view/pages/visitante/login.php');
                    exit;
                } else {
                    $_SESSION['mensagem_toast'] = ['erro', 'Falha ao inativar ONG!'];
                    header('Location: ../../view/pages/ong/conta.php');
                    exit;
                }
            } catch (Exception $e) {
                $_SESSION['mensagem_toast'] = ['erro', 'Falha ao inativar ONG!'];
                header('Location: ../../view/pages/ong/conta.php');
                exit;
            }
        }
    }
}

// Processar a requisição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new InativarOngController();
    $controller->inativarOng();
}
