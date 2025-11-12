<?php
require_once __DIR__ . '/../model/ImagemModel.php';
require_once __DIR__ . '/../model/OngModel.php';

class UploadService
{
    private $imagemModel;

    private $ongModel;

    public function __construct()
    {
        $this->imagemModel = new ImagemModel();

        $this->ongModel = new OngModel();
    }

    /**
     * Upload genérico de imagens (ONG ou Projeto)
     * 
     * @param array  $files  - array $_FILES (ou $_FILES['foto_perfil'])
     * @param int    $id     - ID do projeto ou ONG
     * @param string $tipo   - 'projeto' | 'ong'
     * @param bool   $editar - se true, apaga as imagens antigas
     */
    function uploadImagens($files, $id, string $tipo = '', bool $editar = false)
    {
        if ($tipo !== 'projeto' && $tipo !== 'ong') {
            throw new InvalidArgumentException("Tipo inválido: $tipo");
        }

        // Ignora se não há imagens
        if (empty($files['name']) || (is_array($files['name']) && empty($files['name'][0]))) {
            return;
        }

        // Se for ONG e editar = true, deleta imagem antiga
        if ($editar && $tipo === 'ong') {
            $imagemAntiga = $this->ongModel->buscarImagemId($id);
            if ($imagemAntiga) {
                $this->imagemModel->deletarImagem((int) $imagemAntiga);
            }
        }

        // Se for Projeto e editar = true, deleta imagens antigas do projeto
        if ($editar && $tipo === 'projeto') {
            $this->imagemModel->deletarPorProjeto($id);
        }

        // Define pasta destino
        $pasta = __DIR__ . "/../upload/images/{$tipo}s/";
        if (!is_dir($pasta)) {
            mkdir($pasta, 0777, true);
        }

        $tamanhoMaximo = 20 * 1024 * 1024; // 20MB

        // Se for ONG (1 imagem)
        if ($tipo === 'ong' && !is_array($files['name'])) {
            if ($files['size'] > $tamanhoMaximo) {
                $_SESSION['mensagem_toast'] = ['erro', 'A imagem deve ter no máximo 20 MB.'];
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }

            $novoNome = uniqid() . '-' . basename($files['name']);
            $destino = $pasta . $novoNome;

            if (move_uploaded_file($files['tmp_name'], $destino)) {
                $caminhoRelativo = "upload/images/{$tipo}s/" . $novoNome;
                $idImagem = $this->imagemModel->salvarCaminhoImagem($caminhoRelativo);

                // vincula imagem à ONG
                $this->imagemModel->vincularNaOng($idImagem, $id);
                $_SESSION['ong']['foto'] = $caminhoRelativo;
            }

            return;
        }

        // Se for Projeto (múltiplas imagens)
        foreach ($files['name'] as $i => $nome) {
            if ($files['error'][$i] === UPLOAD_ERR_OK) {
                if ($files['size'][$i] > $tamanhoMaximo) {
                    $_SESSION['mensagem_toast'] = ['erro', "A imagem '{$nome}' ultrapassa 20 MB e não foi enviada."];
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                }

                $tmp = $files['tmp_name'][$i];
                $novoNome = uniqid() . '-' . basename($nome);
                $destino = $pasta . $novoNome;

                if (move_uploaded_file($tmp, $destino)) {
                    $idImagem = $this->imagemModel->salvarCaminhoImagem("upload/images/{$tipo}s/" . $novoNome);
                    $this->imagemModel->vincularNoProjeto($idImagem, $id);
                }
            }
        }
    }
}
