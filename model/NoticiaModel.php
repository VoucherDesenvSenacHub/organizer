<?php
require_once __DIR__ . "/../config/database.php";
class NoticiaModel
{
    private $tabela = 'noticias';
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
        $this->pdo->exec("SET time_zone = '-04:00'");
    }

    function criar($titulo, $subtitulo, $texto, $subtexto, $id)
    {
        $query = "INSERT INTO $this->tabela (titulo, subtitulo, texto, subtexto, ong_id)
                          VALUES (:titulo, :subtitulo, :texto, :subtexto, :ong_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':subtitulo', $subtitulo);
        $stmt->bindParam(':texto', $texto);
        $stmt->bindParam(':subtexto', $subtexto);
        $stmt->bindParam(':ong_id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    function editar($id, $titulo, $subtitulo, $texto, $subtexto)
    {
        $query = "UPDATE $this->tabela
                          SET titulo = :titulo, subtitulo = :subtitulo, texto = :texto, subtexto = :subtexto
                          WHERE noticia_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':subtitulo', $subtitulo);
        $stmt->bindParam(':texto', $texto);
        $stmt->bindParam(':subtexto', $subtexto);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function listar($id = null)
    {
        if ($id) {
            $query = "SELECT * FROM $this->tabela WHERE ong_id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        } else {
            $query = "SELECT * FROM $this->tabela";
            $stmt = $this->pdo->prepare($query);
        }
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function listarRecentes($id)
    {
        $query = "SELECT n.noticia_id, n.titulo, n.data_cadastro FROM $this->tabela n WHERE n.ong_id = :id ORDER BY data_cadastro DESC LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetchAll();
    }

    function buscarId($id)
    {
        $query = "SELECT n.*, o.nome FROM $this->tabela n, ongs o WHERE noticia_id = :id AND n.ong_id = o.ong_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    function buscarNome($titulo, $ong_id = null)
    {
        if ($ong_id) {
            $query = "SELECT noticia_id, titulo, subtitulo, texto, subtexto, n.data_cadastro, nome,
                      (SELECT i.logo_url FROM imagens_noticia i WHERE i.noticia_id = n.noticia_id ORDER BY i.id ASC LIMIT 1) AS logo_url
                      FROM noticias n, ongs o
                      WHERE titulo LIKE :titulo AND n.ong_id = o.ong_id AND o.ong_id = :ong_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':titulo', "%{$titulo}%", PDO::PARAM_STR);
            $stmt->bindValue(':ong_id', $ong_id, PDO::PARAM_INT);
        } else {
            $query = "SELECT noticia_id, titulo, subtitulo, texto, subtexto, n.data_cadastro, nome,
                      (SELECT i.logo_url FROM imagens_noticia i WHERE i.noticia_id = n.noticia_id ORDER BY i.id ASC LIMIT 1) AS logo_url
                      FROM noticias n, ongs o
                      WHERE titulo LIKE :titulo AND n.ong_id = o.ong_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':titulo', "%{$titulo}%", PDO::PARAM_STR);
        }
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function listarCards($ong_id = null)
    {
        if ($ong_id) {
            $query = "SELECT n.noticia_id, n.titulo, n.subtitulo, n.texto, n.subtexto, n.data_cadastro, o.nome,
                         (SELECT i.logo_url 
                          FROM imagens_noticia i 
                          WHERE i.noticia_id = n.noticia_id 
                          ORDER BY i.id ASC 
                          LIMIT 1) AS logo_url
                  FROM noticias n
                  INNER JOIN ongs o ON n.ong_id = o.ong_id
                  WHERE o.ong_id = :ong_id
                  AND n.status = 'ATIVO'";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':ong_id', $ong_id, PDO::PARAM_INT);
        } else {
            $query = "SELECT n.noticia_id, n.titulo, n.subtitulo, n.texto, n.subtexto, n.data_cadastro, o.nome,
                         (SELECT i.logo_url 
                          FROM imagens_noticia i 
                          WHERE i.noticia_id = n.noticia_id 
                          ORDER BY i.id ASC 
                          LIMIT 1) AS logo_url
                  FROM noticias n
                  INNER JOIN ongs o ON n.ong_id = o.ong_id
                  WHERE n.status = 'ATIVO'";
            $stmt = $this->pdo->prepare($query);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function listarCardsInativos($ong_id = null)
    {
        if ($ong_id) {
            $query = "SELECT n.noticia_id, n.titulo, n.subtitulo, n.texto, n.subtexto, n.data_cadastro, o.nome,
                         (SELECT i.logo_url 
                          FROM imagens_noticia i 
                          WHERE i.noticia_id = n.noticia_id 
                          ORDER BY i.id ASC 
                          LIMIT 1) AS logo_url
                  FROM noticias n
                  INNER JOIN ongs o ON n.ong_id = o.ong_id
                  WHERE o.ong_id = :ong_id
                  AND n.status = 'INATIVO'";
            
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':ong_id', $ong_id, PDO::PARAM_INT);
        } else {
            $query = "SELECT n.noticia_id, n.titulo, n.subtitulo, n.texto, n.subtexto, n.data_cadastro, o.nome,
                         (SELECT i.logo_url 
                          FROM imagens_noticia i 
                          WHERE i.noticia_id = n.noticia_id 
                          ORDER BY i.id ASC 
                          LIMIT 1) AS logo_url
                  FROM noticias n
                  INNER JOIN ongs o ON n.ong_id = o.ong_id
                  WHERE n.status = 'INATIVO'";
            $stmt = $this->pdo->prepare($query);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    function buscarImagens($id)
    {
        $query = "SELECT logo_url FROM imagens_noticia WHERE noticia_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function ImagemSubtitulo($id)
    {
        $query = "SELECT logo_url FROM imagens_noticia i WHERE noticia_id = :id ORDER BY i.id DESC LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    function inativarNoticia($id)
    {
        $query = "UPDATE {$this->tabela} set status= 'INATIVO' WHERE noticia_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}
