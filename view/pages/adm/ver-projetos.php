<?php
$tituloPagina = 'Ver Projetos ADM'; // Definir o título da página
$cssPagina = ['adm/ver-projetos.css']; //Colocar o arquivo .css 
require_once '../../components/header-adm.php';

require_once '../../../model/ProjetoModel.php';

$projetoModel = new Projeto();
$projetos = $projetoModel->listar();
?>

<!-- Início DIV principal -->
<main>
    <div id="principal">
        <div class="top">
            <h1 class="top-text">TODOS OS PROJETOS</h1>
            <div class="buscar">
                <input type="text" id="buscar" placeholder="Buscar">
                <img src="../../assets/images/search_img.png" class="search_img">
            </div>
        </div>

        <div class="projetos">
            <?php
            foreach ($projetos as $projeto) {
                require '../../components/cards/card-projeto.php';

            }
            ?>
 
        </div>
        <div class="botoes">
            <button class="btn_nav1">1</button>
            <button class="btn_nav">2</button>
            <button class="btn_nav">3</button>
            <button class="btn_nav">4</button>
            <button class="btn_nav">></button>
        </div>
    </div>
</main>
<?php
$jsPagina = []; //Colocar o arquivo .js
require_once '../../components/footer.php';
?>