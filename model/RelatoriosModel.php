<?php
require_once __DIR__ . "/../config/database.php";

class RelatoriosModel {
    private $tabela = 'ongs';
    private $pdo;
    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
        $this->pdo->exec("SET time_zone = '-04:00'");
    }

    function contarProjetos($id) {
        $query = "SELECT p.projeto_id, p.nome, p.status 
                      FROM projetos p
                      WHERE ong_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $dados = array();
        if($stmt->rowCount() === 0){
            $dados = [["Não existe projeto cadastrado", 0]];
        }else{
            foreach($stmt as $p){
                $query = "SELECT u.nome, a.data_apoio from apoios_projetos a
                INNER JOIN usuarios u USING(usuario_id)
                WHERE projeto_id = :id
                ORDER BY data_apoio DESC";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':id', $p["projeto_id"], PDO::PARAM_INT);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $qtdVoluntarios = $stmt->rowCount();
                if($p["status"] === "ATIVO"){
                    $titulos = [$p["nome"], $qtdVoluntarios];
                    array_push($dados, $titulos);
                }
            }
            if(sizeof($dados) === 0){
                $dados = [["Não existem projetos ativos nessa ONG", 0]];
            }
        }
        return $dados;
    }

    function listarProjetos($id) {
        $query = "SELECT p.projeto_id, p.nome AS nome_projeto, p.status, p.ong_id, u.usuario_id,
                    u.nome AS nome_usuario, u.telefone FROM projetos p
                INNER JOIN apoios_projetos ap ON p.projeto_id = ap.projeto_id
                INNER JOIN usuarios u ON ap.usuario_id = u.usuario_id
                WHERE p.status = 'ATIVO' AND p.ong_id = :ong_id
                ORDER BY p.projeto_id, u.nome";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':ong_id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0){
            return $stmt->fetchAll();
        }else {
            return "Não há projetos ativos cadastrados para essa ONG";
        }
    }

    function buscarUsuarios(){
        $query = "SELECT * FROM usuarios";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    function listarDadosTabela($id){
        $query = "SELECT * FROM doacoes_projetos";
        $stmt = $this->pdo->prepare($query);
        // $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();

    }

    // Função para somar as arrecadações mês a mês

    function painelDeArrecadacao($id, $month, $year) {
        $query = "SELECT SUM(dp.valor) AS total_doado FROM
            projetos p JOIN doacoes_projetos dp ON p.projeto_id = dp.projeto_id
            WHERE p.ong_id = :id
            AND MONTH(dp.data_doacao) = :month
            AND YEAR(dp.data_doacao) = :year
            AND p.status = 'ATIVO' ;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();            
    }
    
    function listarTabelas(){
        $query = "SELECT * from usuarios";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
}