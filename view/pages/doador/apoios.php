<?php
$acesso = 'doador';
$tituloPagina = 'Apoios | Organizer';
$cssPagina = ['doador/apoios.css'];
require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . '/../../../autoload.php';
$projetoModel = new Projeto();
$lista = $projetoModel->buscarCardsApoiados($_SESSION['usuario_id']);

// Favoritar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['projeto-id-favorito'])) {
    $projeto_id = $_POST['projeto-id-favorito'];
    $projetoModel->favoritarProjeto($projeto_id);
}

$projetosFavoritos = $projetoModel->listarFavoritos($_SESSION['usuario_id']);

?>
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
                        $jaFavoritado = isset($_SESSION['usuario_id']) && in_array($projeto->projeto_id, $projetosFavoritos);
                        $valor_projeto = $projetoModel->buscarValor($projeto->projeto_id);
                        $barra = round(($valor_projeto / $projeto->meta) * 100);
                        require '../../components/cards/card-projeto.php';
                    }
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php
// $jsPagina = ['home-doador.js'];
require_once '../../components/layout/footer/footer-logado.php';
?>