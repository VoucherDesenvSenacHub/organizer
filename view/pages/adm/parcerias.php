<?php
$acesso = 'adm';
$tituloPagina = 'Parcerias | Organizer';
$cssPagina = ['adm/parcerias.css', 'modal-confirmacao.css'];
require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . '/../../../autoload.php';

$adminModel = new AdminModel();

// ===== CONFIGURAÇÃO =====
$IdUsuario = $_SESSION['usuario']['id'];
$abaAtiva = isset($_GET['aba']) ? $_GET['aba'] : 'solicitacoes';

// Mapear os valores de status do frontend para o backend
$statusMap = [
    'solicitacoes' => 'PENDENTE',
    'aceitas' => 'APROVADA',
    'recusadas' => 'RECUSADA'
];

// Buscar lista de parcerias baseado no status
$lista = $adminModel->listarParcerias($statusMap[$abaAtiva]);
// var_dump($lista);
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
                        <?php if (empty($lista)): ?>
                            <div class="btn-doar">
                                <h4>
                                    <?php
                                    switch ($abaAtiva) {
                                        case 'solicitacoes':
                                            echo 'Nenhuma solicitação de parceria pendente.';
                                            break;
                                        case 'aceitas':
                                            echo 'Nenhuma empresa parceira aceita!';
                                            break;
                                        case 'recusadas':
                                            echo 'Nenhuma parceria recusada!';
                                            break;
                                    }
                                    ?>
                                    <i
                                        class="fa-regular <?= $abaAtiva === 'recusadas' ? 'fa-face-smile' : 'fa-face-frown' ?>"></i>
                                </h4>
                                <?php if ($abaAtiva === 'aceitas'): ?>
                                    <a href="../empresa/lista.php">
                                        <button class="btn"><i class="fa-solid fa-building-user"></i> Conhecer Empresas</button>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <?php foreach ($lista as $parceria): ?>
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
                                        <span><i class="fa-solid fa-quote-left"></i>
                                            <?= $abaAtiva === 'aceitas' ? 'Descrição' : 'Mensagem' ?>:</span>
                                        <p><?= $parceria['mensagem'] ?></p>
                                    </div>
                                    <?php if ($abaAtiva === 'solicitacoes'): ?>
                                        <div class="btn-acoes">
                                            <button class="btn-aprovar" data-id="<?= $parceria['parceria_id'] ?? '' ?>"
                                                data-tipo="empresas">
                                                <i class="fa-solid fa-thumbs-up"></i>
                                            </button>
                                            <button class="btn-recusar" data-id="<?= $parceria['parceria_id'] ?? '' ?>"
                                                data-tipo="empresas">
                                                <i class="fa-solid fa-thumbs-down"></i>
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($abaAtiva === 'aceitas'): ?>
                                        <div class="btn-acoes">
                                            <button class="btn-recusar"
                                                data-id="<?= $parceria['id'] ?? $parceria['parceria_id'] ?? $parceria['id_parceria'] ?? 0 ?>"
                                                data-tipo="empresas">
                                                <i class="fa-solid fa-thumbs-down"></i>
                                            </button>
                                        </div>
                                    <?php endif; ?>
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
$jsPagina = ['adm/modal-confirmacao.js', 'adm/parcerias.js'];
require_once '../../components/layout/footer/footer-logado.php';
?>