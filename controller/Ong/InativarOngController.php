<?php
require_once __DIR__ . '/../../autoload.php';
session_start();

class InativarOngController
{
    private $ongModel;

    public function __construct()
    {
        $this->ongModel = new Ong();
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
                    header('Location: ../../auth/login.php?msg=ong_inativada');
                    exit;
                } else {
                    header('Location: ../../view/pages/ong/meu-perfil.php?erro=inativacao_falhou');
                    exit;
                }
            } catch (Exception $e) {
                header('Location: ../../view/pages/ong/meu-perfil.php?erro=inativacao_falhou');
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
