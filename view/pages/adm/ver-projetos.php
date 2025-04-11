<?php
$tituloPagina = 'Ver Projetos ADM'; // Definir o título da página
$cssPagina = ['adm/ver-projetos.css']; //Colocar o arquivo .css 
require_once '../../components/header-adm.php';
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
        <div class="card-projeto">
                <div class="img-projeto">250x130</div>
                <div class="info-projeto">
                    <h5>Nome Projeto</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                        ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                    </p>
                </div>
                <a class="saiba-mais-projeto" href="visualizar-projetos.php">Visualizar</a>
            </div>
            <div class="card-projeto">
                <div class="img-projeto">250x130</div>
                <div class="info-projeto">
                    <h5>Nome Projeto</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                        ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                    </p>
                </div>
                <a class="saiba-mais-projeto" href="visualizar-projetos.php">Visualizar</a>
            </div>
            <div class="card-projeto">
                <div class="img-projeto">250x130</div>
                <div class="info-projeto">
                    <h5>Nome Projeto</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                        ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                    </p>
                </div>
                <a class="saiba-mais-projeto" href="visualizar-projetos.php">Visualizar</a>
            </div>
            <div class="card-projeto">
                <div class="img-projeto">250x130</div>
                <div class="info-projeto">
                    <h5>Nome Projeto</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                        ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                    </p>
                </div>
                <a class="saiba-mais-projeto" href="visualizar-projetos.php">Visualizar</a>
            </div>
            <div class="card-projeto">
                <div class="img-projeto">250x130</div>
                <div class="info-projeto">
                    <h5>Nome Projeto</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                        ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                    </p>
                </div>
                <a class="saiba-mais-projeto" href="visualizar-projetos.php">Visualizar</a>
            </div>
            <div class="card-projeto">
                <div class="img-projeto">250x130</div>
                <div class="info-projeto">
                    <h5>Nome Projeto</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                        ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                    </p>
                </div>
                <a class="saiba-mais-projeto" href="visualizar-projetos.php">Visualizar</a>
            </div>
            <div class="card-projeto">
                <div class="img-projeto">250x130</div>
                <div class="info-projeto">
                    <h5>Nome Projeto</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                        ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                    </p>
                </div>
                <a class="saiba-mais-projeto" href="visualizar-projetos.php">Visualizar</a>
            </div>
            <div class="card-projeto">
                <div class="img-projeto">250x130</div>
                <div class="info-projeto">
                    <h5>Nome Projeto</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                        ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                    </p>
                </div>
                <a class="saiba-mais-projeto" href="visualizar-projetos.php">Visualizar</a>
            </div>
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