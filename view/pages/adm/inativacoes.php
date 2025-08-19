<?php
$acesso = 'adm';
$tituloPagina = 'Inativações | Organizer';
$cssPagina = ['adm/solicitacoes.css', 'modal-confirmacao.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$adminModel = new AdminModel();
$solicitacoes = $adminModel->ListarSolicitacoesInativar();
?>

<main class="container">
    <h1><i class="fa-solid fa-trash-can"></i> SOLICITAÇÕES DE INATIVAÇÃO</h1>
    <div class="box-cards">
        <?php if (empty($solicitacoes)): ?>
            <p>Nenhuma solicitação de inativação pendente.</p>
        <?php else: ?>
            <?php foreach ($solicitacoes as $solicitacao): ?>
                <div class="card-solicitacao-empresa">
                    <div class="nome">
                        <div class="topo">
                            <h3><?= htmlspecialchars($solicitacao['projeto']) ?></h3>
                            <small><?= htmlspecialchars($solicitacao['criadoEm']) ?></small>
                        </div>
                        <small class="cnpj">ONG: <?= htmlspecialchars($solicitacao['ong']) ?></small><br>
                        <p><strong>Meta:</strong> <?= htmlspecialchars($solicitacao['meta'] ?: 'Não informado') ?></p>
                        <p><strong>Descrição:</strong> <?= htmlspecialchars($solicitacao['descricao'] ?: 'Não informado') ?></p>
                    </div>
                    <div class="btn-acoes">
                        <button class="btn btn-aprovar" data-id="<?= $solicitacao['projeto_id'] ?>" data-tipo="inativar">
                            CONFIRMAR <i class="fa-solid fa-check"></i>
                        </button>
                        <button class="btn btn-recusar" data-id="<?= $solicitacao['projeto_id'] ?>" data-tipo="inativar">
                            CANCELAR <i class="fa-solid fa-times"></i>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<?php
$jsPagina = ['modal-confirmacao.js', 'adm/inativacoes.js'];
require_once '../../components/layout/footer/footer-logado.php';
?>
