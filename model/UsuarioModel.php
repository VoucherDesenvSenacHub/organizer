<?php
require_once __DIR__ . "/../config/database.php";

class Usuario
{
    private $tabela = 'usuarios';
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
        $this->pdo->exec("SET time_zone = '-04:00'");
    }

    function login($email)
    {
        $query = "SELECT * FROM $this->tabela WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Verificar se o usuário tem uma ONG!
    function buscarOngUsuario($usuarioId)
    {
        $query = "SELECT ong_id FROM ongs WHERE responsavel_id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $usuarioId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    function cadastro($dados)
    {
        try {
            $senhaHash = password_hash($dados['senha'], PASSWORD_DEFAULT);

            $query = "INSERT INTO $this->tabela (nome, cpf, data_nascimento, email, telefone, senha)
                  VALUES (:nome, :cpf, :data_nascimento, :email, :telefone, :senha)";

            $stmt = $this->pdo->prepare($query);

            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':cpf', $dados['cpf']);
            $stmt->bindParam(':data_nascimento', $dados['data_nascimento']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':telefone', $dados['telefone']);
            $stmt->bindParam(':senha', $senhaHash);

            return $stmt->execute();
        } catch (PDOException $e) {
            return false; // qualquer erro retorna false
        }
    }

    function primeiroAcesso($usuarioId, $escolha)
    {
        $query = "UPDATE $this->tabela SET $escolha = 1 WHERE usuario_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $usuarioId, PDO::PARAM_INT);
        return $stmt->execute();
    }


    // Listagem para o ADM
    function listar()
    {
        $query = "SELECT * FROM $this->tabela";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function buscar_perfil($id)
    {
        $query = "SELECT * FROM $this->tabela WHERE usuario_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    function buscarNome($nome)
    {
        $query = "SELECT * FROM $this->tabela WHERE nome LIKE :nome";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':nome', "%{$nome}%", PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function update($id, $nome, $telefone, $cpf, $data, $email)
    {
        try {
            $query = "UPDATE $this->tabela 
                      SET nome = :nome, telefone = :telefone, cpf = :cpf, data_nascimento = :data, email = :email
                      WHERE usuario_id = :id";
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

    function updatesenha($id, $senha)
    {
        try {
            $hashSenha = password_hash($senha, PASSWORD_DEFAULT);
            $query = "UPDATE $this->tabela 
                      SET senha = :senha
                      WHERE usuario_id = :id";
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

    function calcularIdade($dataNascimento)
    {
        $dataNascimento = new DateTime($dataNascimento);
        $hoje = new DateTime();
        $idade = $hoje->diff($dataNascimento)->y;
        return $idade;
    }

    // Relatorios para a home do doador
    function RelatorioHome($id)
    {
        $query = "SELECT sum(valor) as qnt_doacoes
                  FROM doacao_projeto dp
                  WHERE usuario_id = :id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }
}
