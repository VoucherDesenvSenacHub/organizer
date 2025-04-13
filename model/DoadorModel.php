<?php
require_once __DIR__ . '/../config/database.php';

class Doador
{
    private $tabela = 'caddoador';
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    function cadastro($nome, $telefone, $cpf, $data, $email, $senha)
    {
        try {
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $query = "INSERT INTO $this->tabela (nome, telefone, cpf, data_nascimento, email, senha)
                          VALUES (:nome, :telefone, :cpf, :data_nascimento, :email, :senha)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':data_nascimento', $data);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senhaHash);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header('Location: login.php?msg=cadsucesso');
            } else {
                header('Location: cadastro.php');
            }
            exit;
        } catch (PDOException $e) {
            header('Location: cadastro.php?cadastro=erro');
            exit;
        }
    }

    function login($email, $senha)
    {
        $query = "SELECT * FROM $this->tabela WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $conta = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($senha, $conta['senha'])) {
                // Iniciar sessão e guardar dados do doador
                session_start();
                $_SESSION['doador_id'] = $conta['coddoador'];
                $_SESSION['doador_nome'] = $conta['nome'];

                header('Location: home.php');
                exit;
            }
        }

        // Login falhou (e-mail ou senha inválida)
        header('Location: login.php?msg=logerro');
        exit;
    }


}
?>