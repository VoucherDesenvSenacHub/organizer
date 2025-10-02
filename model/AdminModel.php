<?php
require_once __DIR__ . "/../config/database.php";

class AdminModel
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    // Buscar quantas ongs, projetos e usuarios tem no sistema
    function RelatorioHome()
    {
        $query = "SELECT
                     (SELECT COUNT(*) FROM ongs) AS qnt_ongs,
                     (SELECT COUNT(*) FROM projetos) AS qnt_projetos,
                     (SELECT COUNT(*) FROM usuarios u) AS qnt_usuarios;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    function buscarOngs()
    {
        $query = "SELECT ong_id, nome, 
        (SELECT COUNT(*) FROM projetos p WHERE p.ong_id = o.ong_id) AS total_projetos,
        (SELECT COUNT(*) FROM apoios_projetos ap JOIN projetos ps ON ps.projeto_id = ap.projeto_id WHERE ps.ong_id = o.ong_id) AS total_apoios
        FROM ongs o 
        ORDER BY total_projetos DESC
        LIMIT 4";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function buscarProjetos()
    {
        $query = "SELECT projeto_id, nome, 
        (SELECT SUM(valor) FROM doacoes_projetos dp WHERE dp.projeto_id = p.projeto_id) AS valor_arrecadado,
        (SELECT COUNT(*) FROM apoios_projetos ap WHERE ap.projeto_id = p.projeto_id) AS total_apoios
        FROM projetos p 
        ORDER BY valor_arrecadado DESC
        LIMIT 4";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function buscarDoadores()
    {
        $query = "SELECT usuario_id, nome, SUM(dp.valor) AS valor_doado
        FROM usuarios u 
        JOIN doacoes_projetos dp USING(usuario_id)
        GROUP BY u.usuario_id, u.nome
        ORDER BY valor_doado DESC
        LIMIT 4";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    function buscarNoticias()
    {
        $query = "SELECT noticia_id, titulo, data_cadastro FROM noticias n LIMIT 4";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    // Buscar parcerias aprovadas para exibição pública
    function ListarParceriasAprovadas()
    {
        $query = "SELECT parceria_id, nome, email, telefone, cnpj, descricao, 
                     DATE_FORMAT(data_envio, '%d/%m/%Y') as data_aprovacao
                     FROM parcerias 
                     WHERE status = 'APROVADA' 
                     ORDER BY data_envio DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Novo: Listar Parcerias Aceitas com paginação
    function listarParceriasAceitas($parametros)
    {
        $limite = 8;
        $offset = ($parametros['pagina'] - 1) * $limite;

        $query = "SELECT parceria_id, nome, email, telefone, cnpj, descricao,
                     DATE_FORMAT(data_envio, '%d/%m/%Y') as criadoEm
                     FROM parcerias 
                     WHERE status = 'APROVADA'
                     ORDER BY data_envio DESC
                     LIMIT :limite OFFSET :offset";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':limite', $limite, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Novo: Contar o total de parcerias aceitas
    function contarParceriasAceitas()
    {
        $query = "SELECT COUNT(*) FROM parcerias WHERE status = 'APROVADA'";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }


    // Buscar contadores para os cards que tem na home adm
    function ContadoresSolicitacoes()
    {
        $query = "SELECT
                     (SELECT COUNT(*) FROM parcerias WHERE status = 'PENDENTE') AS empresas,
                     (SELECT COUNT(*) FROM ongs WHERE status = 'PENDENTE') AS ongs;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetch();
    }

    // Buscar lista de solicitações de Empresas (parcerias)
    function ListarSolicitacoesEmpresas($parametros)
    {
        $limite = 8;
        $offset = ($parametros['pagina'] - 1) * $limite;

        $query = "SELECT parceria_id, nome, email, telefone, cnpj, mensagem, 
                     DATE_FORMAT(data_envio, '%d/%m/%Y') as criadoEm
                     FROM parcerias 
                     WHERE status = 'PENDENTE' 
                     ORDER BY data_envio DESC
                     LIMIT :limite OFFSET :offset";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':limite', $limite, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Novo: Contar o total de parcerias pendentes
    function contarSolicitacoes()
    {
        $query = "SELECT COUNT(*) FROM parcerias WHERE status = 'PENDENTE'";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    // Buscar lista de solicitações de ONGs
    function ListarSolicitacoesOngs()
    {
        $query = "SELECT o.ong_id, o.nome, u.nome as responsavel, o.descricao as mensagem,
                     DATE_FORMAT(o.data_cadastro, '%d/%m/%Y') as criadoEm
                     FROM ongs o
                     INNER JOIN usuarios u ON o.responsavel_id = u.usuario_id
                     WHERE o.status = 'PENDENTE' 
                     ORDER BY o.data_cadastro DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Inserir nova solicitação de parceria
    function CriarSolicitacaoParceria($dados)
    {
        try {
            $query = "INSERT INTO parcerias (nome, cnpj, email, telefone, mensagem, status) 
                         VALUES (?, ?, ?, ?, ?, 'PENDENTE')";
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute([
                $dados['nome'],
                $dados['cnpj'],
                $dados['email'],
                $dados['telefone'],
                $dados['mensagem']
            ]);
        } catch (Exception $e) {
            error_log("Erro em CriarSolicitacaoParceria: " . $e->getMessage());
            return false;
        }
    }

    // Aprovar/Recusar solicitação
    function ProcessarSolicitacao($tipo, $id, $acao)
    {
        try {
            switch ($tipo) {
                case 'empresas':
                    $status = $acao === 'approve' ? 'APROVADA' : 'RECUSADA';
                    $query = "UPDATE parcerias SET status = ? WHERE parceria_id = ? AND status = 'PENDENTE'";
                    break;
                case 'ongs':
                    $status = $acao === 'approve' ? 'ATIVO' : 'INATIVO';
                    $query = "UPDATE ongs SET status = ? WHERE ong_id = ? AND status = 'PENDENTE'";
                    break;
                default:
                    return false;
            }

            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$status, $id]);
            return $stmt->rowCount() > 0;
        } catch (Exception $e) {
            return false;
        }
    }
}