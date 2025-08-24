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

    function criarOng($dados)
    {
        $query = "INSERT INTO $this->tabela (
            nome, cnpj, responsavel_id,
            telefone, email,
            cep, rua, numero, bairro, cidade, estado,
            banco_id, agencia, conta_numero, tipo_conta,
            descricao
        ) VALUES (
            :nome, :cnpj, :responsavel_id,
            :telefone, :email,
            :cep, :rua, :numero, :bairro, :cidade, :estado,
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
        $stmt->bindParam(':numero', $dados['numero']);
        $stmt->bindParam(':bairro', $dados['bairro']);
        $stmt->bindParam(':cidade', $dados['cidade']);
        $stmt->bindParam(':estado', $dados['estado']);
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
                  email = :email, cep = :cep, rua = :rua, numero = :numero, bairro = :bairro, 
                  cidade = :cidade, estado = :estado, banco_id = :banco_id, agencia = :agencia,
                  conta_numero = :conta_numero, tipo_conta = :tipo_conta, descricao = :descricao
                  WHERE ong_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':cnpj', $dados['cnpj']);
        $stmt->bindParam(':telefone', $dados['telefone']);
        $stmt->bindParam(':email', $dados['email']);
        $stmt->bindParam(':cep', $dados['cep']);
        $stmt->bindParam(':rua', $dados['rua']);
        $stmt->bindParam(':numero', $dados['numero']);
        $stmt->bindParam(':bairro', $dados['bairro']);
        $stmt->bindParam(':cidade', $dados['cidade']);
        $stmt->bindParam(':estado', $dados['estado']);
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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function listarRecentes()
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
        ORDER BY data_cadastro DESC LIMIT 6
    ";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    function buscarId($id)
    {
        $query = "SELECT * FROM $this->tabela WHERE ong_id = :id";
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

    // Buscar os dados para a home
    function buscarDados($id)
    {
        $query = "SELECT 
                    (SELECT COUNT(*) FROM apoios_projeto a
                  INNER JOIN projetos p ON a.projeto_id = p.projeto_id 
                  WHERE p.ong_id = :id) AS qnt_apoiador,
                    (SELECT COUNT(*) FROM projetos p WHERE p.ong_id = :id) AS qnt_projeto,
                    (SELECT COUNT(*) FROM noticias n WHERE n.ong_id = :id) AS qnt_noticia,
                    (SELECT SUM(dp.valor) FROM doacao_projeto dp 
                  INNER JOIN projetos p ON dp.projeto_id = p.projeto_id 
                  WHERE p.ong_id = :id) AS qnt_doacoes;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    function favoritarOng($usuario_id, $ong_id)
    {
        // Verifica se já está favoritada
        $sql = "SELECT 1 FROM favoritos_ongs WHERE usuario_id = :id AND ong_id = :id_ong";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $usuario_id,
            ':id_ong' => $ong_id
        ]);

        if ($stmt->rowCount() > 0) {
            // Já favoritada → remover
            $sql = "DELETE FROM favoritos_ongs WHERE usuario_id = :id AND ong_id = :id_ong";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $usuario_id,
                ':id_ong' => $ong_id
            ]);
            return false; // desfavoritada
        } else {
            // Não favoritada → adicionar
            $sql = "INSERT INTO favoritos_ongs (usuario_id, ong_id) VALUES (:id, :id_ong)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $usuario_id,
                ':id_ong' => $ong_id
            ]);
            return true; // favoritada
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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    
    function ultimasAtividadesOng($IdOng)
    {
        $query = "SELECT * FROM vw_atividades_recentes_ong WHERE ong_id = :id ORDER BY data_registro DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $IdOng, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
}
