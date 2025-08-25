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

    function listarCardsProjetos(string $tipo = '', $valor = [])
    {
        $params = [];

        switch ($tipo) {
            // Buscar os Projetos pelo nome
            case 'pesquisa':
                $query = "SELECT * FROM vw_card_projetos WHERE nome LIKE :nome";
                if (!empty($valor['ong_id'])) {
                    $query .= " AND ong_id = :ong_id";
                    $params[':ong_id'] = $valor['ong_id'];
                }
                $params[':nome'] = "%{$valor['pesquisa']}%";
                break;
            // Buscar os Projetos de uma ONG
            case 'ong':
                $query = "SELECT * FROM vw_card_projetos v WHERE ong_id = :ong_id";
                $params[':ong_id'] = $valor;
                break;
            // Buscar os Projetos favoritos do Usúario
            case 'favoritos':
                $query = "SELECT v.*, f.usuario_id FROM vw_card_projetos v
                JOIN favoritos_projetos f USING (projeto_id)
                WHERE usuario_id = :usuario_id ORDER BY data_favoritado DESC";
                $params[':usuario_id'] = $valor;
                break;
            // Buscar os Projetos favoritos do Usúario
            case 'apoiados':
                $query = "SELECT v.*, f.usuario_id FROM vw_card_projetos v
                JOIN apoios_projetos f USING (projeto_id)
                WHERE usuario_id = :usuario_id ORDER BY data_apoio DESC";
                $params[':usuario_id'] = $valor;
                break;
            // Buscar os Projetos mais recentes
            case 'recentes':
                $limit = 4;
                $query = "SELECT v.*, p.data_cadastro FROM vw_card_projetos v
                JOIN projetos p USING(projeto_id)
                ORDER BY data_cadastro DESC LIMIT {$limit}";
                break;
            default:
                $query = "SELECT * FROM vw_card_projetos v";
        }

        $stmt = $this->pdo->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    function selectProjetos($where, $params, $order = '', $limit)
    {
        $query = "SELECT * FROM vw_card_projetos $where $order";
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
