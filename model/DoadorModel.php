<?php
require_once __DIR__ . "/../config/database.php";

class DoadorModel
{
    // private $tabela = 'usuarios';
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    // Buscar as últimas atividades do Doador
    function ultimasAtividadesDoador($IdUsuario)
    {
        $query = "SELECT * FROM vw_atividades_recentes_doador WHERE usuario_id = :id ORDER BY data_registro DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $IdUsuario, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    // Buscar dados para o Dashboard
    function RelatorioHome($id)
    {
        $query = "SELECT sum(valor) as qnt_doacoes
                  FROM doacoes_projetos dp
                  WHERE usuario_id = :id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }
}
