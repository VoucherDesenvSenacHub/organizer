<?php
require_once __DIR__ . '/../../autoload.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class EditarPerfilController
{
    private $ongModel;
    private $bancoModel;

    public function __construct()
    {
        $this->ongModel = new OngModel();
        $this->bancoModel = new BancoModel();
    }

    public function buscarDados()
    {
        $perfil = $this->ongModel->buscarId($_SESSION['ong_id']);
        $lista_banco = $this->bancoModel->listar();

        // Definir variáveis globais para a view
        $GLOBALS['perfil'] = $perfil;
        $GLOBALS['lista_banco'] = $lista_banco;

        return [
            'perfil' => $perfil,
            'bancos' => $lista_banco
        ];
    }

    public function inicializar()
    {
        $this->buscarDados();
    }

    public function atualizarPerfil()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['atualizar-ong'])) {
            $dados = [
                'nome' => $_POST['nome'],
                'cnpj' => $_POST['cnpj'],
                'telefone' => $_POST['telefone'],
                'email' => $_POST['email'],
                'cep' => $_POST['cep'],
                'rua' => $_POST['rua'],
                'numero' => $_POST['numero'],
                'bairro' => $_POST['bairro'],
                'cidade' => $_POST['cidade'],
                'estado' => $_POST['estado'],
                'banco_id' => $_POST['banco'],
                'agencia' => $_POST['agencia'],
                'conta_numero' => $_POST['conta_numero'],
                'tipo_conta' => $_POST['tipo_conta'],
                'descricao' => $_POST['descricao'],
                'ong_id' => $_SESSION['ong_id']
            ];

            try {
                $update = $this->ongModel->editar($dados);
                if ($update > 0) {
                    $_SESSION['mensagem_toast'] = ['sucesso', 'ONG atualizada com Sucesso!'];
                    header('Location: ../../view/pages/ong/conta.php');
                    exit;
                } else {
                    $_SESSION['mensagem_toast'] = ['info', 'Nenhuma alteração feita!'];
                    header('Location: ../../view/pages/ong/conta.php');
                    exit;
                }
            } catch (PDOException $e) {
                $_SESSION['mensagem_toast'] = ['erro', 'Falha ao atualizar ONG!'];
                header('Location: ../../view/pages/ong/conta.php');
                exit;
            }
        }
    }
}

// Instanciar o controller e processar a requisição
$controller = new EditarPerfilController();

// se for POST: processar a atualização
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->atualizarPerfil();
}
