<?php
$acesso = 'doador';
$tituloPagina = 'Apoios | Organizer';
$cssPagina = ['doador/apoios.css'];
require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . '/../../../autoload.php';

$projetoModel = new ProjetoModel();

// ===== CONFIGURAÇÃO DE PAGINAÇÃO =====
$IdUsuario = $_SESSION['usuario']['id'];
$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$tipo = 'apoiados';
$valor = [
    'usuario_id' => $IdUsuario, 
    'pagina' => $paginaAtual
];

// Buscar os projetos apoiados
$lista = $projetoModel->listarCardsProjetos($tipo, $valor);

// Calcula total de registros e número de páginas
$totalRegistros = $projetoModel->paginacaoProjetos($tipo, $valor);
$paginas = (int)ceil($totalRegistros / 8);

// Lista os projetos favoritados pelo usuário (colorir o coração)
$projetosFavoritos = $projetoModel->listarFavoritos($_SESSION['usuario']['id']);

?>
<main class="conteudo-principal">
    <section>
        <div class="container">
            <h1><i class="fa-solid fa-hand-holding-heart"></i> MEUS APOIOS</h1>
            <div class="box-apoios">
                <?php if (!$lista) {
                    echo '<div class="btn-doar"> 
                            <h4>Você ainda não apoiou nenhum Projeto! <i class="fa-regular fa-face-frown"></i> </h4>
                            <a href="../projeto/lista.php">
                            <button class="btn"><i class="fa-solid fa-diagram-project"></i> Conhecer Projetos</button></a>
                          </div>';
                } else {
                    foreach ($lista as $projeto) {
                        require '../../components/cards/card-projeto.php';
                    }
                }
                ?>
            </div>
            <?php if ($paginas > 1): ?>
                <nav class="navegacao">
                    <?php for ($i = 1; $i <= $paginas; $i++): ?>
                        <a href="?pagina=<?= $i ?>"
                            class="<?= $i === $paginaAtual ? 'active' : '' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </nav>
            <?php endif; ?>
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

<?php
$jsPagina = [''];
require_once '../../components/layout/footer/footer-logado.php';
// Ativar os toast
if (isset($_SESSION['favorito'])) {
    if ($_SESSION['favorito']) {
        echo "<script>mostrar_toast('toast-favorito')</script>";
    } else {
        echo "<script>mostrar_toast('toast-remover-favorito')</script>";
    }
    unset($_SESSION['favorito']);
}
?>