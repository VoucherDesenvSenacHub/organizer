<?php

$acesso = 'doador';
$tituloPagina = 'Favoritos | Organizer';
$cssPagina = ['doador/favoritos.css'];
require_once '../../components/layout/base-inicio.php';

require_once '../../../model/OngModel.php';
$ongModel = new Ong();

require_once '../../../model/ProjetoModel.php';
$projetoModel = new Projeto();

// Favoritar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ong-id-favorito'])) {
    $ong_id = $_POST['ong-id-favorito'];
    $ongModel->favoritarOng($ong_id);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['projeto-id-favorito'])) {
    $projeto_id = $_POST['projeto-id-favorito'];
    $projetoModel->favoritarProjeto($projeto_id);
}

// Buscar os favoritos
$listaOngs = $ongModel->favoritosUsuario($_SESSION['usuario_id']);
$listaProjetos = $projetoModel->favoritosUsuario($_SESSION['usuario_id']);

// Pintar o icone de favoritos
if (isset($_SESSION['usuario_id'])) {
    $ongsFavoritas = $ongModel->listarFavoritas($_SESSION['usuario_id']);
    $projetosFavoritos = $projetoModel->listarFavoritos($_SESSION['usuario_id']);
}

?>
<main>
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
                        <?php if (!$listaOngs) {
                            echo '<div class="btn-doar" id="btn-doar-ong"> 
                                    <h4>Você ainda não favoritou nenhuma ONG! <i class="fa-regular fa-face-frown"></i> </h4>
                                    <a href="../ong/lista.php">
                                    <button class="btn"><i class="fa-solid fa-house-flag"></i> Conhecer Ongs</button></a>
                                  </div>';
                        } else {
                            foreach ($listaOngs as $ong) {
                                $jaFavoritada = isset($_SESSION['usuario_id']) && in_array($ong->ong_id, $ongsFavoritas);
                                require '../../components/cards/card-ong.php';
                            }
                        }
                        ?>
                    </div>
                    <div class="box-ongs">
                        <?php if (!$listaProjetos) {
                            echo '<div class="btn-doar"> 
                                    <h4>Você ainda não favoritou nenhum Projeto! <i class="fa-regular fa-face-frown"></i> </h4>
                                    <a href="../projeto/lista.php">
                                    <button class="btn"><i class="fa-solid fa-diagram-project"></i> Conhecer Projetos</button></a>
                                  </div>';
                        } else {
                            foreach ($listaProjetos as $projeto) {
                                $jaFavoritado = isset($_SESSION['usuario_id']) && in_array($projeto->projeto_id, $projetosFavoritos);
                                $valor_projeto = $projetoModel->buscarValor($projeto->projeto_id);
                                $barra = round(($valor_projeto / $projeto->meta) * 100);
                                require '../../components/cards/card-projeto.php';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        </div>

    </section>
</main>

<?php
$jsPagina = ['favoritos.js']; //Colocar o arquivo .js
require_once '../../components/layout/footer/footer-logado.php';
?>