<?php
require_once __DIR__ . '/../../autoload.php';

require_once __DIR__ . '/../../session_config.php';

class InativarOngController
{
    private $ongModel;

    public function __construct()
    {
        $this->ongModel = new OngModel();
    }

    public function inativarOng()
    {
        // Verifica se veio um POST válido
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['inativar-ong'])) {
            return;
        }

        try {
            // Determina o ID da ONG
            if (!empty($_POST['ong_id'])) {
                $ongId = $_POST['ong_id'];
            } elseif (!empty($_SESSION['ong_id'])) {
                $ongId = $_SESSION['ong_id'];
            } else {
                $_SESSION['mensagem_toast'] = ['erro', 'ID da ONG não encontrado!'];
                header('Location: ../../view/pages/ong/conta.php');
                exit;
            }

            // Inativa
            $resultado = $this->ongModel->inativar($ongId);

            if ($resultado) {

                // Se for ADMIN
                if (!empty($_SESSION['perfil_usuario']) && $_SESSION['perfil_usuario'] === 'adm') {
                    $_SESSION['mensagem_toast'] = ['sucesso', 'ONG inativada com sucesso!'];
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

            } else {
                $_SESSION['mensagem_toast'] = ['erro', 'Falha ao inativar ONG!'];

                if (!empty($_SESSION['perfil_usuario']) && $_SESSION['perfil_usuario'] === 'adm') {
                    header('Location: ../../view/pages/adm/ongs.php');
                } else {
                    header('Location: ../../view/pages/ong/conta.php');
                }
                exit;
            }

        } catch (Exception $e) {

            $_SESSION['mensagem_toast'] = ['erro', 'Erro inesperado ao inativar ONG!'];

            if (!empty($_SESSION['perfil_usuario']) && $_SESSION['perfil_usuario'] === 'adm') {
                header('Location: ../../view/pages/adm/ongs.php');
            } else {
                header('Location: ../../view/pages/ong/conta.php');
            }
            exit;
        }
    }
}

// Executa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new InativarOngController();
    $controller->inativarOng();
}
