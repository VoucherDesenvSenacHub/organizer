<?php
session_start();

// Configurações da página
$acesso = 'adm';
$tituloPagina = 'Painel de Notícias | Organizer';
$cssPagina = ['adm/listagem.css'];
require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . '/../../../autoload.php';

$noticiaModel = new NoticiaModel();

// Processa bloqueio (muda status para INATIVO)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['noticia_id'])) {
    $id = (int) $_POST['noticia_id'];
    $sucesso = $noticiaModel->bloquearNoticia($id);

    if ($sucesso) {
        header('Location: home.php?mensagem=noticia_bloqueada');
        exit;
    } else {
        echo "<p style='color:red;'>Erro ao bloquear a notícia.</p>";
    }
}

// Paginação e filtros
$paginaAtual = (int)($_GET['pagina'] ?? 1);
$filtros = [
    'pagina'   => $paginaAtual,
    'pesquisa' => $_GET['pesquisa'] ?? null,
    'status'   => 'ATIVO'  // buscar apenas notícias ativas
];

// Buscar notícias ativas
$lista = $noticiaModel->listarCardsNoticias($filtros);
$totalRegistros = $noticiaModel->paginacaoNoticias($filtros);
$paginas = (int) ceil($totalRegistros / 6);
?>

<main class="conteudo-principal">
    <section>
        <?php if (isset($_GET['pesquisa'])): ?>
            <p class='qnt-busca'><i class='fa-solid fa-search'></i> <?= $totalRegistros ?> Notícias Encontradas</p>
        <?php endif; ?>

        <section id="box-ongs">
            <?php if ($lista): ?>
                <?php foreach ($lista as $noticia): ?>
                    <article class="card-noticia">
                        <h3><?= htmlspecialchars($noticia['titulo']) ?></h3>
                        <p><?= htmlspecialchars($noticia['subtitulo']) ?></p>
                        <?php if ($noticia['status'] === 'ATIVO'): ?>
                            <form action="home.php" method="POST" onsubmit="return confirm('Tem certeza que deseja bloquear esta notícia?')">
                                <input type="hidden" name="noticia_id" value="<?= $noticia['noticia_id'] ?>">
                                <button class="btn" type="submit">Bloquear</button>
                            </form>
                        <?php else: ?>
                            <span class="noticia-bloqueada">Esta notícia está bloqueada</span>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhuma Notícia cadastrada!</p>
            <?php endif; ?>
        </section>

        <?php if ($paginas > 1): ?>
            <nav class="paginacao">
                <?php for ($i = 1; $i <= $paginas; $i++): ?>
                    <a href="?pagina=<?= $i ?><?= isset($_GET['pesquisa']) ? '&pesquisa=' . urlencode($_GET['pesquisa']) : '' ?>"
                       class="<?= $i === $paginaAtual ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
            </nav>
        <?php endif; ?>
    </section>
</main>

<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
?>
