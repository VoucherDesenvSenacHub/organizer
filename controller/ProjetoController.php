<?php
ob_start();
session_start();

require_once __DIR__ . '/../../../autoload.php';

$acao  = $_POST['acao'] ?? $_GET['acao'] ?? null;
$ongId = $_SESSION['ong_id'] ?? null;

$ongModel     = new Ong();
$projetoModel = new Projeto();

switch ($acao) {
    case 'inativar':
        $projetoId = (int)($_POST['projeto_id'] ?? 0);
        $motivo    = trim($_POST['motivo'] ?? '');
        $escolha   = $_POST['escolha'] ?? null;

        if ($ongId && $projetoId > 0) {
            $ok = $ongModel->solicitarInativacaoProjeto(
                $projetoId,
                $ongId,
                $motivo !== '' ? $motivo : null,
                $escolha ?: null
            );

            if ($ok) {
                $_SESSION['popup'] = "Solicitação de inativação enviada com sucesso.";
            } else {
                $_SESSION['popup'] = "Não foi possível enviar a solicitação. Verifique os dados.";
            }
        } else {
            $_SESSION['popup'] = "Dados inválidos para inativação.";
        }

        header("Location: /pages/ong/home.php");
        exit;

    case 'editar':
        // Exemplo de ação editar
        break;

    case 'excluir':
        // Exemplo de ação excluir
        break;

    case 'apoiar':
        // Exemplo de ação apoiar
        break;

    default:
        header("Location: /pages/ong/home.php");
        exit;
}
