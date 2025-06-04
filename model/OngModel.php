<?php
require_once __DIR__ . "\..\config\database.php";
class Ong
{
    private $tabela = 'ongs';
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    function listar()
    {
        $query = "SELECT * FROM $this->tabela";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetchAll();
    }

    function buscarId($id)
    {
        $query = "SELECT * FROM $this->tabela WHERE ong_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetch();
    }

    function buscarNome($nome)
    {
        $query = "SELECT * FROM $this->tabela WHERE nome LIKE :nome";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':nome', "%{$nome}%", PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetchAll();
    }
}
