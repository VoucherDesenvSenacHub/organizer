<?php
$acesso = 'doador';
$tituloPagina = 'Favoritos | Organizer';
$cssPagina = ['doador/favoritos.css'];
require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . '/../../../autoload.php';

$ongModel = new OngModel();
$projetoModel = new ProjetoModel();

// ===== CONFIGURAÇÃO DE PAGINAÇÃO =====
$IdUsuario = $_SESSION['usuario']['id'];
$paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;

// Detectar aba ativa baseada na URL
$abaAtiva = isset($_GET['aba']) ? $_GET['aba'] : 'ongs';

// Configurar paginação específica para cada aba
$valorOngs = [
    'pagina' => ($abaAtiva === 'ongs') ? $paginaAtual : 1,
    'usuario_id' => $IdUsuario
];

$valorProjetos = [
    'pagina' => ($abaAtiva === 'projetos') ? $paginaAtual : 1,
    'usuario_id' => $IdUsuario
];

// Buscar ONGs e Projetos favoritados
$listaOngs = $ongModel->listarCardsOngs('favoritas', $valorOngs);
$listaProjetos = $projetoModel->listarCardsProjetos('favoritos', $valorProjetos);

// Calcular paginação para ONGs
$tipoOngs = 'favoritos';
$totalRegistrosOngs = $ongModel->paginacaoOngs($tipoOngs, $valorOngs);
$paginasOngs = (int) ceil($totalRegistrosOngs / 6);

// Calcular paginação para Projetos
$tipoProjetos = 'favoritos';
$totalRegistrosProjetos = $projetoModel->paginacaoProjetos($tipoProjetos, $valorProjetos);
$paginasProjetos = (int) ceil($totalRegistrosProjetos / 8);

// Listas para colorir ícones de favoritos
$ongsFavoritas = $ongModel->listarFavoritas($IdUsuario);
$projetosFavoritos = $projetoModel->listarFavoritos($IdUsuario);
?>
<main class="conteudo-principal">
    <section class="secoes" id="secao-2">
        <div class="container">
            <h1><i class="fa-solid fa-heart"></i> MEUS FAVORITOS</h1>
            <div id="buttons">
                <button id="btn-ong" onclick="trocarAba(0)">ONGS</button>
                <button id="btn-projeto" onclick="trocarAba(1)">PROJETOS</button>
            </div>
            <div id="principal">
                <div id="control-box">
                    <div class="box-ongs">
                        <?php if (!$listaOngs): ?>
                            <div class="btn-doar" id="btn-doar-ong">
                                <h4>Você ainda não favoritou nenhuma ONG! <i class="fa-regular fa-face-frown"></i></h4>
                                <a href="../ong/lista.php">
                                    <button class="btn"><i class="fa-solid fa-building-flag"></i> Conhecer Ongs</button>
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="list-card">
                                <?php foreach ($listaOngs as $ong): ?>
                                    <?php
                                    $jaFavoritada = isset($_SESSION['usuario']['id']) && in_array($ong['ong_id'], $ongsFavoritas);
                                    require '../../components/cards/card-ong.php';
                                    ?>
                                <?php endforeach; ?>
                            </div>

                            <?php if ($paginasOngs > 1): ?>
                                <nav class="paginacao">
                                    <?php for ($i = 1; $i <= $paginasOngs; $i++): ?>
                                        <a href="?pagina=<?= $i ?>&aba=ongs" class="<?= $i === $valorOngs['pagina'] ? 'active' : '' ?>">
                                            <?= $i ?>
                                        </a>
                                    <?php endfor; ?>
                                </nav>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="box-ongs">
                        <?php if (!$listaProjetos): ?>
                            <div class="btn-doar">
                                <h4>Você ainda não favoritou nenhum Projeto! <i class="fa-regular fa-face-frown"></i></h4>
                                <a href="../projeto/lista.php">
                                    <button class="btn"><i class="fa-solid fa-diagram-project"></i> Conhecer Projetos</button>
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="list-card">
                                <?php foreach ($listaProjetos as $projeto): ?>
                                    <?php require '../../components/cards/card-projeto.php'; ?>
                                <?php endforeach; ?>
                            </div>

                            <?php if ($paginasProjetos > 1): ?>
                                <nav class="paginacao">
                                    <?php for ($i = 1; $i <= $paginasProjetos; $i++): ?>
                                        <a href="?pagina=<?= $i ?>&aba=projetos" class="<?= $i === $valorProjetos['pagina'] ? 'active' : '' ?>">
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

<!-- Toasts -->
<div id="toast-favorito" class="toast">
    <i class="fa-solid fa-heart"></i>
    Adicionado aos favoritos!
</div>
<div id="toast-remover-favorito" class="toast erro">
    <i class="fa-solid fa-heart-crack"></i>
    Removido dos favoritos!
</div>

<script>
    // Definir aba ativa baseada na URL sem animação
    document.addEventListener('DOMContentLoaded', function() {
        const abaAtiva = '<?= $abaAtiva ?>';
        if (abaAtiva === 'projetos') {
            definirAbaInicial(1);
        } else {
            definirAbaInicial(0);
        }
    });
</script>

<?php
$jsPagina = ['doador/favoritos.js'];
require_once '../../components/layout/footer/footer-logado.php';

// Exibir toasts de notificação
if (isset($_SESSION['favorito'])) {
    if ($_SESSION['favorito']) {
        echo "<script>mostrar_toast('toast-favorito')</script>";
    } else {
        echo "<script>mostrar_toast('toast-remover-favorito')</script>";
    }
    unset($_SESSION['favorito']);
}
?>