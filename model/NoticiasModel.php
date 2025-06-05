<?php 
    require_once __DIR__ . "\..\config\database.php";
    Class Noticia {
        private $tabela = 'cadnoticias';
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
            $query = "SELECT * FROM $this->tabela WHERE codnot = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            return $stmt->fetch(); 
        }

        function buscarNome($titulo) {
            $query = "SELECT * FROM $this->tabela WHERE titulo LIKE :titulo";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':titulo', "%{$titulo}%", PDO::PARAM_STR);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            return $stmt->fetchAll();
        }
        

        function editar($id, $titulo, $subtitulo, $texto, $subtexto) {
            try {
                $query = "UPDATE $this->tabela
                          SET titulo = :titulo, subtitulo = :subtitulo, texto = :texto, subtexto = :subtexto
                          WHERE codproj = :id";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':titulo', $titulo);
                $stmt->bindParam(':subtitulo', $subtitulo);
                $stmt->bindParam(':texto', $texto);
                $stmt->bindParam(':subtexto', $subtexto);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
        
                if ($stmt->rowCount() > 0) {
                    header("Location: noticias-logon.php?id=$id&msg=sucesso");
                } else {
                    header("Location: noticias-logon.php?id=$id");
                }
                exit;
            } catch (PDOException $e) {
                echo "Erro no UPDATE: " . $e->getMessage();
                header("Location: noticias-logon.php?id=$id&msg=erro");
                exit;
            }
        }        

        function criar($titulo, $subtitulo, $texto, $subtexto) {
            try {
                $query = "INSERT INTO $this->tabela (titulo, subtitulo, texto, subtexto)
                          VALUES (:titulo, :subtitulo, :texto, :subtexto)";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':titulo', $titulo);
                $stmt->bindParam(':subtitulo', $subtitulo);
                $stmt->bindParam(':texto', $texto);
                $stmt->bindParam(':subtexto', $subtexto);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    header('Location: noticias.php?msg=sucesso');
                } else {
                    header('Location: noticias.php');
                }
                exit;
            } catch (PDOException $e) {
                header('Location: noticias.php?msg=erro');
                exit;
            }
        }        
    }
?>