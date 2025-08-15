<?php
$acesso = 'adm';
$tituloPagina = 'Parcerias | Organizer';
$cssPagina = ['adm/solicitacoes.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$adminModel = new AdminModel();
$solicitacoes = $adminModel->ListarSolicitacoesEmpresas();
?>
<main class="container">
    <h1><i class="fa-solid fa-handshake"></i> SOLICITAÇÃO DE PARCERIAS</h1>
    <div class="box-cards">
        <?php if (empty($solicitacoes)): ?>
            <p>Nenhuma solicitação de parceria pendente.</p>
        <?php else: ?>
            <?php foreach ($solicitacoes as $solicitacao): ?>
                <div class="card-solicitacao-empresa">
                    <div class="nome">
                        <div class="topo">
                            <h3><?= htmlspecialchars($solicitacao['nome']) ?></h3>
                            <small><?= htmlspecialchars($solicitacao['criadoEm']) ?></small>
                        </div>
                        <small class="cnpj">Contato: <?= htmlspecialchars($solicitacao['contato']) ?></small><br>
                        <p><?= htmlspecialchars($solicitacao['mensagem'] ?: 'Sem descrição informada') ?></p>
                    </div>
                    <div class="btn-acoes">
                        <button class="btn btn-aprovar" data-id="<?= $solicitacao['id'] ?>" data-tipo="empresas">
                            APROVAR <i class="fa-solid fa-thumbs-up"></i>
                        </button>
                        <button class="btn btn-recusar" data-id="<?= $solicitacao['id'] ?>" data-tipo="empresas">
                            RECUSAR <i class="fa-solid fa-thumbs-down"></i>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>
<?php
$jsPagina = ['adm/parcerias.js'];
require_once '../../components/layout/footer/footer-logado.php';
?>