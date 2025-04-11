<?php 
    require_once __DIR__ . "\..\config\database.php";
    Class Projeto {
        private $tabela = 'cadprojeto';
        private $pdo; 

        public function __construct() {
            global $pdo;
            $this->pdo = $pdo;
        }

        function listar() {
            $query = "SELECT * FROM $this->tabela";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            return $stmt->fetchAll(); 
        }

        function buscarId($id) {
            $query = "SELECT * FROM $this->tabela WHERE codproj = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            return $stmt->fetch(); 
        }

        function criar($nome, $descricao, $preco, $categoria) {
            $query = "INSERT INTO $this->tabela (nome, descricao, preco, categoria_id)
                      VALUES (:nome, :descricao, :preco, :categoria)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header('Location: produtos.php?mensagem=sucesso');
            } else {
                header('Location: produtos.php?');
            }
        }
    }
?>