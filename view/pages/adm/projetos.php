<?php
$acesso = 'adm';
$tituloPagina = 'Painel de Projetos | Organizer';
$cssPagina = ['adm/listagem.css'];
require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . '/../../../autoload.php';

$projetoModel = new ProjetoModel();
$paginaAtual = (int) ($_GET['pagina'] ?? 1);
$ongId = $_SESSION['ong_id'];

// Monta os filtros
$filtros = [
    'pagina' => $paginaAtual,
    'pesquisa' => $_GET['pesquisa'] ?? '',
    'status' => ($_GET['status'] ?? '') !== '' ? $_GET['status'] : null
];

// Busca lista e paginação
$lista = $projetoModel->listarCardsProjetos($filtros);
$totalRegistros = $projetoModel->paginacaoProjetos($filtros);
$paginas = (int) ceil($totalRegistros / 6);

?>
<main class="conteudo-principal">
    <section>
        <div class="container">
            <div class="top">
                <h1><i class="fa-solid fa-diagram-project"></i> PAINEL DE PROJETOS</h1>

                <!-- FORM DE BUSCA (mantém valor digitado) -->
                <form id="form-busca" action="projetos.php" method="GET">
                    <input type="text" name="pesquisa" placeholder="Busque um projeto"
                           value="<?= $_GET['pesquisa'] ?? '' ?>">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </form>

                <!-- FORM DE FILTRO (mantém pesquisa junto com o status) -->
                <form id="form-filtro" action="projetos.php" method="GET">
                    <input type="hidden" name="pesquisa" value="<?= $_GET['pesquisa'] ?? '' ?>">

                    <div class="ul-group">
                        <div class="drop" id="esc-status" aria-haspopup="true" aria-expanded="false">
                            <div class="drop-title" tabindex="0">
                                <p id="status-label">
                                    <?php
                                    $status = $_GET['status'] ?? '';

                                    if ($status === '' || $status === null) {
                                        echo "Todas";
                                    } else {
                                        echo ucfirst(strtolower($status));
                                    }
                                    ?>
                                </p>
                                <i class="fa-solid fa-angle-down"></i>
                            </div>

                            <div class="drop-menu" role="menu" aria-labelledby="status-label">
                                <button type="button" class="item" data-value="">Todos</button>
                                <button type="button" class="item" data-value="ATIVO">Ativo</button>
                                <button type="button" class="item" data-value="INATIVO">Inativo</button>
                                <button type="button" class="item" data-value="FINALIZADO">Finalizado</button>
                            </div>

                            <input type="hidden" name="status" id="status-hidden"
                                   value="<?= $_GET['status'] ?? '' ?>">
                        </div>
                    </div>
                </form>

            </div>

            <!-- Quantidade da busca -->
            <?php if (isset($_GET['pesquisa'])): ?>
                <p class="qnt-busca">
                    <i class="fa-solid fa-search"></i> <?= $totalRegistros ?> Projetos Encontrados
                </p>
            <?php endif; ?>

            <section id="box-ongs">
                <!-- LISTAR CARDS PROJETOS -->
                <?php
                if ($lista) {
                    foreach ($lista as $projeto) {
                        require '../../components/cards/card-projeto.php';
                    }
                } else {
                    $status = $_GET['status'] ?? '';
                    if ($status === 'ATIVO') {
                        echo 'Você não tem projetos ativos no momento.';
                    } elseif ($status === 'INATIVO') {
                        echo 'Você não tem projetos inativos no momento.';
                    } elseif ($status === 'FINALIZADO') {
                        echo 'Você não tem projetos finalizados no momento.';
                    } else {
                        echo 'Nenhum projeto encontrado.';
                    }
                }
                ?>
            </section>

            <!-- PAGINAÇÃO (mantém pesquisa e status) -->
            <?php if ($paginas > 1): ?>
                <nav class="paginacao">
                    <?php for ($i = 1; $i <= $paginas; $i++): ?>
                        <a href="?pagina=<?= $i ?>
                        <?= isset($_GET['pesquisa']) ? '&pesquisa=' . urlencode($_GET['pesquisa']) : '' ?>
                        <?= isset($_GET['status']) ? '&status=' . urlencode($_GET['status']) : '' ?>"
                        class="<?= $i === $paginaAtual ? 'active' : '' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </nav>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php
$jsPagina = ['adm/listagem.js'];
require_once '../../components/layout/footer/footer-logado.php';
?>
