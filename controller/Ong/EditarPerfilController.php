<?php
require_once __DIR__ . '/../../autoload.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class EditarPerfilController
{
    private $ongModel;
    private $bancoModel;
    private $imagemModel;

    public function __construct()
    {
        $this->ongModel = new OngModel();
        $this->bancoModel = new BancoModel();
        $this->imagemModel = new ImagemModel();
    }

    public function buscarDados()
    {
        $perfil = $this->ongModel->buscarId($_SESSION['ong_id']);
        $lista_banco = $this->bancoModel->listar();

        return [
            'perfil' => $perfil,
            'bancos' => $lista_banco
        ];
    }

    public function atualizarPerfil()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['atualizar-ong'])) {

            // Sempre garanto o ID da ONG
            $dados = [
                'ong_id' => $_SESSION['ong_id']
            ];

            // Se vier mais campos além da foto, adiciona no $dados
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

            foreach ($campos as $campo) {
                if (isset($_POST[$campo]) && $_POST[$campo] !== '') {
                    // só adiciona se existir no POST
                    $key = $campo === 'banco' ? 'banco_id' : $campo;
                    $dados[$key] = $_POST[$campo];
                }
            }

            // --- upload de imagem da ONG ---
            if (!empty($_FILES['foto_perfil']['name'])) {
                $pasta = __DIR__ . '/../../upload/images/ongs/';

                if (!is_dir($pasta)) {
                    mkdir($pasta, 0777, true);
                }

                $tmp = $_FILES['foto_perfil']['tmp_name'];
                $nomeOriginal = basename($_FILES['foto_perfil']['name']);
                $novoNome = uniqid() . '-' . $nomeOriginal;
                $destino = $pasta . $novoNome;

                if (move_uploaded_file($tmp, $destino)) {
                    // salvar imagem no banco
                    $idImagem = $this->imagemModel->salvarCaminhoImagem('upload/images/ongs/' . $novoNome);
                    $dados['imagem_id'] = $idImagem;

                    // atualizar sessão
                    $_SESSION['ong']['foto'] = 'upload/images/ongs/' . $novoNome;
                }
            }

            try {
                if (isset($dados['imagem_id'])) {
                    $update = $this->ongModel->atualizarImagem($dados['ong_id'], $dados['imagem_id']);
                } else {
                    $update = $this->ongModel->editar($dados);
                }

                if ($update > 0) {
                    $_SESSION['mensagem_toast'] = ['sucesso', 'ONG atualizada com Sucesso!'];
                } else {
                    $_SESSION['mensagem_toast'] = ['info', 'Nenhuma alteração feita!'];
                }
            } catch (PDOException $e) {
                // $_SESSION['erro'] = $e->getMessage();
                $_SESSION['mensagem_toast'] = ['erro', 'Falha ao atualizar ONG!'];
            }

            header('Location: ../../view/pages/ong/home.php');
            exit;
        }
    }
}

// Instanciar o controller e processar a requisição
$controller = new EditarPerfilController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->atualizarPerfil();
}
