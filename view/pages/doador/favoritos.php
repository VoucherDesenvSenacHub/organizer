<?php
$acesso = 'doador';
$tituloPagina = 'Favoritos | Organizer'; // Definir o título da página
$cssPagina = ['doador/favoritos.css']; //Colocar o arquivo .css 
require_once '../../components/layout/base-inicio.php';
?>
<main>
    <section class="secoes" id="secao-2">
        <div class="container">
            <h1>FAVORITOS</h1>
            <div id="buttons">
                <button id="btn-ong" onclick="trocarAba(0)">ONGS</button>
                <button id="btn-projeto" onclick="trocarAba(1)">PROJETOS</button>
            </div>
            <div id="principal">
                <div id="control-box">
                    <div class="box-ongs">
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio,
                                    dignissimos
                                    alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas
                                    quis
                                    cumque minus nobis, ipsum delectus!</p>
                            </div>
                            <div class="doacao">
                                <p><span>150 </span>Doações</p>
                                <p><span>9 </span>Projetos</p>
                            </div>
                            <div class="acoes-ong">
                                <a href="../ong/perfil.php" class="saiba-mais-ong">Saiba Mais</a>
                                <div class="btn-salvar">
                                    <button id="share" class="fa-solid fa-share-nodes"
                                        onclick="abrir_popup('compartilhar-popup')"></button>
                                    <button id="like" class="fa-solid fa-heart"></button>
                                </div>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio,
                                    dignissimos
                                    alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas
                                    quis
                                    cumque minus nobis, ipsum delectus!</p>
                            </div>
                            <div class="doacao">
                                <p><span>150 </span>Doações</p>
                                <p><span>9 </span>Projetos</p>
                            </div>
                            <div class="acoes-ong">
                                <a href="../ong/perfil.php" class="saiba-mais-ong">Saiba Mais</a>
                                <div class="btn-salvar">
                                    <button id="share" class="fa-solid fa-share-nodes"
                                        onclick="abrir_popup('compartilhar-popup')"></button>
                                    <button id="like" class="fa-solid fa-heart"></button>
                                </div>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio,
                                    dignissimos
                                    alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas
                                    quis
                                    cumque minus nobis, ipsum delectus!</p>
                            </div>
                            <div class="doacao">
                                <p><span>150 </span>Doações</p>
                                <p><span>9 </span>Projetos</p>
                            </div>
                            <div class="acoes-ong">
                                <a href="../ong/perfil.php" class="saiba-mais-ong">Saiba Mais</a>
                                <div class="btn-salvar">
                                    <button id="share" class="fa-solid fa-share-nodes"
                                        onclick="abrir_popup('compartilhar-popup')"></button>
                                    <button id="like" class="fa-solid fa-heart"></button>
                                </div>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio,
                                    dignissimos
                                    alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas
                                    quis
                                    cumque minus nobis, ipsum delectus!</p>
                            </div>
                            <div class="doacao">
                                <p><span>150 </span>Doações</p>
                                <p><span>9 </span>Projetos</p>
                            </div>
                            <div class="acoes-ong">
                                <a href="../ong/perfil.php" class="saiba-mais-ong">Saiba Mais</a>
                                <div class="btn-salvar">
                                    <button id="share" class="fa-solid fa-share-nodes"
                                        onclick="abrir_popup('compartilhar-popup')"></button>
                                    <button id="like" class="fa-solid fa-heart"></button>
                                </div>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio,
                                    dignissimos
                                    alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas
                                    quis
                                    cumque minus nobis, ipsum delectus!</p>
                            </div>
                            <div class="doacao">
                                <p><span>150 </span>Doações</p>
                                <p><span>9 </span>Projetos</p>
                            </div>
                            <div class="acoes-ong">
                                <a href="../ong/perfil.php" class="saiba-mais-ong">Saiba Mais</a>
                                <div class="btn-salvar">
                                    <button id="share" class="fa-solid fa-share-nodes"
                                        onclick="abrir_popup('compartilhar-popup')"></button>
                                    <button id="like" class="fa-solid fa-heart"></button>
                                </div>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio,
                                    dignissimos
                                    alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas
                                    quis
                                    cumque minus nobis, ipsum delectus!</p>
                            </div>
                            <div class="doacao">
                                <p><span>150 </span>Doações</p>
                                <p><span>9 </span>Projetos</p>
                            </div>
                            <div class="acoes-ong">
                                <a href="../ong/perfil.php" class="saiba-mais-ong">Saiba Mais</a>
                                <div class="btn-salvar">
                                    <button id="share" class="fa-solid fa-share-nodes"
                                        onclick="abrir_popup('compartilhar-popup')"></button>
                                    <button id="like" class="fa-solid fa-heart"></button>
                                </div>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio,
                                    dignissimos
                                    alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas
                                    quis
                                    cumque minus nobis, ipsum delectus!</p>
                            </div>
                            <div class="doacao">
                                <p><span>150 </span>Doações</p>
                                <p><span>9 </span>Projetos</p>
                            </div>
                            <div class="acoes-ong">
                                <a href="../ong/perfil.php" class="saiba-mais-ong">Saiba Mais</a>
                                <div class="btn-salvar">
                                    <button id="share" class="fa-solid fa-share-nodes"
                                        onclick="abrir_popup('compartilhar-popup')"></button>
                                    <button id="like" class="fa-solid fa-heart"></button>
                                </div>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio,
                                    dignissimos
                                    alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas
                                    quis
                                    cumque minus nobis, ipsum delectus!</p>
                            </div>
                            <div class="doacao">
                                <p><span>150 </span>Doações</p>
                                <p><span>9 </span>Projetos</p>
                            </div>
                            <div class="acoes-ong">
                                <a href="../ong/perfil.php" class="saiba-mais-ong">Saiba Mais</a>
                                <div class="btn-salvar">
                                    <button id="share" class="fa-solid fa-share-nodes"
                                        onclick="abrir_popup('compartilhar-popup')"></button>
                                    <button id="like" class="fa-solid fa-heart"></button>
                                </div>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio,
                                    dignissimos
                                    alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas
                                    quis
                                    cumque minus nobis, ipsum delectus!</p>
                            </div>
                            <div class="doacao">
                                <p><span>150 </span>Doações</p>
                                <p><span>9 </span>Projetos</p>
                            </div>
                            <div class="acoes-ong">
                                <a href="../ong/perfil.php" class="saiba-mais-ong">Saiba Mais</a>
                                <div class="btn-salvar">
                                    <button id="share" class="fa-solid fa-share-nodes"
                                        onclick="abrir_popup('compartilhar-popup')"></button>
                                    <button id="like" class="fa-solid fa-heart"></button>
                                </div>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio,
                                    dignissimos
                                    alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas
                                    quis
                                    cumque minus nobis, ipsum delectus!</p>
                            </div>
                            <div class="doacao">
                                <p><span>150 </span>Doações</p>
                                <p><span>9 </span>Projetos</p>
                            </div>
                            <div class="acoes-ong">
                                <a href="../ong/perfil.php" class="saiba-mais-ong">Saiba Mais</a>
                                <div class="btn-salvar">
                                    <button id="share" class="fa-solid fa-share-nodes"
                                        onclick="abrir_popup('compartilhar-popup')"></button>
                                    <button id="like" class="fa-solid fa-heart"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-ongs">
                        <div class="card-projeto">
                            <div class="acoes-projeto">
                                <button class="btn-share fa-solid fa-share-nodes"
                                    onclick="abrir_popup('compartilhar-popup')"></button>
                                <button class="btn-like fa-solid fa-heart"
                                    onclick="abrir_popup('login-obrigatorio-popup')"></button>
                            </div>
                            <div class="img-projeto">250x130</div>
                            <div class="info-projeto">
                                <h5>Nome Projeto</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et?
                                    Repellendus perferendis provident
                                    ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores.
                                    Enim quibusdam a atque.
                                </p>
                                <div class="barra-doacao">
                                    <span>30%</span>
                                    <div class="barra">
                                        <div class="barra-verde"></div>
                                    </div>
                                </div>
                            </div>
                            <a class="saiba-mais-projeto" href="../projeto/perfil.php">Saiba Mais</a>
                        </div>

                        <div class="card-projeto">
                            <div class="acoes-projeto">
                                <button class="btn-share fa-solid fa-share-nodes"
                                    onclick="abrir_popup('compartilhar-popup')"></button>
                                <button class="btn-like fa-solid fa-heart"
                                    onclick="abrir_popup('login-obrigatorio-popup')"></button>
                            </div>
                            <div class="img-projeto">250x130</div>
                            <div class="info-projeto">
                                <h5>Nome Projeto</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et?
                                    Repellendus perferendis provident
                                    ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores.
                                    Enim quibusdam a atque.
                                </p>
                                <div class="barra-doacao">
                                    <span>30%</span>
                                    <div class="barra">
                                        <div class="barra-verde"></div>
                                    </div>
                                </div>
                            </div>
                            <a class="saiba-mais-projeto" href="../projeto/perfil.php">Saiba Mais</a>
                        </div>

                        <div class="card-projeto">
                            <div class="acoes-projeto">
                                <button class="btn-share fa-solid fa-share-nodes"
                                    onclick="abrir_popup('compartilhar-popup')"></button>
                                <button class="btn-like fa-solid fa-heart"
                                    onclick="abrir_popup('login-obrigatorio-popup')"></button>
                            </div>
                            <div class="img-projeto">250x130</div>
                            <div class="info-projeto">
                                <h5>Nome Projeto</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et?
                                    Repellendus perferendis provident
                                    ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores.
                                    Enim quibusdam a atque.
                                </p>
                                <div class="barra-doacao">
                                    <span>30%</span>
                                    <div class="barra">
                                        <div class="barra-verde"></div>
                                    </div>
                                </div>
                            </div>
                            <a class="saiba-mais-projeto" href="../projeto/perfil.php">Saiba Mais</a>


                        </div>



                        <div class="card-projeto">
                            <div class="acoes-projeto">
                                <button class="btn-share fa-solid fa-share-nodes"
                                    onclick="abrir_popup('compartilhar-popup')"></button>
                                <button class="btn-like fa-solid fa-heart"
                                    onclick="abrir_popup('login-obrigatorio-popup')"></button>
                            </div>
                            <div class="img-projeto">250x130</div>
                            <div class="info-projeto">
                                <h5>Nome Projeto</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et?
                                    Repellendus perferendis provident
                                    ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores.
                                    Enim quibusdam a atque.
                                </p>
                                <div class="barra-doacao">
                                    <span>30%</span>
                                    <div class="barra">
                                        <div class="barra-verde"></div>
                                    </div>
                                </div>
                            </div>
                            <a class="saiba-mais-projeto" href="../projeto/perfil.php">Saiba Mais</a>
                        </div>

                        <div class="card-projeto">
                            <div class="acoes-projeto">
                                <button class="btn-share fa-solid fa-share-nodes"
                                    onclick="abrir_popup('compartilhar-popup')"></button>
                                <button class="btn-like fa-solid fa-heart"
                                    onclick="abrir_popup('login-obrigatorio-popup')"></button>
                            </div>
                            <div class="img-projeto">250x130</div>
                            <div class="info-projeto">
                                <h5>Nome Projeto</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et?
                                    Repellendus perferendis provident
                                    ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores.
                                    Enim quibusdam a atque.
                                </p>
                                <div class="barra-doacao">
                                    <span>30%</span>
                                    <div class="barra">
                                        <div class="barra-verde"></div>
                                    </div>
                                </div>
                            </div>
                            <a class="saiba-mais-projeto" href="../projeto/perfil.php">Saiba Mais</a>
                        </div>

                        <div class="card-projeto">
                            <div class="acoes-projeto">
                                <button class="btn-share fa-solid fa-share-nodes"
                                    onclick="abrir_popup('compartilhar-popup')"></button>
                                <button class="btn-like fa-solid fa-heart"
                                    onclick="abrir_popup('login-obrigatorio-popup')"></button>
                            </div>
                            <div class="img-projeto">250x130</div>
                            <div class="info-projeto">
                                <h5>Nome Projeto</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et?
                                    Repellendus perferendis provident
                                    ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores.
                                    Enim quibusdam a atque.
                                </p>
                                <div class="barra-doacao">
                                    <span>30%</span>
                                    <div class="barra">
                                        <div class="barra-verde"></div>
                                    </div>
                                </div>
                            </div>
                            <a class="saiba-mais-projeto" href="../projeto/perfil.php">Saiba Mais</a>
                        </div>

                        <div class="card-projeto">
                            <div class="acoes-projeto">
                                <button class="btn-share fa-solid fa-share-nodes"
                                    onclick="abrir_popup('compartilhar-popup')"></button>
                                <button class="btn-like fa-solid fa-heart"
                                    onclick="abrir_popup('login-obrigatorio-popup')"></button>
                            </div>
                            <div class="img-projeto">250x130</div>
                            <div class="info-projeto">
                                <h5>Nome Projeto</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et?
                                    Repellendus perferendis provident
                                    ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores.
                                    Enim quibusdam a atque.
                                </p>
                                <div class="barra-doacao">
                                    <span>30%</span>
                                    <div class="barra">
                                        <div class="barra-verde"></div>
                                    </div>
                                </div>
                            </div>
                            <a class="saiba-mais-projeto" href="../projeto/perfil.php">Saiba Mais</a>
                        </div>

                        <div class="card-projeto">
                            <div class="acoes-projeto">
                                <button class="btn-share fa-solid fa-share-nodes"
                                    onclick="abrir_popup('compartilhar-popup')"></button>
                                <button class="btn-like fa-solid fa-heart"
                                    onclick="abrir_popup('login-obrigatorio-popup')"></button>
                            </div>
                            <div class="img-projeto">250x130</div>
                            <div class="info-projeto">
                                <h5>Nome Projeto</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et?
                                    Repellendus perferendis provident
                                    ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores.
                                    Enim quibusdam a atque.
                                </p>
                                <div class="barra-doacao">
                                    <span>30%</span>
                                    <div class="barra">
                                        <div class="barra-verde"></div>
                                    </div>
                                </div>
                            </div>
                            <a class="saiba-mais-projeto" href="../projeto/perfil.php">Saiba Mais</a>
                        </div>
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