<?php
require_once __DIR__ . "/../config/database.php";
class ProjetoModel
{
    private $tabela = 'projetos';
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
        $this->pdo->exec("SET time_zone = '-04:00'");
    }

    function listarCardsProjetos(string $tipo = '', array $valor = [])
    {
        // Define limite e paginação
        $limit = $valor['limit'] ?? 8;
        $pagina = $valor['pagina'] ?? 1;
        $offset = ($pagina - 1) * $limit;
        // Inicializa variáveis para montar a query
        $params = [];
        $where = 'WHERE 1=1'; // Base para adicionar filtros
        $join = '';
        $order = '';
        // Monta a query conforme o tipo de busca
        switch ($tipo) {
            case 'pesquisa':
                $where .= " AND nome LIKE :nome";
                $params[':nome'] = "%{$valor['pesquisa']}%";
                if (!empty($valor['ong_id'])) {
                    $where .= " AND ong_id = :ong_id";
                    $params[':ong_id'] = $valor['ong_id'];
                }
                break;

            case 'ong':
                $where .= " AND ong_id = :ong_id";
                $params[':ong_id'] = $valor['ong_id'];
                break;

            case 'favoritos':
                $join = "JOIN favoritos_projetos f USING (projeto_id)";
                $where .= " AND usuario_id = :usuario_id";
                $order = "ORDER BY data_favoritado DESC";
                $params[':usuario_id'] = $valor['usuario_id'];
                break;

            case 'apoiados':
                $join = "JOIN apoios_projetos f USING (projeto_id)";
                $where .= " AND usuario_id = :usuario_id";
                $order = "ORDER BY data_apoio DESC";
                $params[':usuario_id'] = $valor['usuario_id'];
                break;

            case 'recentes':
                $join = "JOIN projetos p USING(projeto_id)";
                $order = "ORDER BY data_cadastro DESC";
                break;
        }
        // Filtro por categorias
        if (!empty($valor['categorias'])) {
            $placeholders = [];
            foreach ($valor['categorias'] as $i => $catId) {
                $key = ":cat{$i}";
                $placeholders[] = $key;
                $params[$key] = $catId;
            }
            $where .= " AND categoria_id IN (" . implode(',', $placeholders) . ")";
        }
        // MONTA A QUERY FINAL
        $query = "SELECT v.* FROM vw_card_projetos v {$join} {$where} {$order} LIMIT {$limit} OFFSET {$offset}";
        // Prepara e executa a query com os parâmetros
        $stmt = $this->pdo->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    function paginacaoProjetos(string $tipo = '', array $valor = [])
    {
        // Inicializa variáveis
        $params = [];
        $where = 'WHERE 1=1';
        $join = '';
        // Monta filtros conforme o tipo
        switch ($tipo) {
            case 'pesquisa':
                $where .= " AND nome LIKE :nome";
                $params[':nome'] = "%{$valor['pesquisa']}%";
                if (!empty($valor['ong_id'])) {
                    $where .= " AND ong_id = :ong_id";
                    $params[':ong_id'] = $valor['ong_id'];
                }
                break;

            case 'favoritos':
                $join = "JOIN favoritos_projetos f USING (projeto_id)";
                $where .= " AND usuario_id = :usuario_id";
                $params[':usuario_id'] = $valor['usuario_id'];
                break;

            case 'apoiados':
                $join = "JOIN apoios_projetos f USING (projeto_id)";
                $where .= " AND usuario_id = :usuario_id";
                $params[':usuario_id'] = $valor['usuario_id'];
                break;

            default:
                if (!empty($valor['ong_id'])) {
                    $where .= " AND ong_id = :ong_id";
                    $params[':ong_id'] = $valor['ong_id'];
                }
        }
        // Filtro por categorias
        if (!empty($valor['categorias']) && is_array($valor['categorias'])) {
            $placeholders = [];
            foreach ($valor['categorias'] as $i => $catId) {
                $key = ":cat{$i}";
                $placeholders[] = $key;
                $params[$key] = $catId;
            }
            $where .= " AND categoria_id IN (" . implode(',', $placeholders) . ")";
        }
        // Monta e executa a query
        $query = "SELECT COUNT(*) AS total FROM vw_card_projetos v {$join} {$where}";
        
        $stmt = $this->pdo->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        $stmt->execute();
        return $stmt->fetchColumn();
    }


    function buscarPerfilProjeto($IdProjeto)
    {
        $query = "SELECT p.projeto_id, p.nome, p.descricao, p.meta, p.categoria_id, p.data_cadastro,
        p.ong_id, o.nome AS nome_ong, i.caminho, 
        COALESCE(SUM(dp.valor), 0) AS valor_arrecadado,
        ROUND(COALESCE(SUM(dp.valor), 0) / p.meta * 100) AS barra
        FROM $this->tabela p
        INNER JOIN ongs o
            ON o.ong_id = p.ong_id
        LEFT JOIN imagens i 
            ON o.imagem_id = i.imagem_id
        LEFT JOIN doacoes_projetos dp 
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
        $query = "SELECT u.nome, SUM(dp.valor) as valor_doado, COUNT(dp.valor) as qtd_doacoes FROM doacoes_projetos dp
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
        $query = "SELECT u.nome, a.data_apoio from apoios_projetos a
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
        $query = "SELECT caminho FROM imagens JOIN imagens_projetos i USING(imagem_id) WHERE projeto_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $IdProjeto, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function realizarDoacaoProjeto($projeto_id, $usuario_id, $valor)
    {
        $query = 'INSERT INTO doacoes_projetos (projeto_id, usuario_id, valor)
                  VALUES (:projeto, :doador, :valor)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':projeto', $projeto_id);
        $stmt->bindParam(':doador', $usuario_id);
        $stmt->bindParam(':valor', $valor);
        $stmt->execute();
        return $stmt->rowCount();
    }





    public function editar($id, $nome, $descricao, $meta, $categoria_id)
    {
        try {
            $query = "UPDATE $this->tabela
                      SET nome = :nome, descricao = :descricao, meta = :meta, categoria_id = :categoria_id
                      WHERE projeto_id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':meta', $meta);
            $stmt->bindParam(':categoria_id', $categoria_id);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }


    function criar($nome, $descricao, $meta, $categoria_id, $ong_id)
    {
        try {
            $query = "INSERT INTO $this->tabela (nome, descricao, meta, categoria_id, ong_id)
                      VALUES (:nome, :descricao, :meta, :categoria_id, :ong_id)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':meta', $meta);
            $stmt->bindParam(':categoria_id', $categoria_id);
            $stmt->bindParam(':ong_id', $ong_id);
            if ($stmt->execute()) {
                return $this->pdo->lastInsertId();
            }
            return false;
        } catch (PDOException $e) {
            error_log("Erro ao inserir registro: " . $e->getMessage());
            return false;
        }
    }

    function buscarDoacao($id)
    {
        $query = "SELECT p.projeto_id, p.nome, d.valor, d.data_doacao,
            (SELECT i.caminho FROM imagens i JOIN imagens_projetos ip ON i.imagem_id = ip.imagem_id 
            WHERE ip.projeto_id = p.projeto_id ORDER BY i.data_upload ASC LIMIT 1) AS caminho
        FROM projetos p
            INNER JOIN doacoes_projetos d ON p.projeto_id = d.projeto_id
        WHERE d.usuario_id = :id
        ORDER BY d.data_doacao DESC";
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


    public function apoiarProjeto($usuario_id, $projeto_id)
    {
        $query = "INSERT IGNORE INTO apoios_projetos (usuario_id, projeto_id) VALUES (:usuario_id, :projeto_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(':projeto_id', $projeto_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function desapoiarProjeto($usuario_id, $projeto_id)
    {
        $query = "DELETE FROM apoios_projetos WHERE usuario_id = :usuario_id AND projeto_id = :projeto_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(':projeto_id', $projeto_id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function usuarioJaApoiouProjeto($usuario_id, $projeto_id)
    {
        $query = "SELECT 1 FROM apoios_projetos
                  WHERE usuario_id = :usuario_id AND projeto_id = :projeto_id 
                  LIMIT 1";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(':projeto_id', $projeto_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
}
