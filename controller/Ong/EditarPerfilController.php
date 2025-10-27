<?php
require_once __DIR__ . '/../../autoload.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class EditarPerfilController
{
    private $ongModel;
    private $bancoModel;

    public function __construct()
    {
        $this->ongModel = new OngModel();
        $this->bancoModel = new BancoModel();
    }

    public function buscarDados()
    {
        $perfil = $this->ongModel->buscarId($_SESSION['ong_id']);

        // Adiciona o caminho completo para a imagem
        $perfil['foto'] = $perfil['imagem_id']
            ? '../../../' . $this->ongModel->buscarCaminhoImagem($perfil['imagem_id'])
            : 'assets/images/global/image-placeholder.svg';

        $lista_banco = $this->bancoModel->listar();

        return [
            'perfil' => $perfil,
            'bancos' => $lista_banco
        ];
    }

    public function atualizarPerfil()
    {
        // 🔹 Se for para remover a foto da ONG
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remover_foto'])) {
            $ongId = $_SESSION['ong_id'];

            $imagemId = $this->ongModel->buscarImagemId($ongId);

            if ($imagemId) {
                $imagemModel = new ImagemModel();
                $imagemModel->deletarImagem($imagemId);
                $this->ongModel->removerImagemOng($ongId);
            }

            // Atualiza a sessão e imagem padrão
            $_SESSION['ong']['foto'] = 'assets/images/global/image-placeholder.svg';
            $_SESSION['mensagem_toast'] = ['sucesso', 'ONG atualizada com sucesso!'];

            header('Location: ../../view/pages/ong/home.php');
            exit;
        }

        // 🔹 Atualização normal do perfil
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['atualizar-ong'])) {
            $ongId = $_SESSION['ong_id'];

            $campos = [
                'nome',
                'cnpj',
                'telefone',
                'email',
                'cep',
                'rua',
                'numero',
                'bairro',
                'cidade',
                'estado',
                'banco',
                'agencia',
                'conta_numero',
                'tipo_conta',
                'descricao'
            ];

            $dados = ['ong_id' => $ongId];
            foreach ($campos as $campo) {
                if (isset($_POST[$campo]) && $_POST[$campo] !== '') {
                    $key = $campo === 'banco' ? 'banco_id' : $campo;
                    $dados[$key] = $_POST[$campo];
                }
            }

            $imagemAlterada = false;

            // --- Upload de imagem da ONG ---
            if (!empty($_FILES['foto_perfil']['name'])) {
                $pasta = __DIR__ . '/../../upload/images/ongs/';
                if (!is_dir($pasta))
                    mkdir($pasta, 0777, true);

                $novoNome = uniqid() . '-' . basename($_FILES['foto_perfil']['name']);
                $destino = $pasta . $novoNome;

                if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $destino)) {
                    $dados['imagem_id'] = $this->ongModel->salvarImagemOng($ongId, 'upload/images/ongs/' . $novoNome);
                    $_SESSION['ong']['foto'] = 'upload/images/ongs/' . $novoNome;
                    $imagemAlterada = true;
                } else {
                    // Caso falhe upload, mantém a imagem antiga
                    $dados['imagem_id'] = $this->ongModel->buscarImagemId($ongId);
                }
            } else {
                // Mantém a imagem atual caso nenhum arquivo seja enviado
                $dados['imagem_id'] = $this->ongModel->buscarImagemId($ongId);
            }

            try {
                $alterou = $this->ongModel->editar($dados);

                if ($alterou > 0 || $imagemAlterada) {
                    $_SESSION['mensagem_toast'] = ['sucesso', 'ONG atualizada com sucesso!'];
                } else {
                    $_SESSION['mensagem_toast'] = ['info', 'Nenhuma alteração feita!'];
                }

            } catch (PDOException $e) {
                $_SESSION['mensagem_toast'] = ['erro', 'Falha ao atualizar ONG!'];
            }

            header('Location: ../../view/pages/ong/home.php');
            exit;
        }
    }
}

// Instancia e processa requisição
$controller = new EditarPerfilController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->atualizarPerfil();
}
