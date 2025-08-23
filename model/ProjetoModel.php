<?php
require_once __DIR__ . "/../config/database.php";
class Projeto
{
    private $tabela = 'projetos';
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
        $this->pdo->exec("SET time_zone = '-04:00'");
    }

    function listarCardsProjetos(string $tipo = '', $valor = null, $limit = null)
    {
        $where = '';
        $params = [];
        $order = '';

        switch ($tipo) {
            case 'ong':
                $where = "WHERE p.ong_id = :ong_id";
                $params[':ong_id'] = $valor;
                break;
            case 'favoritos':
                $where = "INNER JOIN favoritos_projetos f USING(projeto_id) 
                      WHERE f.usuario_id = :usuario_id";
                $params[':usuario_id'] = $valor;
                break;
            case 'pesquisa':
                $where = "WHERE p.nome LIKE :nome";
                $params[':nome'] = "%{$valor}%";
                break;
            case 'recentes':
                $order = "ORDER BY p.data_cadastro DESC";
                $limit = 4;
                break;
        }

        return $this->selectProjetos($where, $params, $order, $limit);
    }

    function selectProjetos($where, $params, $order = '', $limit)
    {
        $query = "SELECT p.projeto_id, p.nome, p.descricao, i.caminho, ROUND(COALESCE(SUM(dp.valor), 0) / p.meta * 100) AS barra
        FROM $this->tabela p
        LEFT JOIN imagens i
            ON i.imagem_id = (SELECT ip.imagem_id FROM imagens_projetos ip WHERE ip.projeto_id = p.projeto_id ORDER BY ip.id ASC LIMIT 1)
        LEFT JOIN doacao_projeto dp 
            ON dp.projeto_id = p.projeto_id
        $where
        GROUP BY p.projeto_id, p.nome, p.descricao, i.caminho
        $order";
        if ($limit) {
            $query .= " LIMIT :limit";
        }

        $stmt = $this->pdo->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        // Condição para buscar os projetos da ONG
        if ($limit) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        }
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function buscarPerfilProjeto($IdProjeto)
    {
        $query = "SELECT p.projeto_id, p.nome, p.meta, p.descricao, p.data_cadastro,
        p.ong_id, o.nome AS nome_ong, o.logo_url as logo_ong, 
        COALESCE(SUM(dp.valor), 0) AS valor_arrecadado,
        ROUND(COALESCE(SUM(dp.valor), 0) / p.meta * 100) AS barra
        FROM $this->tabela p
        INNER JOIN ongs o
            ON o.ong_id = p.ong_id
        LEFT JOIN doacao_projeto dp 
            ON dp.projeto_id = p.projeto_id
        WHERE p.projeto_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $IdProjeto, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    function buscarDoadoresProjeto($IdProjeto)
    {
        $query = "SELECT u.nome, SUM(dp.valor) as valor_doado, COUNT(dp.valor) as qtd_doacoes FROM doacao_projeto dp
                  INNER JOIN projetos p USING (projeto_id)
                  INNER JOIN usuarios u USING (usuario_id)
                  WHERE p.projeto_id = :id
                  GROUP BY nome
                  ORDER BY 2 DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $IdProjeto, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function buscarApoiadoresProjeto($IdProjeto)
    {
        $query = "SELECT u.nome, a.data_apoio from apoios_projeto a
                  INNER JOIN usuarios u USING(usuario_id)
                  WHERE projeto_id = :id
                  ORDER BY data_apoio DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $IdProjeto, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function buscarImagensProjeto($IdProjeto)
    {
        $query = "SELECT logo_url FROM imagens_projeto WHERE projeto_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $IdProjeto, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function realizarDoacaoProjeto($projeto_id, $usuario_id, $valor)
    {
        $query = 'INSERT INTO doacao_projeto (projeto_id, usuario_id, valor)
                  VALUES (:projeto, :doador, :valor)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':projeto', $projeto_id);
        $stmt->bindParam(':doador', $usuario_id);
        $stmt->bindParam(':valor', $valor);
        $stmt->execute();
        return $stmt->rowCount();
    }



    function buscarNome($nome, $ong_id = null)
    {
        if ($ong_id) {
            $query = "SELECT p.projeto_id, p.nome, p.descricao, p.meta, 
                      (SELECT i.logo_url FROM imagens_projeto i WHERE i.projeto_id = p.projeto_id ORDER BY i.id ASC LIMIT 1) AS logo_url
                      FROM $this->tabela p
                      WHERE nome LIKE :nome AND ong_id = :ong_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':nome', "%{$nome}%", PDO::PARAM_STR);
            $stmt->bindValue(':ong_id', $ong_id, PDO::PARAM_INT);
        } else {
            $query = "SELECT p.projeto_id, p.nome, p.descricao, p.meta,
                      (SELECT i.logo_url FROM imagens_projeto i WHERE i.projeto_id = p.projeto_id ORDER BY i.id ASC LIMIT 1) AS logo_url
                      FROM $this->tabela p
                      WHERE nome LIKE :nome";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':nome', "%{$nome}%", PDO::PARAM_STR);
        }
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }





    public function editar($id, $nome, $descricao, $meta)
    {
        try {
            $query = "UPDATE $this->tabela
                      SET nome = :nome, descricao = :descricao, meta = :meta
                      WHERE projeto_id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':meta', $meta);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }


    function criar($nome, $descricao, $meta, $ong_id)
    {
        try {
            $query = "INSERT INTO $this->tabela (nome, descricao, meta, ong_id)
                      VALUES (:nome, :descricao, :meta, :ong_id)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':meta', $meta);
            $stmt->bindParam(':ong_id', $ong_id);
            return $stmt->execute();
        } catch (PDOException $e) {
            // error_log("Erro ao inserir registro: " . $e->getMessage());
            return false;
        }
    }

    function buscarDoacao($id)
    {
        $query = "SELECT p.projeto_id, p.nome, valor, data_doacao,
                  (SELECT logo_url FROM imagens_projeto i WHERE i.projeto_id = p.projeto_id ORDER BY data_upload ASC LIMIT 1) as logo_url
                  FROM $this->tabela p, doacao_projeto d
                  WHERE p.projeto_id = d.projeto_id
                  AND d.usuario_id = :id
                  ORDER BY data_doacao DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }


    function favoritarProjeto($usuario_id, $projeto_id)
    {
        // Verifica se já está favoritado
        $sql = "SELECT 1 FROM favoritos_projetos WHERE usuario_id = :id AND projeto_id = :projeto_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $usuario_id,
            ':projeto_id' => $projeto_id
        ]);

        if ($stmt->rowCount() > 0) {
            // Já favoritado → desfavorita
            $sql = "DELETE FROM favoritos_projetos WHERE usuario_id = :id AND projeto_id = :projeto_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $usuario_id,
                ':projeto_id' => $projeto_id
            ]);
            return false; // desfavoritado
        } else {
            // Não favoritado → adiciona
            $sql = "INSERT INTO favoritos_projetos (usuario_id, projeto_id) VALUES (:id, :projeto_id)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $usuario_id,
                ':projeto_id' => $projeto_id
            ]);
            return true; // favoritado
        }
    }


    function listarFavoritos($usuario_id)
    {
        $sql = "SELECT projeto_id FROM favoritos_projetos WHERE usuario_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    function listarFavoritosRecentes($usuario_id)
    {
        $sql = "SELECT f.projeto_id, f.data_favoritado, (SELECT p.nome FROM projetos p WHERE p.projeto_id = f.projeto_id ORDER BY f.projeto_id ASC LIMIT 1) AS nome_projeto FROM favoritos_projetos f 
        WHERE f.usuario_id = :id 
        ORDER BY f.data_favoritado DESC LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    function favoritosUsuario($usuario_id)
    {
        $query = "SELECT p.projeto_id, p.nome, p.descricao, p.meta,
        (SELECT i.logo_url FROM imagens_projeto i WHERE i.projeto_id = p.projeto_id ORDER BY i.id ASC LIMIT 1) AS logo_url
        FROM $this->tabela p
        INNER JOIN favoritos_projetos f USING(projeto_id) 
        WHERE f.usuario_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }


    public function apoiarProjeto($usuario_id, $projeto_id)
    {
        $query = "INSERT IGNORE INTO apoios_projeto (usuario_id, projeto_id) VALUES (:usuario_id, :projeto_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(':projeto_id', $projeto_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function listarApoiadoresRecentes($usuario_id)
    {
        $sql = "SELECT a.projeto_id, a.data_apoio, (SELECT p.nome FROM projetos p WHERE p.projeto_id = a.projeto_id ORDER BY a.projeto_id ASC LIMIT 1) AS nome_projeto FROM apoios_projeto a
        WHERE a.usuario_id = :id 
        ORDER BY a.data_apoio DESC LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function desapoiarProjeto($usuario_id, $projeto_id)
    {
        $query = "DELETE FROM apoios_projeto WHERE usuario_id = :usuario_id AND projeto_id = :projeto_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(':projeto_id', $projeto_id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    function buscarCardsApoiados($id)
    {
        $query = "SELECT p.projeto_id, p.nome, p.descricao, p.meta, 
                  (SELECT i.logo_url FROM imagens_projeto i WHERE i.projeto_id = p.projeto_id ORDER BY i.id ASC LIMIT 1) AS logo_url
                  FROM projetos p 
                  INNER JOIN apoios_projeto a USING (projeto_id)
                  WHERE usuario_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function usuarioJaApoiouProjeto($usuario_id, $projeto_id)
    {
        $query = "SELECT 1 FROM apoios_projeto 
                  WHERE usuario_id = :usuario_id AND projeto_id = :projeto_id 
                  LIMIT 1";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(':projeto_id', $projeto_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
}
