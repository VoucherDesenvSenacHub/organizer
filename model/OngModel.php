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
        $query = "INSERT INTO ongs (
            nome, cnpj, responsavel_id,
            telefone, email,
            cep, rua, bairro, cidade,
            banco_id, agencia, conta, tipo_conta,
            descricao
        ) VALUES (
            :nome, :cnpj, :responsavel_id,
            :telefone, :email,
            :cep, :rua, :bairro, :cidade,
            :banco_id, :agencia, :conta, :tipo_conta,
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
        $stmt->bindParam(':conta', $dados['conta']);
        $stmt->bindParam(':tipo_conta', $dados['tipo_conta']);
        $stmt->bindParam(':descricao', $dados['descricao']);

        return $stmt->execute(); // true em caso de sucesso, false se falhar
    }


    function listar()
    {
        $query = "SELECT * FROM $this->tabela";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetchAll();
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
        $query = "SELECT 1 FROM $this->tabela WHERE responsavel_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id_responsavel, PDO::PARAM_INT);
        $stmt->execute();
        return (bool) $stmt->fetchColumn();
    }
}
