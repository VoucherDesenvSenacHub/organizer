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
    
    public function editarOng($id, $nome, $cnpj, $telefone, $email, $cep, $rua, $bairro, $cidade, $agencia, $conta, $tipo_conta, $descricao, $fk_responsavel, $fk_banco)
    {
        $query = "UPDATE $this->tabela SET 
                nome = :nome,
                cnpj = :cnpj,
                telefone = :telefone,
                email = :email,
                cep = :cep,
                rua = :rua,
                bairro = :bairro,
                cidade = :cidade,
                agencia = :agencia,
                conta = :conta,
                tipo_conta = :tipo_conta,
                descricao = :descricao,
                fk_responsavel = :fk_responsavel,
                fk_banco = :fk_banco
              WHERE ong_id = :id";

        $stmt = $this->pdo->prepare($query);    

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cnpj', $cnpj);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':agencia', $agencia);
        $stmt->bindParam(':conta', $conta);
        $stmt->bindParam(':tipo_conta', $tipo_conta);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':fk_responsavel', $fk_responsavel);
        $stmt->bindParam(':fk_banco', $fk_banco);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
      

}