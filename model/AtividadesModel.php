<?php
require_once __DIR__ . '/../config/database.php';

class Usuario
{
    private $tabela = 'atividades';
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    function registrarAtividade($usuario_id, $acao, $detalhes = '') {
        $query = "INSERT INTO $this->tabela (usuario_id, acao, detalhes) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$usuario_id, $acao, $detalhes]);

    }

    function pegarUltimasAtividades($usuario_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->tabela WHERE usuario_id = ? ORDER BY data DESC LIMIT 3");
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll();
    }
}