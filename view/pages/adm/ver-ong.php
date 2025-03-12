<?php 
    $tituloPagina = 'Ver ONG ADM '; // Definir o título da página
    $cssPagina = ['ADM/ver-ong.css']; //Colocar o arquivo .css 
    require_once '../../components/header.php';
?>


    <!-- Início DIV principal -->
    <div id="principal">
        <div class="top">
            <h1 class="top-text">TODAS AS ONGS</h1>
            <div class="buscar">
                <input type="text" id="buscar" placeholder="Buscar">
                <img src="../../assets/images/search_img.png" class="search_img">
            </div>
        </div>

        <div class="ongs">
            <div class="card_ong">
                <img src="../../assets/images/ong_placeholder.png" class="card_img">
                <h1 class="card-text">ONG Todos Juntos</h1>
                <button class="btn_card">Vizualizar</button>
            </div>
            <div class="card_ong">
                <img src="../../assets/images/ong_placeholder_2.png" class="card_img">
                <h1 class="card-text">ONG Todos Juntos</h1>
                <button class="btn_card">Vizualizar</button>
            </div>
            <div class="card_ong">
                <img src="../../assets/images/ong_placeholder.png" class="card_img">
                <h1 class="card-text">ONG Todos Juntos</h1>
                <button class="btn_card">Vizualizar</button>
            </div>
            <div class="card_ong">
                <img src="../../assets/images/ong_placeholder_2.png" class="card_img">
                <h1 class="card-text">ONG Todos Juntos</h1>
                <button class="btn_card">Vizualizar</button>
            </div>
            <div class="card_ong">
                <img src="../../assets/images/ong_placeholder.png" class="card_img">
                <h1 class="card-text">ONG Todos Juntos</h1>
                <button class="btn_card">Vizualizar</button>
            </div>
            <div class="card_ong">
                <img src="../../assets/images/ong_placeholder_2.png" class="card_img">
                <h1 class="card-text">ONG Todos Juntos</h1>
                <button class="btn_card">Vizualizar</button>
            </div>
        </div>
        <div class="botoes">
            <button class="btn_nav">1</button>
            <button class="btn_nav">2</button>
            <button class="btn_nav">3</button>
            <button class="btn_nav">4</button>
            <button class="btn_nav">></button>
        </div>
    </div>
    <!-- Fim DIV principal  -->
<?php
    $jsPagina = []; //Colocar o arquivo .js (exemplo: 'ONG/cadastro.js')
    require_once '../../components/footer.php';
?>