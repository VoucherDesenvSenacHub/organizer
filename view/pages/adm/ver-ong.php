<?php
$tituloPagina = 'Ver ONG ADM '; // Definir o título da página
$cssPagina = ['adm/ver-ong.css']; //Colocar o arquivo .css 
require_once '../../components/layout/base-inicio.php';
?>

<main>
    <div id="principal">
        <div class="top">
            <h1 class="top-text">TODAS AS ONGS</h1>
            <form id="form-busca" action="ongs.php" method="GET">
                <input type="text" name="pesquisa" placeholder="Busque uma ONG" required>
                <button class="btn"><i class="fa-solid fa-search"></i></button>
            </form>
        </div>

        <section id="box-ongs">
            <div class="card-ong">
                <div class="perfil">
                    <div class="logo">
                        <p>Logo</p>
                    </div>
                    <div class="nome">
                        <h2>Nome da ONG</h2>
                        <p>Área de Atuação</p>
                    </div>
                </div>
                <div class="descricao">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos
                        alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis
                        cumque minus nobis, ipsum delectus!</p>
                </div>
                <div class="doacao">
                    <p><span>150 </span>Doações</p>
                    <p><span>9 </span>Projetos</p>
                </div>
                <div class="acoes-ong">
                    <a href="perfil-ong.php" class="saiba-mais-ong">Saiba Mais</a>

                </div>
            </div>
            <div class="card-ong">
                <div class="perfil">
                    <div class="logo">
                        <p>Logo</p>
                    </div>
                    <div class="nome">
                        <h2>Nome da ONG</h2>
                        <p>Área de Atuação</p>
                    </div>
                </div>
                <div class="descricao">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos
                        alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis
                        cumque minus nobis, ipsum delectus!</p>
                </div>
                <div class="doacao">
                    <p><span>150 </span>Doações</p>
                    <p><span>9 </span>Projetos</p>
                </div>
                <div class="acoes-ong">
                    <a href="perfil-ong.php" class="saiba-mais-ong">Saiba Mais</a>

                </div>
            </div>
            <div class="card-ong">
                <div class="perfil">
                    <div class="logo">
                        <p>Logo</p>
                    </div>
                    <div class="nome">
                        <h2>Nome da ONG</h2>
                        <p>Área de Atuação</p>
                    </div>
                </div>
                <div class="descricao">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos
                        alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis
                        cumque minus nobis, ipsum delectus!</p>
                </div>
                <div class="doacao">
                    <p><span>150 </span>Doações</p>
                    <p><span>9 </span>Projetos</p>
                </div>
                <div class="acoes-ong">
                    <a href="perfil-ong.php" class="saiba-mais-ong">Saiba Mais</a>

                </div>
            </div>
            <div class="card-ong">
                <div class="perfil">
                    <div class="logo">
                        <p>Logo</p>
                    </div>
                    <div class="nome">
                        <h2>Nome da ONG</h2>
                        <p>Área de Atuação</p>
                    </div>
                </div>
                <div class="descricao">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos
                        alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis
                        cumque minus nobis, ipsum delectus!</p>
                </div>
                <div class="doacao">
                    <p><span>150 </span>Doações</p>
                    <p><span>9 </span>Projetos</p>
                </div>
                <div class="acoes-ong">
                    <a href="perfil-ong.php" class="saiba-mais-ong">Saiba Mais</a>

                </div>
            </div>
            <div class="card-ong">
                <div class="perfil">
                    <div class="logo">
                        <p>Logo</p>
                    </div>
                    <div class="nome">
                        <h2>Nome da ONG</h2>
                        <p>Área de Atuação</p>
                    </div>
                </div>
                <div class="descricao">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos
                        alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis
                        cumque minus nobis, ipsum delectus!</p>
                </div>
                <div class="doacao">
                    <p><span>150 </span>Doações</p>
                    <p><span>9 </span>Projetos</p>
                </div>
                <div class="acoes-ong">
                    <a href="perfil-ong.php" class="saiba-mais-ong">Saiba Mais</a>

                </div>
            </div>
            <div class="card-ong">
                <div class="perfil">
                    <div class="logo">
                        <p>Logo</p>
                    </div>
                    <div class="nome">
                        <h2>Nome da ONG</h2>
                        <p>Área de Atuação</p>
                    </div>
                </div>
                <div class="descricao">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos
                        alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis
                        cumque minus nobis, ipsum delectus!</p>
                </div>
                <div class="doacao">
                    <p><span>150 </span>Doações</p>
                    <p><span>9 </span>Projetos</p>
                </div>
                <div class="acoes-ong">
                    <a href="perfil-ong.php" class="saiba-mais-ong">Saiba Mais</a>

                </div>
            </div>
        </section>
        <nav id="navegacao">
            <a class="active" href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">></a>
        </nav>
    </div>
</main>

<?php
$jsPagina = []; //Colocar o arquivo .js (exemplo: 'ONG/cadastro.js')
require_once '../../components/footer.php';
?>