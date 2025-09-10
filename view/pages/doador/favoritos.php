<?php
$acesso = 'doador';
$tituloPagina = 'Favoritos | Organizer';
$cssPagina = ['doador/favoritos.css'];
require_once '../../components/layout/base-inicio.php';

require_once '../../../model/OngModel.php';
$ongModel = new OngModel();

require_once '../../../model/ProjetoModel.php';
$projetoModel = new ProjetoModel();

$IdUsuario = $_SESSION['usuario']['id'];

$paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$valor = ['pagina' => $paginaAtual, 'usuario_id' => $IdUsuario];

// Buscar os favoritos
$listaOngs = $ongModel->listarCardsOngs('favoritas', $valor);
$listaProjetos = $projetoModel->listarCardsProjetos('favoritos', $valor);

// Pintar o icone de favoritos
$ongsFavoritas = $ongModel->listarFavoritas($_SESSION['usuario']['id']);
$projetosFavoritos = $projetoModel->listarFavoritos($_SESSION['usuario']['id']);
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
                                <h4>Você ainda não favoritou nenhuma ONG! <i class="fa-regular fa-face-frown"></i> </h4>
                                <a href="../ong/lista.php">
                                    <button class="btn"><i class="fa-solid fa-house-flag"></i> Conhecer Ongs</button></a>
                            </div>
                        <?php else:
                            $tipo = 'favoritos';
                            $totalRegistros = $ongModel->paginacaoOngs($tipo, $valor);
                            $paginas = (int) ceil($totalRegistros / 6);

                            echo '<div class="list-card">';
                            foreach ($listaOngs as $ong) {
                                $jaFavoritada = isset($_SESSION['usuario']['id']) && in_array($ong['ong_id'], $ongsFavoritas);
                                require '../../components/cards/card-ong.php';
                            }
                            echo '</div>';
                            if ($paginas > 1): ?>
                                <nav class="navegacao">
                                    <?php for ($i = 1; $i <= $paginas; $i++): ?>
                                        <a href="?pagina=<?= $i ?>" class="<?= $i === $paginaAtual ? 'active' : '' ?>">
                                            <?= $i ?>
                                        </a>
                                    <?php endfor; ?>
                                </nav>
                            <?php endif;
                        endif;
                        ?>
                    </div>
                    <div class="box-ongs">
                        <?php if (!$listaProjetos): ?>
                            <div class="btn-doar">
                                <h4>Você ainda não favoritou nenhum Projeto! <i class="fa-regular fa-face-frown"></i> </h4>
                                <a href="../projeto/lista.php">
                                    <button class="btn"><i class="fa-solid fa-diagram-project"></i> Conhecer
                                        Projetos</button></a>
                            </div>
                        <?php else:
                            $tipo = 'favoritos';
                            $totalRegistros = $projetoModel->paginacaoProjetos($tipo, $valor);
                            $paginas = (int) ceil($totalRegistros / 8);
                            echo '<div class="list-card">';
                            foreach ($listaProjetos as $projeto) {
                                require '../../components/cards/card-projeto.php';
                            }
                            echo '</div>';
                            if ($paginas > 1): ?>
                                <nav class="navegacao">
                                    <?php for ($i = 1; $i <= $paginas; $i++): ?>
                                        <a href="?pagina=<?= $i ?>" class="<?= $i === $paginaAtual ? 'active' : '' ?>">
                                            <?= $i ?>
                                        </a>
                                    <?php endfor; ?>
                                </nav>
                            <?php endif;
                        endif;
                        ?>
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

<?php
$jsPagina = ['doador/favoritos.js']; //Colocar o arquivo .js
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