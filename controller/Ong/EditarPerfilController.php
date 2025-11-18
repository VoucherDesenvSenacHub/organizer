<?php
require_once __DIR__ . '/../../autoload.php';

require_once __DIR__ . '/../../session_config.php';

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
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $ongId = $_SESSION['ong_id'];

        // --- 1) Remover foto (só se valor vier como '1') ---
        $removerFlag = $_POST['remover_foto'] ?? '0';
        if ($removerFlag === '1') {
            $imagemId = $this->ongModel->buscarImagemId($ongId);

            if ($imagemId) {
                $this->imagemModel->deletarImagem((int)$imagemId);
                $this->ongModel->removerImagemOng($ongId);
            }

            // Atualiza a sessão e imagem padrão
            $_SESSION['ong']['foto'] = 'assets/images/global/image-placeholder.svg';
            $_SESSION['mensagem_toast'] = ['sucesso', 'Imagem removida com sucesso!'];

            header('Location: ../../view/pages/ong/home.php');
            exit;
        }

        // --- 2) Atualização normal do perfil ---
        if (!isset($_POST['atualizar-ong'])) {
            return;
        }

        // Carrega perfil atual para usar valores padrão quando algum campo ficar vazio
        $perfilAtual = $this->ongModel->buscarId($ongId);

        $campos = [
            'nome' => 'nome',
            'cnpj' => 'cnpj',
            'telefone' => 'telefone',
            'email' => 'email',
            'cep' => 'cep',
            'rua' => 'rua',
            'numero' => 'numero',
            'bairro' => 'bairro',
            'cidade' => 'cidade',
            'estado' => 'estado',
            'banco' => 'banco_id', // mapear name=banco -> banco_id
            'agencia' => 'agencia',
            'conta_numero' => 'conta_numero',
            'tipo_conta' => 'tipo_conta',
            'descricao' => 'descricao'
        ];

        // Garante que $dados contenha todas as chaves esperadas pelo OngModel::editar
        $dados = ['ong_id' => $ongId];
        foreach ($campos as $postName => $dbKey) {
            if (isset($_POST[$postName]) && $_POST[$postName] !== '') {
                $dados[$dbKey] = $_POST[$postName];
            } else {
                // pega do perfil atual (nome das colunas no DB deve bater)
                // se não existir no perfil atual, salva string vazia pra evitar undefined index
                $dados[$dbKey] = $perfilAtual[$dbKey] ?? '';
            }
        }

        $imagemAlterada = false;

        // --- Upload de imagem da ONG (se enviado) ---
        if (!empty($_FILES['foto_perfil']['name'])) {
            $pasta = __DIR__ . '/../../upload/images/ongs/';
            if (!is_dir($pasta)) {
                mkdir($pasta, 0777, true);
            }

            $novoNome = uniqid() . '-' . basename($_FILES['foto_perfil']['name']);
            $destino = $pasta . $novoNome;

            if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $destino)) {
                // salva caminho relativo no banco
                $caminhoRelativo = 'upload/images/ongs/' . $novoNome;
                $idImagem = $this->imagemModel->salvarCaminhoImagem($caminhoRelativo);
                $dados['imagem_id'] = $idImagem;

                // atualiza sessão com caminho relativo (ou com o que você preferir)
                $_SESSION['ong']['foto'] = $caminhoRelativo;
                $imagemAlterada = true;
            } else {
                // falhou upload -> manter imagem atual
                $dados['imagem_id'] = $this->ongModel->buscarImagemId($ongId);
            }
        } else {
            // nenhum arquivo enviado -> manter imagem atual
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
            // opcional: log do erro para debug
            error_log('Erro editar ONG: ' . $e->getMessage());
            $_SESSION['mensagem_toast'] = ['erro', 'Falha ao atualizar ONG!'];
        }

        header('Location: ../../view/pages/ong/home.php');
        exit;
    }
}

// Instancia e processa requisição
$controller = new EditarPerfilController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->atualizarPerfil();
}
