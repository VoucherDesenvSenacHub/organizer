<?php
$tituloPagina = 'Ver Projetos ADM'; // Definir o título da página
$cssPagina = ['adm/ver-projetos.css']; //Colocar o arquivo .css 
?>

<?php require_once '../../components/header.php'; ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

<!-- Início DIV principal -->
<div id="principal">
    <div class="top">
        <h1 class="top-text">TODOS OS PROJETOS</h1>
        <div class="buscar">
            <input type="text" id="buscar" placeholder="Buscar">
            <img src="../../assets/images/search_img.png" class="search_img">
        </div>
    </div>

    <div class="projetos">
        <div class="card_projeto">
            <img src="../../assets/images/projeto_placeholder.png" class="card_img">
            <h1 class="card-text">Campanha Solidária</h1>
            <p class="card_desc">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur qui quasi accusamus ipsa
                inventore deserunt perspiciatis unde dolorum reiciendis officia?
            </p>
            <button class="btn_card">Vizualizar</button>
        </div>
        <div class="card_projeto">
            <img src="../../assets/images/ong_placeholder_2.png" class="card_img">
            <h1 class="card-text">Projeto 2</h1>
            <p class="card_desc">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur qui quasi accusamus ipsa
                inventore deserunt perspiciatis unde dolorum reiciendis officia?
            </p>
            <button class="btn_card">Vizualizar</button>
        </div>
        <div class="card_projeto">
            <img src="../../assets/images/projeto_placeholder.png" class="card_img">
            <h1 class="card-text">Campanha Solidária</h1>
            <p class="card_desc">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur qui quasi accusamus ipsa
                inventore deserunt perspiciatis unde dolorum reiciendis officia?
            </p>
            <button class="btn_card">Vizualizar</button>
        </div>
        <div class="card_projeto">
            <img src="../../assets/images/ong_placeholder_2.png" class="card_img">
            <h1 class="card-text">Projeto 2</h1>
            <p class="card_desc">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur qui quasi accusamus ipsa
                inventore deserunt perspiciatis unde dolorum reiciendis officia?
            </p>
            <button class="btn_card">Vizualizar</button>
        </div>
        <div class="card_projeto">
            <img src="../../assets/images/projeto_placeholder.png" class="card_img">
            <h1 class="card-text">Campanha Solidária</h1>
            <p class="card_desc">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur qui quasi accusamus ipsa
                inventore deserunt perspiciatis unde dolorum reiciendis officia?
            </p>
            <button class="btn_card">Vizualizar</button>
        </div>
        <div class="card_projeto">
            <img src="../../assets/images/ong_placeholder_2.png" class="card_img">
            <h1 class="card-text">Projeto 2</h1>
            <p class="card_desc">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur qui quasi accusamus ipsa
                inventore deserunt perspiciatis unde dolorum reiciendis officia?
            </p>
            <button class="btn_card">Vizualizar</button>
        </div>
    </div>
    <div class="botoes">
        <button class="btn_nav1">1</button>
        <button class="btn_nav">2</button>
        <button class="btn_nav">3</button>
        <button class="btn_nav">4</button>
        <button class="btn_nav">></button>
    </div>

<?php
$jsPagina = []; //Colocar o arquivo .js
require_once '../../components/footer.php';
?>