<?php
require_once __DIR__ . '/../model/ProjetoModel.php';
require_once __DIR__ . '/../model/ImagemModel.php';

class UploadService
{

    private $imagemModel;

    public function __construct()
    {
        $this->imagemModel = new ImagemModel();
    }

    /**
     * 
     * $files é uma lista de $_FILES
     * $editar quando e verdadeiro delata a img antiga.
     *      
     */
    function uploadImgProjeto($files, $idProjeto, $editar = false)
    {

        if (!empty($files['name'][0])) {

            if ($editar) {
                $this->imagemModel->deletarPorProjeto($idProjeto);
            }

            $pasta = __DIR__ . '/../upload/images/projetos/';
            if (!is_dir($pasta)) {
                mkdir($pasta, 0777, true);
            }

            $tamanhoMaximo = 20 * 1024 * 1024; // 🔹 20 MB em bytes

            foreach ($files['name'] as $i => $nome) {
                if ($files['error'][$i] === UPLOAD_ERR_OK) {

                    // ✅ Verifica tamanho
                    if ($files['size'][$i] > $tamanhoMaximo) {
                        $_SESSION['mensagem_toast'] = ['erro', "A imagem '{$nome}' ultrapassa 20 MB e não foi enviada."];
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        exit;
                    }

                    $tmp = $files['tmp_name'][$i];
                    $novoNome = uniqid() . '-' . basename($nome);
                    $destino = $pasta . $novoNome;

                    if (move_uploaded_file($tmp, $destino)) {
                        $idImagem = $this->imagemModel->salvarCaminhoImagem('upload/images/projetos/' . $novoNome);
                        $this->imagemModel->vincularNoProjeto($idImagem, $idProjeto);
                    }
                }
            }
        }
    }


}