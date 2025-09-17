g<?php
require_once __DIR__ . '../../autoload.php';

class ImagemModel
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    /**
     * Salva uma imagem no banco
     */
    public function salvarCaminhoImagem(string $caminho)
    {
        $sql = "INSERT INTO imagens (caminho, data_upload) VALUES (:caminho, NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':caminho', $caminho);
        $stmt->execute();

        return $this->pdo->lastInsertId(); // retorna o ID da imagem
    }

    /**
     * Faz a ligação entre uma imagem e uma notícia
     */
    public function vincularNaNoticia(int $idImagem, int $idNoticia)
    {
        $sql = "INSERT INTO imagens_noticias (noticia_id, imagem_id) 
                VALUES (:noticia_id, :imagem_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':noticia_id', $idNoticia);
        $stmt->bindValue(':imagem_id', $idImagem);
        return $stmt->execute();
    }

    /**
     * Pegar todas as imagens de uma notícia
     */
    public function listarPorNoticia(int $idNoticia)
    {
        $sql = "SELECT i.* 
                  FROM imagens i
                  INNER JOIN imagens_noticias inot ON inot.imagem_id = i.imagem_id
                 WHERE inot.noticia_id = :noticia_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':noticia_id', $idNoticia);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Deletar vínculos de imagens de uma notícia
     */
    public function deletarPorNoticia(int $idNoticia)
    {
        $sql = "DELETE FROM imagens_noticias WHERE noticia_id = :noticia_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':noticia_id', $idNoticia);
        return $stmt->execute();
    }
    public function salvarImagem(array $file): ?int
{
    // Verifica erros no upload
    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new Exception("Erro no upload da imagem. Código: " . $file['error']);
    }

    // Tipos permitidos
    $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!in_array($file['type'], $tiposPermitidos)) {
        throw new Exception("Tipo de arquivo não permitido.");
    }

    // Garante pasta de upload
    $pastaUpload = __DIR__ . "/../../uploads/";
    if (!is_dir($pastaUpload)) {
        mkdir($pastaUpload, 0777, true);
    }

    // Cria nome único para a imagem
    $extensao = pathinfo($file['name'], PATHINFO_EXTENSION);
    $nomeUnico = uniqid("img_", true) . "." . $extensao;
    $caminhoFinal = $pastaUpload . $nomeUnico;

    // Move a imagem
    if (!move_uploaded_file($file['tmp_name'], $caminhoFinal)) {
        throw new Exception("Falha ao salvar a imagem no servidor.");
    }

    // Caminho relativo (para salvar no banco e usar no HTML)
    $caminhoRelativo = "uploads/" . $nomeUnico;

    // Salva no banco e retorna o ID
    return $this->salvarCaminhoImagem($caminhoRelativo);
}

}
