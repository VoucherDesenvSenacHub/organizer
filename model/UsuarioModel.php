<?php
require_once __DIR__ . '/../config/database.php';

class Usuario
{
    private $tabela = 'usuarios';
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
            $query = "INSERT INTO $this->tabela (nome, cpf, data_nascimento, email, telefone, senha)
                          VALUES (:nome, :cpf, :data_nascimento, :email, :telefone, :senha)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':data_nascimento', $data);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':senha', $senhaHash);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header('Location: login.php?msg=cadsucesso');
            } else {
                header('Location: cadastro.php');
            }
            exit;
        } catch (PDOException $e) {
            header('Location: cadastro.php?cadastro=erro{$e}');
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
                $_SESSION['usuario_id'] = $conta['usuario_id'];
                $_SESSION['perfil_usuario'] = 'doador';

                header('Location: acesso.php');
                exit;
            }
        }

        // Login falhou (e-mail ou senha inválida)
        header('Location: login.php?msg=logerro');
        exit;
    }

    function buscar_perfil($id) {
        $query = "SELECT * FROM $this->tabela WHERE usuario_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetch();
    }

    function update($id, $nome, $telefone, $cpf, $data, $email) {
        try {
            $query = "UPDATE $this->tabela 
                      SET nome = :nome, telefone = :telefone, cpf = :cpf, data_nascimento = :data, email = :email
                      WHERE coddoador = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':data', $data);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    function updatesenha($id, $senha) {
        try {
            $hashSenha = password_hash($senha, PASSWORD_DEFAULT);
            $query = "UPDATE $this->tabela 
                      SET senha = :senha
                      WHERE coddoador = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':senha', $hashSenha);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    function calcularIdade($dataNascimento) {
        $dataNascimento = new DateTime($dataNascimento);
        $hoje = new DateTime();
        $idade = $hoje->diff($dataNascimento)->y;
        return $idade;
    }
}