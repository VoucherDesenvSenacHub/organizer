<?php 
    require_once __DIR__ . "\..\config\database.php";
    Class Projeto {
        private $tabela = 'projetos';
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

        function buscarNome($nome) {
            $query = "SELECT * FROM $this->tabela WHERE nome LIKE :nome";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':nome', "%{$nome}%", PDO::PARAM_STR);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            return $stmt->fetchAll();
        }

        function buscarValor($id) {
            $query = "SELECT SUM(valor) AS total FROM valprojeto WHERE codproj = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado['total'] ?? 0;
        } 

        function contarDoadores($id) {
            $query = "SELECT COUNT(*) AS total FROM valprojeto WHERE codproj = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado['total'] ?? 0;
        }
        

        function editar($id, $nome, $resumo, $sobre, $meta) {
            try {
                $query = "UPDATE $this->tabela
                          SET nome = :nome, resumo = :resumo, sobre = :sobre, meta = :meta
                          WHERE codproj = :id";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':resumo', $resumo);
                $stmt->bindParam(':sobre', $sobre);
                $stmt->bindParam(':meta', $meta);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
        
                if ($stmt->rowCount() > 0) {
                    header("Location: perfil-projeto.php?id=$id&msg=sucesso");
                } else {
                    header("Location: perfil-projeto.php?id=$id");
                }
                exit;
            } catch (PDOException $e) {
                echo "Erro no UPDATE: " . $e->getMessage();
                header("Location: perfil-projeto.php?id=$id&msg=erro");
                exit;
            }
        }        

        function criar($nome, $resumo, $sobre, $meta) {
            try {
                $query = "INSERT INTO $this->tabela (nome, resumo, sobre, meta)
                          VALUES (:nome, :resumo, :sobre, :meta)";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':resumo', $resumo);
                $stmt->bindParam(':sobre', $sobre);
                $stmt->bindParam(':meta', $meta);
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
        
        function doacao($codproj, $valor, $coddoador) {
            $query = 'INSERT INTO valprojeto (codproj, valor, coddoador)
                      VALUES (:projeto, :valor, :doador)';
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':projeto', $codproj);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':doador', $coddoador);
            $stmt->execute();
            return $stmt->rowCount();
        }
    }
?>