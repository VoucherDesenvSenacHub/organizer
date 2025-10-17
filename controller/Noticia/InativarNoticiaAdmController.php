<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../model/NoticiaModel.php';
session_start();

class InativarNoticiaAdmController
{
    private $noticiaModel;

    public function __construct()
    {
        $this->noticiaModel = new NoticiaModel();
    }

    public function inativarNoticia()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inativar-noticia'])) {
            try {
                $noticiaId = $_POST['noticia_id'];

                $resultado = $this->noticiaModel->inativarNoticia($noticiaId);

                if ($resultado) {
                    $_SESSION['mensagem_toast'] = ['sucesso', 'Notícia inativada com sucesso!'];
                    header('Location: ../../view/pages/adm/noticias.php');
                    exit;
                } else {
                    $_SESSION['mensagem_toast'] = ['erro', 'Falha ao inativar notícia!'];
                    header('Location: ../../view/pages/adm/noticias.php');
                    exit;
                }
            } catch (Exception $e) {
                $_SESSION['mensagem_toast'] = ['erro', 'Falha ao inativar notícia!'];
                header('Location: ../../view/pages/adm/noticias.php');
                exit;
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new InativarNoticiaAdmController();
    $controller->inativarNoticia();
}