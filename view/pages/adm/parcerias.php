<?php
$acesso = 'adm';
$tituloPagina = 'Parcerias | Organizer';
$cssPagina = ['adm/parcerias.css', 'modal-confirmacao.css'];
require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . '/../../../autoload.php';

$adminModel = new AdminModel();

// ===== CONFIGURAÇÃO DE PAGINAÇÃO =====
$IdUsuario = $_SESSION['usuario']['id'];
$abaAtiva = isset($_GET['aba']) ? $_GET['aba'] : 'solicitacoes';

$valorSolicitacoes = [
    'pagina' => ($abaAtiva === 'solicitacoes') ? $paginaAtual : 1,
];
$valorAceitas = [
    'pagina' => ($abaAtiva === 'aceitas') ? $paginaAtual : 1,
];
$valorRecusadas = [
    'pagina' => ($abaAtiva === 'recusadas') ? $paginaAtual : 1,
];

// Buscar solicitações, parcerias aceitas e recusadas
$listaSolicitacoes = $adminModel->ListarSolicitacoesEmpresas($valorSolicitacoes);
$listaAceitas = $adminModel->ListarParceriasAceitas($valorAceitas);
$listaRecusadas = $adminModel->ListarParceriasRecusadas($valorRecusadas);

?>
<main class="conteudo-principal">
    <section class="secoes" id="secao-parcerias">
        <div class="container">
            <div class="header-parcerias">
                <h1><i class="fa-solid fa-handshake"></i> PARCERIAS</h1>
                <div class="filtro-status">
                    <select id="status-parceria" onchange="mudarStatus(this.value)">
                        <option value="solicitacoes">SOLICITAÇÕES</option>
                        <option value="aceitas">ACEITAS</option>
                        <option value="recusadas">RECUSADAS</option>
                    </select>
                </div>
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
                    <div class="box-cards">
                        <?php if (empty($listaRecusadas)): ?>
                            <div class="btn-doar">
                                <h4>Nenhuma parceria recusada! <i class="fa-regular fa-face-smile"></i></h4>
                            </div>
                        <?php else: ?>
                            <?php foreach ($listaRecusadas as $recusada): ?>
                                <div class="card-empresas">
                                    <div class="top">
                                        <div class="icon">
                                            <i class="fa-solid fa-building"></i>
                                        </div>
                                        <div class="empresa">
                                            <h1><?= $recusada['nome'] ?></h1>
                                            <span><?= $recusada['cnpj'] ?></span>
                                        </div>
                                        <span class="data-criacao">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <?= $recusada['criadoEm'] ?>
                                        </span>
                                    </div>
                                    <div class="contato">
                                        <span><i class="fa-solid fa-envelope"></i><?= $recusada['email'] ?></span>
                                        <span><i class="fa-solid fa-phone"></i><?= $recusada['telefone'] ?></span>
                                    </div>
                                    <div class="mensagem">
                                        <span>Mensagem:</span>
                                        <p><?= $recusada['mensagem'] ?></p>
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