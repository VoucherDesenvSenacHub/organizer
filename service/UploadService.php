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
        if (!in_array($tipo, ['projeto', 'ong', 'noticia', 'usuario'])) {
            throw new InvalidArgumentException("Tipo inválido: {$tipo}");
        }

        // Ignora se não há imagens
        if (empty($files['name']) || (is_array($files['name']) && empty($files['name'][0]))) {
            return;
        }

        // Define pasta destino
        $pasta = __DIR__ . "/../upload/images/{$tipo}s/";
        if (!is_dir($pasta)) {
            mkdir($pasta, 0777, true);
        }

        $tamanhoMaximo = 20 * 1024 * 1024; // 20MB

        // Se for ONG
        if ($tipo === 'ong') {
            // se editar = true, deleta imagem antiga
            if ($editar) {
                $imagemAntiga = $this->ongModel->buscarImagemId($id);
                if ($imagemAntiga) {
                    $this->imagemModel->deletarImagem((int) $imagemAntiga);
                }
            }

            // insere a imagem
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

        // Se for Projeto
        if ($tipo === 'projeto') {
            // se editar = true, deleta imagens antigas do projeto
            if ($editar) {
                $this->imagemModel->deletarPorProjeto($id);
            }

            // insere imagens
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

        // Se for Noricia
        if ($tipo === 'noticia'){
            if($editar){
                $this->imagemModel->deletarPorNoticia($id);
            }

            foreach ($_FILES['fotos']['name'] as $i => $nome) {
                if ($_FILES['fotos']['error'][$i] === UPLOAD_ERR_OK) {

                    // 🔹 Validação de tamanho
                    if ($_FILES['fotos']['size'][$i] > $tamanhoMaximo) {
                        $_SESSION['mensagem_toast'] = ['erro', "A imagem '{$nome}' ultrapassa 20 MB e não foi enviada."];
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        exit;
                    }

                    $tmp   = $_FILES['fotos']['tmp_name'][$i];
                    $novoNome = uniqid() . '-' . basename($nome);
                    $destino  = __DIR__ . '/../../upload/images/noticias/' . $novoNome;

                    if (move_uploaded_file($tmp, $destino)) {
                        $IdImagem = $this->imagemModel->salvarCaminhoImagem("upload/images/{$tipo}s/" . $novoNome);
                        $this->imagemModel->vincularNaNoticia($IdImagem, $id);
                    }
                }
            }
        }
    }
}