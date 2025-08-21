<?php
$acesso = 'doador';
$tituloPagina = 'Apoios | Organizer';
$cssPagina = ['doador/apoios.css'];
require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . '/../../../autoload.php';
$projetoModel = new Projeto();
$lista = $projetoModel->buscarCardsApoiados($_SESSION['usuario']['id']);

$projetosFavoritos = $projetoModel->listarFavoritos($_SESSION['usuario']['id']);

?>
<!-- 
    Toast de Favoritar
-->
<div id="toast-favorito" class="toast">
    <i class="fa-solid fa-heart"></i>
    Adicionado aos favoritos!
</div>
<div id="toast-remover-favorito" class="toast erro">
    <i class="fa-solid fa-heart-crack"></i>
    Removido dos favoritos!
</div>
<main>
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
        </div>
    </section>
</main>

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