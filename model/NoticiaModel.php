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
        try {
            $query = "INSERT INTO $this->tabela (titulo, subtitulo, texto, subtexto, ong_id)
                      VALUES (:titulo, :subtitulo, :texto, :subtexto, :ong_id)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':subtitulo', $subtitulo);
            $stmt->bindParam(':texto', $texto);
            $stmt->bindParam(':subtexto', $subtexto);
            $stmt->bindParam(':ong_id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    function editar($id, $titulo, $subtitulo, $texto, $subtexto)
    {
        try {
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
        } catch (PDOException $e) {
            return false;
        }
    }

    function buscarPerfilNoticia($IdNoticia)
    {
        $query = "SELECT n.noticia_id, n.titulo, n.subtitulo, n.texto, n.subtexto, 
                        n.data_cadastro, n.status, 
                        o.ong_id, o.nome
                FROM {$this->tabela} n
                INNER JOIN ongs o ON n.ong_id = o.ong_id
                WHERE n.noticia_id = :id
                LIMIT 1";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id', $IdNoticia, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function listarCardsNoticias(string $tipo = '', $valor = [], $limit = null)
    {
        $params = [];

        switch ($tipo) {
            // Buscar as Notícias pelo título
            case 'pesquisa':
                $query = "SELECT * FROM vw_card_noticias WHERE status = 'ATIVO' AND titulo LIKE :titulo";
                if (!empty($valor['ong_id'])) {
                    $query .= " AND ong_id = :ong_id";
                    $params[':ong_id'] = $valor['ong_id'];
                }
                $params[':titulo'] = "%{$valor['pesquisa']}%";
                break;
            // Buscar as Notícias de uma ONG
            case 'ong':
                $query = "SELECT * FROM vw_card_noticias v WHERE status = 'ATIVO' AND ong_id = :ong_id";
                $params[':ong_id'] = $valor;
                break;
            default:
                $query = "SELECT * FROM vw_card_noticias v";
        }

        $stmt = $this->pdo->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
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


    function buscarImagensNoticia($IdNoticia)
    {
        $query = "SELECT caminho FROM imagens JOIN imagens_noticias i USING(imagem_id) WHERE noticia_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $IdNoticia, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
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
