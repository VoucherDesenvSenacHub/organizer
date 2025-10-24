<?php
require_once __DIR__ . "/../config/database.php";
class AdminModel
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    // Buscar quantas ongs, projetos e usuarios tem no sistema
    function RelatorioHome()
    {
        $query = "SELECT
                  (SELECT COUNT(*) FROM ongs) AS qnt_ongs,
                  (SELECT COUNT(*) FROM projetos) AS qnt_projetos,
                  (SELECT COUNT(*) FROM usuarios u) AS qnt_usuarios;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetch();
    }
}
