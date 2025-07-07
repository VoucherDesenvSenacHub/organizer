<?php
require_once __DIR__ . "/../config/database.php";
class Ong
{
    private $tabela = 'ongs';
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
        $this->pdo->exec("SET time_zone = '-04:00'");
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
            o.logo_url,
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

    function buscarPerfil($id)
    {
        $query = "
            SELECT o.ong_id, o.nome, o.data_cadastro, o.descricao, o.logo_url,
            (SELECT COUNT(*) FROM projetos p WHERE p.ong_id = o.ong_id) AS total_projetos,
            (SELECT COUNT(*) FROM doacao_projeto dp JOIN projetos p ON dp.projeto_id = p.projeto_id WHERE p.ong_id = o.ong_id) AS total_doacoes,
            (SELECT COUNT(*) FROM apoios_projeto JOIN projetos USING(projeto_id) WHERE ong_id = :id) AS total_apoiadores,
            (SELECT COALESCE(SUM(dp.valor), 0) FROM doacao_projeto dp JOIN projetos p ON dp.projeto_id = p.projeto_id WHERE p.ong_id = o.ong_id) AS total_arrecadado
            FROM $this->tabela o 
            WHERE o.ong_id = :id
        ";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetch();
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

    // Buscar os dados para a home
    function buscarDados($id)
    {
        $query = "SELECT 
                    (SELECT COUNT(*) FROM projetos p WHERE p.ong_id = :id) AS qnt_projeto,
                    (SELECT COUNT(*) FROM noticias n WHERE n.ong_id = :id) AS qnt_noticia,
                    (SELECT SUM(dp.valor) FROM doacao_projeto dp 
                  INNER JOIN projetos p ON dp.projeto_id = p.projeto_id 
                  WHERE p.ong_id = :id) AS qnt_doacoes;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetch();
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


    function favoritarOng($ong_id)
    {
        $usuario_id = $_SESSION['usuario_id'];

        // Verifica se já está favoritada
        $sql = "SELECT * FROM favoritos_ongs WHERE usuario_id = :id AND ong_id = :id_ong";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(':id_ong', $ong_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Já favoritada → remover
            $sql = "DELETE FROM favoritos_ongs WHERE usuario_id = :id AND ong_id = :id_ong";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
            $stmt->bindParam(':id_ong', $ong_id, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            // Não favoritada → adicionar
            $sql = "INSERT INTO favoritos_ongs (usuario_id, ong_id) VALUES (:id, :id_ong)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
            $stmt->bindParam(':id_ong', $ong_id, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    function listarFavoritas($usuario_id)
    {
        $sql = "SELECT ong_id FROM favoritos_ongs WHERE usuario_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    function favoritosUsuario($usuario_id)
    {
        $query = "SELECT
            o.ong_id,
            o.nome,
            o.descricao,
            o.logo_url,
            (SELECT COUNT(*) FROM projetos p WHERE p.ong_id = o.ong_id) AS total_projetos,
            (SELECT COUNT(*) FROM doacao_projeto dp
                JOIN projetos p ON dp.projeto_id = p.projeto_id
                WHERE p.ong_id = o.ong_id) AS total_doacoes
        FROM $this->tabela o
        INNER JOIN favoritos_ongs f USING(ong_id)
        WHERE f.usuario_id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }


    function buscarDoadores($id)
    {
        $query = "SELECT u.nome, SUM(dp.valor) as valor_doado FROM doacao_projeto dp
                  INNER JOIN projetos p USING (projeto_id)
                  INNER JOIN usuarios u USING (usuario_id)
                  WHERE p.ong_id = :id
                  GROUP BY nome
                  ORDER BY 2 DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetchAll();
    }
}
