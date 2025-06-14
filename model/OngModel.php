<?php
require_once __DIR__ . "\..\config\database.php";
class Ong
{
    private $tabela = 'ongs';
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    function criar($dados)
    {
        $query = "INSERT INTO $this->tabela (
            nome, cnpj, responsavel_id,
            telefone, email,
            cep, rua, bairro, cidade,
            banco_id, agencia, conta_numero, tipo_conta,
            descricao
        ) VALUES (
            :nome, :cnpj, :responsavel_id,
            :telefone, :email,
            :cep, :rua, :bairro, :cidade,
            :banco_id, :agencia, :conta_numero, :tipo_conta,
            :descricao
        )";

        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':cnpj', $dados['cnpj']);
        $stmt->bindParam(':responsavel_id', $dados['responsavel_id'], PDO::PARAM_INT);
        $stmt->bindParam(':telefone', $dados['telefone']);
        $stmt->bindParam(':email', $dados['email']);
        $stmt->bindParam(':cep', $dados['cep']);
        $stmt->bindParam(':rua', $dados['rua']);
        $stmt->bindParam(':bairro', $dados['bairro']);
        $stmt->bindParam(':cidade', $dados['cidade']);
        $stmt->bindParam(':banco_id', $dados['banco_id'], PDO::PARAM_INT);
        $stmt->bindParam(':agencia', $dados['agencia']);
        $stmt->bindParam(':conta_numero', $dados['conta']);
        $stmt->bindParam(':tipo_conta', $dados['tipo_conta']);
        $stmt->bindParam(':descricao', $dados['descricao']);

        if ($stmt->execute()) {
            return $this->pdo->lastInsertId();
        }

        return false;
    }

    function editar($dados)
    {
        $query = "UPDATE $this->tabela
                  SET nome = :nome, cnpj = :cnpj, telefone = :telefone, 
                  email = :email, cep = :cep, rua = :rua, bairro = :bairro, 
                  cidade = :cidade, banco_id = :banco_id, agencia = :agencia,
                  conta_numero = :conta_numero, tipo_conta = :tipo_conta, descricao = :descricao
                  WHERE ong_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':cnpj', $dados['cnpj']);
        $stmt->bindParam(':telefone', $dados['telefone']);
        $stmt->bindParam(':email', $dados['email']);
        $stmt->bindParam(':cep', $dados['cep']);
        $stmt->bindParam(':rua', $dados['rua']);
        $stmt->bindParam(':bairro', $dados['bairro']);
        $stmt->bindParam(':cidade', $dados['cidade']);
        $stmt->bindParam(':banco_id', $dados['banco_id'], PDO::PARAM_INT);
        $stmt->bindParam(':agencia', $dados['agencia']);
        $stmt->bindParam(':conta_numero', $dados['conta_numero']);
        $stmt->bindParam(':tipo_conta', $dados['tipo_conta']);
        $stmt->bindParam(':descricao', $dados['descricao']);
        $stmt->bindParam(':id', $dados['ong_id'], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }


    function listarCards()
    {
        $query = "
        SELECT
            o.ong_id,
            o.nome,
            o.descricao,
            (SELECT COUNT(*) FROM projetos p WHERE p.ong_id = o.ong_id) AS total_projetos,
            (SELECT COUNT(*) FROM doacao_projeto dp
                JOIN projetos p ON dp.projeto_id = p.projeto_id
                WHERE p.ong_id = o.ong_id) AS total_doacoes
        FROM $this->tabela o
    ";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }


    function buscarId($id)
    {
        $query = "SELECT * FROM $this->tabela WHERE ong_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetch();
    }

    function buscarNome($nome)
    {
        $query = "SELECT * FROM $this->tabela WHERE nome LIKE :nome";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':nome', "%{$nome}%", PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetchAll();
    }

    // Verificar se o usúario tem uma ONG!
    function verificarExistenciaOng($id_responsavel)
    {
        $query = "SELECT ong_id FROM $this->tabela WHERE responsavel_id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id_responsavel, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
