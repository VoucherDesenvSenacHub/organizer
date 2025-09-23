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
            $query = "INSERT INTO imagens (caminho) VALUES (:caminho)";
            $stmt = $this->pdo->prepare($query);
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
         * Deletar vínculos de imagens de uma notícia
         */
        public function deletarPorNoticia(int $idNoticia)
        {
            $sql = "DELETE FROM imagens_noticias WHERE noticia_id = :noticia_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':noticia_id', $idNoticia);
            return $stmt->execute();
        }

        public function vincularNoProjeto(int $idImagem, int $idProjeto)
        {
            $sql = "INSERT INTO imagens_projetos (projeto_id, imagem_id) 
            VALUES (:projeto_id, :imagem_id)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':projeto_id', $idProjeto);
            $stmt->bindValue(':imagem_id', $idImagem);
            return $stmt->execute();
        }

        public function deletarPorProjeto(int $idProjeto)
        {
            $sql = "DELETE FROM imagens_projetos WHERE projeto_id = :projeto_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':projeto_id', $idProjeto);
            return $stmt->execute();
        }
    }
