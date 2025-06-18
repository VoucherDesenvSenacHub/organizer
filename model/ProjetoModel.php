<?php
require_once __DIR__ . "\..\config\database.php";
class Projeto
{
    private $tabela = 'projetos';
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
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
            $query = "SELECT * FROM $this->tabela WHERE nome LIKE :nome AND ong_id = :ong_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':nome', "%{$nome}%", PDO::PARAM_STR);
            $stmt->bindValue(':ong_id', $ong_id, PDO::PARAM_INT);
        } else {
            $query = "SELECT * FROM $this->tabela WHERE nome LIKE :nome";
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
}
