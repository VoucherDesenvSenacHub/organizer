<?php
$acesso = 'adm';
$tituloPagina = 'Solicitações ONGs | Organizer';
$cssPagina = ['adm/solicitacoes.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$adminModel = new AdminModel();
$solicitacoes = $adminModel->ListarSolicitacoesOngs();
?>
<main class="container">
    <h1><i class="fa-solid fa-house-flag"></i> SOLICITAÇÕES DE CADASTRO DE ONGs</h1>
    <div class="box-cards">
        <?php if (empty($solicitacoes)): ?>
            <p>Nenhuma solicitação de cadastro de ONG pendente.</p>
        <?php else: ?>
            <?php foreach ($solicitacoes as $solicitacao): ?>
                <div class="card-solicitacao-empresa">
                    <div class="nome">
                        <div class="topo">
                            <h3><?= htmlspecialchars($solicitacao['nome']) ?></h3>
                            <small><?= htmlspecialchars($solicitacao['criadoEm']) ?></small>
                        </div>
                        <small class="cnpj">Responsável: <?= htmlspecialchars($solicitacao['responsavel']) ?></small><br>
                        <p><?= htmlspecialchars($solicitacao['mensagem'] ?: 'Sem descrição informada') ?></p>
                    </div>
                    <div class="btn-acoes">
                        <button class="btn btn-aprovar" data-id="<?= $solicitacao['id'] ?>" data-tipo="ongs">
                            APROVAR <i class="fa-solid fa-thumbs-up"></i>
                        </button>
                        <button class="btn btn-recusar" data-id="<?= $solicitacao['id'] ?>" data-tipo="ongs">
                            RECUSAR <i class="fa-solid fa-thumbs-down"></i>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<?php
$jsPagina = ['adm/solicitacoes-ongs.js'];
require_once '../../components/layout/footer/footer-logado.php';
?>
