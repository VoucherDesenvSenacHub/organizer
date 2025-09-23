<?php
require_once __DIR__ . "/../config/database.php";
class CategoriaModel
{
    private $tabela = 'categorias';
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    function buscarCategorias()
    {
        $query = "SELECT categoria_id, nome FROM $this->tabela ORDER BY nome";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
}
