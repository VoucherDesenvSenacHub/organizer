<?php
$acesso = 'adm';
$tituloPagina = 'Parcerias | Organizer';
$cssPagina = ['adm/solicitacoes.css', 'modal-confirmacao.css'];
require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . '/../../../autoload.php';

$adminModel = new AdminModel();

// ===== CONFIGURAÇÃO DE PAGINAÇÃO =====
$IdUsuario = $_SESSION['usuario']['id'];
$paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$abaAtiva = isset($_GET['aba']) ? $_GET['aba'] : 'solicitacoes';

$valorSolicitacoes = [
    'pagina' => ($abaAtiva === 'solicitacoes') ? $paginaAtual : 1,
];
$valorAceitas = [
    'pagina' => ($abaAtiva === 'aceitas') ? $paginaAtual : 1,
];

// Buscar solicitações e parcerias aceitas
$listaSolicitacoes = $adminModel->ListarSolicitacoesEmpresas($valorSolicitacoes);
$listaAceitas = $adminModel->ListarParceriasAceitas($valorAceitas);

// Calcular paginação para Solicitações
$totalSolicitacoes = $adminModel->contarSolicitacoes();
$paginasSolicitacoes = (int) ceil($totalSolicitacoes / 8);

// Calcular paginação para Parcerias Aceitas
$totalAceitas = $adminModel->contarParceriasAceitas();
$paginasAceitas = (int) ceil($totalAceitas / 8);

?>
<main class="conteudo-principal">
    <section class="secoes" id="secao-parcerias">
        <div class="container">
            <h1><i class="fa-solid fa-handshake"></i> PARCERIAS</h1>
            <div id="buttons">
                <button id="btn-solicitacao" onclick="trocarAba(0)">SOLICITAÇÕES</button>
                <button id="btn-aceitas" onclick="trocarAba(1)">ACEITAS</button>
            </div>
            <div id="principal">
                <div id="control-box">
                    <div class="box-parcerias">
                        <?php if (empty($listaSolicitacoes)): ?>
                            <div class="btn-doar">
                                <h4>Nenhuma solicitação de parceria pendente. <i class="fa-regular fa-face-frown"></i></h4>
                            </div>
                        <?php else: ?>
                            <div class="box-cards">
                                <?php foreach ($listaSolicitacoes as $solicitacao): ?>
                                    <div class="card-solicitacao-empresa">
                                        <div class="nome">
                                            <div class="topo">
                                                <h3><?= htmlspecialchars($solicitacao['nome'] ?? 'Nome não informado') ?></h3>
                                                <small><?= htmlspecialchars($solicitacao['criadoEm'] ?? '') ?></small>
                                            </div>
                                            <small class="cnpj">
                                                Email: <?= htmlspecialchars($solicitacao['email'] ?? 'Não informado') ?>
                                            </small><br>
                                            <small class="cnpj">
                                                CNPJ: <?= htmlspecialchars($solicitacao['cnpj'] ?? 'Não informado') ?>
                                            </small><br>
                                            <small class="cnpj">
                                                Contato: <?= htmlspecialchars($solicitacao['telefone'] ?? 'Não informado') ?>
                                            </small><br>
                                            <div>
                                                Mensagem: <b><?= htmlspecialchars($solicitacao['mensagem'] ?? 'Sem descrição informada') ?></b>
                                            </div><br>
                                        </div>
                                        <div class="btn-acoes" style="bottom: 0; margin: 10px;">
                                            <button class="btn btn-aprovar"
                                                    data-id="<?= $solicitacao['parceria_id'] ?? '' ?>"
                                                    data-tipo="empresas">
                                                APROVAR <i class="fa-solid fa-thumbs-up"></i>
                                            </button>
                                            <button class="btn btn-recusar"
                                                    data-id="<?= $solicitacao['parceria_id'] ?? '' ?>"
                                                    data-tipo="empresas">
                                                RECUSAR <i class="fa-solid fa-thumbs-down"></i>
                                            </button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php if ($paginasSolicitacoes > 1): ?>
                                <nav class="navegacao">
                                    <?php for ($i = 1; $i <= $paginasSolicitacoes; $i++): ?>
                                        <a href="?pagina=<?= $i ?>&aba=solicitacoes" class="<?= $i === $valorSolicitacoes['pagina'] ? 'active' : '' ?>">
                                            <?= $i ?>
                                        </a>
                                    <?php endfor; ?>
                                </nav>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="box-parcerias">
                        <?php if (empty($listaAceitas)): ?>
                            <div class="btn-doar">
                                <h4>Você ainda não possui parcerias aceitas! <i class="fa-regular fa-face-frown"></i></h4>
                                <a href="../empresa/lista.php">
                                    <button class="btn"><i class="fa-solid fa-building-user"></i> Conhecer Empresas</button>
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="box-cards">
                                <?php foreach ($listaAceitas as $parceria): ?>
                                    <div class="card-solicitacao-empresa">
                                        <div class="nome">
                                            <div class="topo">
                                                <h3><?= htmlspecialchars($parceria['nome'] ?? 'Nome não informado') ?></h3>
                                                <small><?= htmlspecialchars($parceria['criadoEm'] ?? '') ?></small>
                                            </div>
                                            <small class="cnpj">
                                                Email: <?= htmlspecialchars($parceria['email'] ?? 'Não informado') ?>
                                            </small><br>
                                            <small class="cnpj">
                                                CNPJ: <?= htmlspecialchars($parceria['cnpj'] ?? 'Não informado') ?>
                                            </small><br>
                                            <small class="cnpj">
                                                Contato: <?= htmlspecialchars($parceria['telefone'] ?? 'Não informado') ?>
                                            </small><br>
                                            <div>
                                                Mensagem: <b><?= htmlspecialchars($parceria['mensagem'] ?? 'Sem descrição informada') ?></b>
                                            </div><br>
                                        </div>
                                        <div class="btn-acoes" style="bottom: 0; margin: 10px;">
                                            </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php if ($paginasAceitas > 1): ?>
                                <nav class="navegacao">
                                    <?php for ($i = 1; $i <= $paginasAceitas; $i++): ?>
                                        <a href="?pagina=<?= $i ?>&aba=aceitas" class="<?= $i === $valorAceitas['pagina'] ? 'active' : '' ?>">
                                            <?= $i ?>
                                        </a>
                                    <?php endfor; ?>
                                </nav>
                            <?php endif; ?>
                        <?php endif; ?>   
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
$jsPagina = ['adm/parcerias.js', 'adm/modal-confirmacao.js'];
require_once '../../components/layout/footer/footer-logado.php';
?>