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
                  (SELECT COUNT(*) FROM parcerias WHERE status = 'PENDENTE') AS empresas,
                  (SELECT COUNT(*) FROM ongs WHERE status = 'PENDENTE') AS ongs,
                  (SELECT COUNT(*) FROM projetos WHERE status = 'PENDENTE') AS inativar;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetch();
    }

    // Buscar lista de solicitações de Empresas (parcerias)
    function ListarSolicitacoesEmpresas()
    {
        $query = "SELECT parceria_id, nome, email, telefone, cnpj, mensagem, 
                         DATE_FORMAT(data_envio, '%d/%m/%Y') as criadoEm
                  FROM parcerias 
                  WHERE status = 'PENDENTE' 
                  ORDER BY data_envio DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    // Buscar lista de solicitações de inativação das ongs
    function ListarSolicitacoesInativar()
    {
        $query = "SELECT p.projeto_id, 
                     p.nome AS projeto, 
                     o.nome AS ong, 
                     p.meta AS meta,
                     p.descricao AS descricao,
                     DATE_FORMAT(p.data_atualizacao, '%d/%m/%Y') AS criadoEm
              FROM projetos p
              INNER JOIN ongs o ON p.ong_id = o.ong_id
              WHERE p.status = 'PENDENTE'
              ORDER BY p.data_atualizacao DESC";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Inserir nova solicitação de parceria
    function CriarSolicitacaoParceria($dados)
    {
        try {
            $query = "INSERT INTO parcerias (nome, email, cnpj, telefone, mensagem, status) 
                      VALUES (?, ?, ?, ?, ?, 'PENDENTE')";
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute([
                $dados['nome'],
                $dados['email'],
                $dados['cnpj'],
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
                    $status = $acao === 'approve' ? 'APROVADDA' : 'RECUSADA';
                    $query = "UPDATE parcerias SET status = ? WHERE parceria_id = ? AND status = 'PENDENTE'";
                    break;
                case 'ongs':
                    $status = $acao === 'approve' ? 'ATIVO' : 'INATIVO';
                    $query = "UPDATE ongs SET status = ? WHERE ong_id = ? AND status = 'PENDENTE'";
                    break;
                case 'inativar':
                    $status = $acao === 'approve' ? 'INATIVO' : 'ATIVO';
                    $query = "UPDATE projetos SET status = ? WHERE projeto_id = ? AND status = 'PENDENTE'";
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
