<?php
require_once __DIR__ . "/../config/database.php";
class FavoritarModel
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function favoritar($usuarioId, $tipo, $id)
    {
        // Define qual tabela e coluna usar
        if ($tipo === 'projeto') {
            $tabela = 'favoritos_projetos';
            $coluna = 'projeto_id';
        } elseif ($tipo === 'ong') {
            $tabela = 'favoritos_ongs';
            $coluna = 'ong_id';
        } else {
            throw new Exception("Tipo inválido: $tipo");
        }

        // Verifica se já está favoritado
        $query = "SELECT 1 FROM {$tabela} WHERE usuario_id = :id AND {$coluna} = :valor";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':id' => $usuarioId,
            ':valor' => $id
        ]);

        if ($stmt->rowCount() > 0) {
            // Já favoritado → desfavorita
            $query = "DELETE FROM {$tabela} WHERE usuario_id = :id AND {$coluna} = :valor";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                ':id' => $usuarioId,
                ':valor' => $id
            ]);
            return false; // desfavoritado
        } else {
            // Não favoritado → adiciona
            $query = "INSERT INTO {$tabela} (usuario_id, {$coluna}) VALUES (:id, :valor)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                ':id' => $usuarioId,
                ':valor' => $id
            ]);
            return true; // favoritado
        }
    }
}