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
            if ($stmt->execute()) {
                return $this->pdo->lastInsertId();
            }
            return false;
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
            return $stmt->execute(); // true ou false
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

    function listarCardsNoticias(string $tipo = '', array $valor = [])
    {
        $limit = $valor['limit'] ?? 6;
        $pagina = $valor['pagina'] ?? 1;
        $offset = ($pagina - 1) * $limit;

        $params = [];
        $where = "WHERE status = 'ATIVO'";
        $join = '';
        $order = '';

        // Filtro por pesquisa
        if ($tipo === 'pesquisa' && !empty($valor['pesquisa'])) {
            $where .= " AND titulo LIKE :titulo";
            $params[':titulo'] = "%{$valor['pesquisa']}%";
        }

        // Filtro por ordem
        if (!empty($valor['ordem'])) {
            if ($valor['ordem'] === 'novas') {
                $order = "ORDER BY data_cadastro DESC";
            } elseif ($valor['ordem'] === 'antigas') {
                $order = "ORDER BY data_cadastro ASC";
            }
        }

        // Filtro por ONG específica
        if (!empty($valor['ong_id'])) {
            $where .= " AND ong_id = :ong_id";
            $params[':ong_id'] = $valor['ong_id'];
        }

        // Query final
        $query = "SELECT v.* FROM vw_card_noticias v {$join} {$where} {$order} LIMIT {$limit} OFFSET {$offset}";

        $stmt = $this->pdo->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    function paginacaoNoticias(string $tipo = '', array $valor = [])
    {
        $params = [];
        $where = "WHERE status = 'ATIVO'";
        $join = '';

        // Filtro por pesquisa
        if ($tipo === 'pesquisa' && !empty($valor['pesquisa'])) {
            $where .= " AND titulo LIKE :titulo";
            $params[':titulo'] = "%{$valor['pesquisa']}%";
        }

        // Filtro por ONG específica
        if (!empty($valor['ong_id'])) {
            $where .= " AND ong_id = :ong_id";
            $params[':ong_id'] = $valor['ong_id'];
        }

        $query = "SELECT COUNT(*) AS total FROM vw_card_noticias v {$join} {$where}";
        $stmt = $this->pdo->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        $stmt->execute();
        return (int) $stmt->fetchColumn();
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
