<?php

$acesso = 'doador';
$tituloPagina = 'Favoritos | Organizer';
$cssPagina = ['doador/favoritos.css'];
require_once '../../components/layout/base-inicio.php';

require_once '../../../model/OngModel.php';
$ongModel = new Ong();

require_once '../../../model/ProjetoModel.php';
$projetoModel = new Projeto();

// Buscar os favoritos
$listaOngs = $ongModel->favoritosUsuario($_SESSION['usuario']['id']);
$listaProjetos = $projetoModel->favoritosUsuario($_SESSION['usuario']['id']);

// Pintar o icone de favoritos
if (isset($_SESSION['usuario']['id'])) {
    $ongsFavoritas = $ongModel->listarFavoritas($_SESSION['usuario']['id']);
    $projetosFavoritos = $projetoModel->listarFavoritos($_SESSION['usuario']['id']);
}

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
                                $jaFavoritada = isset($_SESSION['usuario']['id']) && in_array($ong->ong_id, $ongsFavoritas);
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
                                $jaFavoritado = isset($_SESSION['usuario']['id']) && in_array($projeto->projeto_id, $projetosFavoritos);
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