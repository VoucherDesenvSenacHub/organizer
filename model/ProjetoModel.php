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

    function listar($id = null)
    {
        if ($id) {
            $query = "SELECT p.projeto_id, p.nome, p.descricao, p.meta, 
                      (SELECT i.logo_url FROM imagens_projeto i WHERE i.projeto_id = p.projeto_id ORDER BY i.id ASC LIMIT 1) AS logo_url
                      FROM $this->tabela p
                      WHERE ong_id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        } else {
            $query = "SELECT p.projeto_id, p.nome, p.descricao, p.meta,
                      (SELECT i.logo_url FROM imagens_projeto i WHERE i.projeto_id = p.projeto_id ORDER BY i.id ASC LIMIT 1) AS logo_url
                      FROM $this->tabela p";
            $stmt = $this->pdo->prepare($query);
        }

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetchAll();
    }


    function buscarId($id)
    {
        $query = "SELECT * FROM $this->tabela WHERE projeto_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetch();
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
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetchAll();
    }


    function buscarValor($id)
    {
        $query = "SELECT SUM(valor) AS total FROM doacao_projeto WHERE projeto_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'] ?? 0;
    }

    function contarDoadores($id)
    {
        $query = "SELECT COUNT(*) AS total FROM doacao_projeto WHERE projeto_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'] ?? 0;
    }

    function buscarDoadores($id)
    {
        $query = "SELECT u.nome, SUM(dp.valor) as valor_doado FROM doacao_projeto dp
                  INNER JOIN projetos p USING (projeto_id)
                  INNER JOIN usuarios u USING (usuario_id)
                  WHERE p.projeto_id = :id
                  GROUP BY nome
                  ORDER BY 2 DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetchAll();
    }

    function buscarApoiadores($id)
    {
        $query = "SELECT u.nome, a.data_apoio from apoios_projeto a
                  INNER JOIN usuarios u USING(usuario_id)
                  WHERE projeto_id = :id
                  ORDER BY data_apoio DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetchAll();
    }


    function editar($id, $nome, $descricao, $meta)
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
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                header("Location: perfil.php?id=$id&msg=sucesso");
            } else {
                header("Location: perfil.php?id=$id");
            }
            exit;
        } catch (PDOException $e) {
            // echo "Erro no UPDATE: " . $e->getMessage();
            header("Location: perfil.php?id=$id&msg=erro");
            exit;
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
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header('Location: projetos.php?msg=sucesso');
            } else {
                header('Location: projetos.php');
            }
            exit;
        } catch (PDOException $e) {
            header('Location: projetos.php?msg=erro');
            exit;
        }
    }

    function doacao($projeto_id, $usuario_id, $valor)
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

    function buscarDoacao($id)
    {
        $query = "SELECT p.nome, valor, data_doacao
                  FROM $this->tabela p, doacao_projeto d
                  WHERE p.projeto_id = d.projeto_id
                  AND d.usuario_id = :id
                  ORDER BY 3 DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetchAll();
    }


    function favoritarProjeto($projeto_id)
    {
        $usuario_id = $_SESSION['usuario_id'];

        // Verifica se já está favoritada
        $sql = "SELECT * FROM favoritos_projetos WHERE usuario_id = :id AND projeto_id = :projeto_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(':projeto_id', $projeto_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Já favoritada → remover
            $sql = "DELETE FROM favoritos_projetos WHERE usuario_id = :id AND projeto_id = :projeto_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
            $stmt->bindParam(':projeto_id', $projeto_id, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            // Não favoritada → adicionar
            $sql = "INSERT INTO favoritos_projetos (usuario_id, projeto_id) VALUES (:id, :projeto_id)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
            $stmt->bindParam(':projeto_id', $projeto_id, PDO::PARAM_INT);
            $stmt->execute();
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
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetchAll();
    }

    function buscarImagens($id)
    {
        $query = "SELECT logo_url FROM imagens_projeto WHERE projeto_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
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
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
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
