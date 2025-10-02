<?php
$acesso = 'adm';
$tituloPagina = 'Parcerias | Organizer';
$cssPagina = ['adm/parcerias.css', 'modal-confirmacao.css'];
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
                    <div class="box-cards">
                        <?php if (empty($listaSolicitacoes)): ?>
                            <div class="btn-doar">
                                <h4>Nenhuma solicitação de parceria pendente. <i class="fa-regular fa-face-frown"></i></h4>
                            </div>
                        <?php else: ?>
                            <?php foreach ($listaSolicitacoes as $solicitacao): ?>
                                <div class="card-empresas">
                                    <div class="top">
                                        <div class="icon">
                                            <i class="fa-solid fa-building"></i>
                                        </div>
                                        <div class="empresa">
                                            <h1><?= $solicitacao['nome'] ?></h1>
                                            <span><?= $solicitacao['cnpj'] ?></span>
                                        </div>
                                        <span class="data-criacao">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <?= $solicitacao['criadoEm'] ?>
                                        </span>
                                    </div>
                                    <div class="contato">
                                        <span><i class="fa-solid fa-envelope"></i><?= $solicitacao['email'] ?></span>
                                        <span><i class="fa-solid fa-phone"></i><?= $solicitacao['telefone'] ?></span>
                                    </div>
                                    <div class="mensagem">
                                        <span>Mensagem:</span>
                                        <p><?= $solicitacao['mensagem'] ?></p>
                                    </div>
                                    <div class="btn-acoes">
                                        <button class="btn-aprovar" data-id="<?= $solicitacao['parceria_id'] ?? '' ?>" data-tipo="empresas">
                                            <i class="fa-solid fa-thumbs-up"></i>
                                        </button>
                                        <button class="btn-recusar" data-id="<?= $solicitacao['parceria_id'] ?? '' ?>" data-tipo="empresas">
                                            <i class="fa-solid fa-thumbs-down"></i>
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="box-cards">
                        <?php if (empty($listaAceitas)): ?>
                            <div class="btn-doar">
                                <h4>Você ainda não possui parcerias aceitas! <i class="fa-regular fa-face-frown"></i></h4>
                                <a href="../empresa/lista.php">
                                    <button class="btn"><i class="fa-solid fa-building-user"></i> Conhecer Empresas</button>
                                </a>
                            </div>
                        <?php else: ?>
                            <?php foreach ($listaAceitas as $parceria): ?>
                                <div class="card-empresas">
                                    <div class="top">
                                        <div class="icon">
                                            <i class="fa-solid fa-building"></i>
                                        </div>
                                        <div class="empresa">
                                            <h1><?= $parceria['nome'] ?></h1>
                                            <span><?= $parceria['cnpj'] ?></span>
                                        </div>
                                        <span class="data-criacao">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <?= $parceria['criadoEm'] ?>
                                        </span>
                                    </div>
                                    <div class="contato">
                                        <span><i class="fa-solid fa-envelope"></i><?= $parceria['email'] ?></span>
                                        <span><i class="fa-solid fa-phone"></i><?= $parceria['telefone'] ?></span>
                                    </div>
                                    <div class="mensagem">
                                        <span><i class="fa-solid fa-quote-left"></i> Descrição:</span>
                                        <p><?= $parceria['descricao'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
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