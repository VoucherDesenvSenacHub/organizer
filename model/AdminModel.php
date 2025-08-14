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

    // Buscar contadores para os cards que tem na home adm
    function ContadoresSolicitacoes()
    {
        $query = "SELECT
                  (SELECT COUNT(*) FROM parcerias WHERE status = 'pendente') AS empresas,
                  (SELECT COUNT(*) FROM ongs WHERE status = 'pendente') AS ongs,
                  (SELECT COUNT(*) FROM projetos WHERE status = 'inativar') AS inativar;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetch();
    }

    // Buscar lista de solicitações de cada
    function ListarSolicitacoesEmpresas()
    {
        $query = "SELECT id, nome, email as contato, descricao as mensagem, 
                         DATE_FORMAT(created_at, '%d/%m/%Y') as criadoEm
                  FROM parcerias 
                  WHERE status = 'pendente' 
                  ORDER BY created_at DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar lista de solicitações de ONGs
    function ListarSolicitacoesOngs()
    {
        $query = "SELECT id, nome, responsavel, descricao as mensagem,
                         DATE_FORMAT(created_at, '%d/%m/%Y') as criadoEm
                  FROM ongs 
                  WHERE status = 'pendente' 
                  ORDER BY created_at DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar lista de solicitações de inativação das ongs
    function ListarSolicitacoesInativar()
    {
        $query = "SELECT p.id, p.nome as projeto, o.nome as ong, p.motivo_inativacao as motivo,
                         DATE_FORMAT(p.updated_at, '%d/%m/%Y') as criadoEm
                  FROM projetos p
                  INNER JOIN ongs o ON p.ong_id = o.id
                  WHERE p.status = 'inativar' 
                  ORDER BY p.updated_at DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Aprovar/Recusar solicitação
    function ProcessarSolicitacao($tipo, $id, $acao)
    {
        try {
            switch ($tipo) {
                case 'empresas':
                    $status = $acao === 'approve' ? 'aprovado' : 'recusado';
                    $query = "UPDATE parcerias SET status = ? WHERE id = ?";
                    break;
                case 'ongs':
                    $status = $acao === 'approve' ? 'ativo' : 'recusado';
                    $query = "UPDATE ongs SET status = ? WHERE id = ?";
                    break;
                case 'inativar':
                    $status = $acao === 'approve' ? 'inativo' : 'ativo';
                    $query = "UPDATE projetos SET status = ? WHERE id = ?";
                    break;
                default:
                    return false;
            }

            $stmt = $this->pdo->prepare($query);
            return $stmt->execute([$status, $id]);
        } catch (Exception $e) {
            return false;
        }
    }
}
