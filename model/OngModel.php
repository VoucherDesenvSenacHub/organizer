<?php
require_once __DIR__ . "/../config/database.php";
class OngModel
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
          conta_numero = :conta_numero, tipo_conta = :tipo_conta, descricao = :descricao";

    if (isset($dados['imagem_id'])) {
        $query .= ", imagem_id = :imagem_id";
    }

    $query .= " WHERE ong_id = :id";

    $stmt = $this->pdo->prepare($query);

    // Bind dos parâmetros obrigatórios
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

    // Bind do imagem_id, se existir
    if (isset($dados['imagem_id'])) {
        $stmt->bindParam(':imagem_id', $dados['imagem_id'], PDO::PARAM_INT);
    }

    $stmt->execute();
    return $stmt->rowCount();
}
    public function atualizarImagem($ongId, $imagemId)
{
    $sql = "UPDATE $this->tabela SET imagem_id = :imagem_id WHERE ong_id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':imagem_id', $imagemId, PDO::PARAM_INT);
    $stmt->bindParam(':id', $ongId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}



    function listarCardsOngs(array $filtros = [])
    {
        $limit  = $filtros['limit'] ?? 6;
        $pagina = $filtros['pagina'] ?? 1;
        $offset = ($pagina - 1) * $limit;

        $params = [];
        $where  = 'WHERE 1=1';
        $join   = '';
        $order  = '';

        // Filtro por pesquisa
        if (!empty($filtros['pesquisa'])) {
            $where .= " AND nome LIKE :nome";
            $params[':nome'] = "%{$filtros['pesquisa']}%";
        }
        // Filtro por ordem
        if (!empty($filtros['ordem'])) {
            $order = match ($filtros['ordem']) {
                'novas' => "ORDER BY data_cadastro DESC",
                'antigas' => "ORDER BY data_cadastro ASC",
                default  => ''
            };
        }
        // Filtro por número de projetos
        if (!empty($filtros['projetos'])) {
            $where .= match ($filtros['projetos']) {
                '5'      => " AND total_projetos <= 5",
                '10'     => " AND total_projetos <= 10",
                'mais10' => " AND total_projetos > 10",
                default  => ""
            };
        }
        // Filtro por número de doações
        if (!empty($filtros['doacoes'])) {
            $where .= match ($filtros['doacoes']) {
                '10'     => " AND total_doacoes <= 10",
                '20'     => " AND total_doacoes <= 20",
                'mais20' => " AND total_doacoes > 20",
                default  => ""
            };
        }
        // Favoritas
        if (!empty(!empty($filtros['usuario_id']) && $filtros['favoritas'])) {
            $join  = "JOIN favoritos_ongs f USING (ong_id)";
            $where .= " AND usuario_id = :usuario_id";
            $order  = "ORDER BY data_favoritado DESC";
            $params[':usuario_id'] = $filtros['usuario_id'];
        }
        // Recentes
        if (!empty($filtros['recentes'])) {
            $order = "ORDER BY data_cadastro DESC";
        }
        // Query final
        $query = "SELECT v.* FROM vw_card_ongs v {$join} {$where} {$order} LIMIT {$limit} OFFSET {$offset}";

        $stmt  = $this->pdo->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function paginacaoOngs(array $filtros = [])
    {
        $params = [];
        $where  = 'WHERE 1=1';
        $join   = '';

        // Filtro por pesquisa
        if (!empty($filtros['pesquisa'])) {
            $where .= " AND nome LIKE :nome";
            $params[':nome'] = "%{$filtros['pesquisa']}%";
        }
        // Ongs favoritas
        if (!empty($filtros['usuario_id']) && !empty($filtros['favoritas'])) {
            $join  = "JOIN favoritos_ongs f USING (ong_id)";
            $where .= " AND usuario_id = :usuario_id";
            $params[':usuario_id'] = $filtros['usuario_id'];
        }
        // Filtro por número de projetos
        if (!empty($filtros['projetos'])) {
            $where .= match ($filtros['projetos']) {
                '5'      => " AND total_projetos <= 5",
                '10'     => " AND total_projetos <= 10",
                'mais10' => " AND total_projetos > 10",
                default  => ""
            };
        }
        // Filtro por número de doações
        if (!empty($filtros['doacoes'])) {
            $where .= match ($filtros['doacoes']) {
                '10'     => " AND total_doacoes <= 10",
                '20'     => " AND total_doacoes <= 20",
                'mais20' => " AND total_doacoes > 20",
                default  => ""
            };
        }
        // Query final
        $query = "SELECT COUNT(*) AS total FROM vw_card_ongs v {$join} {$where}";

        $stmt  = $this->pdo->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }

    function buscarPerfilOng($id)
    {
        $query = "
            SELECT o.ong_id, o.nome, o.data_cadastro, o.descricao,
            (SELECT caminho FROM imagens i WHERE i.imagem_id = o.imagem_id) AS caminho,
            (SELECT COUNT(*) FROM projetos p WHERE p.ong_id = o.ong_id) AS total_projetos,
            (SELECT COUNT(*) FROM doacoes_projetos dp JOIN projetos p ON dp.projeto_id = p.projeto_id WHERE p.ong_id = o.ong_id) AS total_doacoes,
            (SELECT COUNT(*) FROM apoios_projetos JOIN projetos USING(projeto_id) WHERE ong_id = :id) AS total_apoiadores,
            (SELECT COALESCE(SUM(dp.valor), 0) FROM doacoes_projetos dp JOIN projetos p ON dp.projeto_id = p.projeto_id WHERE p.ong_id = o.ong_id) AS total_arrecadado
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

    // Buscar os dados para a home
    function dashboardOng($IdOng)
    {
        $query = "SELECT  o.nome AS nome,
        (SELECT SUM(dp.valor) 
            FROM doacoes_projetos dp INNER JOIN projetos p ON dp.projeto_id = p.projeto_id WHERE p.ong_id = o.ong_id) AS total_doacoes,
        (SELECT COUNT(*) 
            FROM projetos p WHERE p.ong_id = o.ong_id) AS total_projetos,
        (SELECT COUNT(*) 
            FROM apoios_projetos ap JOIN projetos p ON ap.projeto_id = p.projeto_id WHERE p.ong_id = o.ong_id) AS total_apoios,
        (SELECT COUNT(*) 
            FROM noticias n WHERE n.ong_id = o.ong_id) AS total_noticias FROM ongs o WHERE o.ong_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $IdOng, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    function listarFavoritas($usuario_id)
    {
        $sql = "SELECT ong_id FROM favoritos_ongs WHERE usuario_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }



    function buscarDoadores($id)
    {
        $query = "SELECT u.nome, SUM(dp.valor) as valor_doado FROM doacoes_projetos dp
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

    function inativar($id)
    {
        $query = "UPDATE $this->tabela SET status = 'INATIVO' WHERE ong_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
