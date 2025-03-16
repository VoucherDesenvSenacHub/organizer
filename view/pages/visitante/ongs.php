<?php 
    $tituloPagina = 'Descubra ONGS';
    $cssPagina = ['../global/catalogo.css'];
    require_once '../../components/header.php';
?>

<main>
    <div class="container" id="container-catalogo">
        <section id="top-info">
            <div id="info">
                <div>
                    <h1>DESCUBRA AS ONGS</h1>
                    <p>Explore organizações que estão fazendo a diferença e saiba como você pode contribuir.</p>
                    <form id="form-filtro" action="ongs.php" method="GET">
                        <!-- ### -->
                        <ul class="drop" id="esc-status">
                            <li>
                                <p>Status</p>
                                <i class="fa-solid fa-angle-down"></i>
                            </li>
                            <li>
                                <input type="checkbox" name="em-andamento" id="em-andamento">
                                <label for="em-andamento">Em andamento</label>
                            </li>
                            <li>
                                <input type="checkbox" name="concluido" id="concluido">
                                <label for="concluido">Concluído</label>
                            </li>
                        </ul>
                        <ul class="drop" id="esc-categoria">
                            <li>
                                <p>Categoria</p>
                                <i class="fa-solid fa-angle-down"></i>
                            </li>
                            <li>
                                <input type="checkbox" name="educacao" id="educacao">
                                <label for="educacao">Educação</label>
                            </li>
                            <li>
                                <input type="checkbox" name="saude" id="saude">
                                <label for="saude">Saúde</label>
                            </li>
                            <li>
                                <input type="checkbox" name="esporte" id="esporte">
                                <label for="esporte">Esporte</label>
                            </li>
                            <li>
                                <input type="checkbox" name="cultura" id="cultura">
                                <label for="cultura">Cultura</label>
                            </li>
                            <li>
                                <input type="checkbox" name="tecnologia" id="tecnologia">
                                <label for="tecnologia">Tecnologia</label>
                            </li>
                            <li>
                                <input type="checkbox" name="ambiente" id="ambiente">
                                <label for="ambiente">Meio Ambiente</label>
                            </li>
                            <li>
                                <input type="checkbox" name="animal" id="animal">
                                <label for="animal">Proteção Animal</label>
                            </li>
                            <li>
                                <input type="checkbox" name="direitos" id="direitos">
                                <label for="direitos">Direitos Humanos</label>
                            </li>
                        </ul>
                        <ul class="drop" id="esc-regiao">
                            <li>
                                <p>Região</p>
                                <i class="fa-solid fa-angle-down"></i>
                            </li>
                            <li>
                                <input type="checkbox" name="centro-oeste" id="centro-oeste">
                                <label for="centro-oeste">Centro-Oeste</label>
                            </li>
                            <li>
                                <input type="checkbox" name="norte" id="norte">
                                <label for="norte">Norte</label>
                            </li>
                            <li>
                                <input type="checkbox" name="nordeste" id="nordeste">
                                <label for="nordeste">Nordeste</label>
                            </li>
                            <li>
                                <input type="checkbox" name="sudeste" id="sudeste">
                                <label for="sudeste">Sudeste</label>
                            </li>
                            <li>
                                <input type="checkbox" name="sul" id="sul">
                                <label for="sul">Sul</label>
                            </li>
                        </ul>
                        <button class="btn">Filtrar</button>
                    </form>
                </div>
                <form id="form-busca" action="ongs.php" method="GET">
                    <input type="text" name="pesquisa" placeholder="Busque uma ONG" required>
                    <button class="btn"><i class="fa-solid fa-search"></i></button>
                </form>
            </div>
            <div id="imagem-top">
                <img src="../../assets/images/pages/tela-ong-team.png" alt="">
            </div>
        </section>
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
                    <a href="#" class="saiba-mais-ong">Saiba Mais</a>
                    <div class="btn-salvar">
                        <div class="share">
                            <i class="fa-solid fa-share-nodes"></i>
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
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
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos
                        alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis
                        cumque minus nobis, ipsum delectus!</p>
                </div>
                <div class="doacao">
                    <p><span>150 </span>Doações</p>
                    <p><span>9 </span>Projetos</p>
                </div>
                <div class="acoes-ong">
                    <a href="#" class="saiba-mais-ong">Saiba Mais</a>
                    <div class="btn-salvar">
                        <div class="share">
                            <i class="fa-solid fa-share-nodes"></i>
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
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
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos
                        alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis
                        cumque minus nobis, ipsum delectus!</p>
                </div>
                <div class="doacao">
                    <p><span>150 </span>Doações</p>
                    <p><span>9 </span>Projetos</p>
                </div>
                <div class="acoes-ong">
                    <a href="#" class="saiba-mais-ong">Saiba Mais</a>
                    <div class="btn-salvar">
                        <div class="share">
                            <i class="fa-solid fa-share-nodes"></i>
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
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
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos
                        alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis
                        cumque minus nobis, ipsum delectus!</p>
                </div>
                <div class="doacao">
                    <p><span>150 </span>Doações</p>
                    <p><span>9 </span>Projetos</p>
                </div>
                <div class="acoes-ong">
                    <a href="#" class="saiba-mais-ong">Saiba Mais</a>
                    <div class="btn-salvar">
                        <div class="share">
                            <i class="fa-solid fa-share-nodes"></i>
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
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
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos
                        alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis
                        cumque minus nobis, ipsum delectus!</p>
                </div>
                <div class="doacao">
                    <p><span>150 </span>Doações</p>
                    <p><span>9 </span>Projetos</p>
                </div>
                <div class="acoes-ong">
                    <a href="#" class="saiba-mais-ong">Saiba Mais</a>
                    <div class="btn-salvar">
                        <div class="share">
                            <i class="fa-solid fa-share-nodes"></i>
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
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
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati qui odio, dignissimos
                        alias ut, nesciunt deserunt maiores at adipisci modi dolor inventore suscipit quas quis
                        cumque minus nobis, ipsum delectus!</p>
                </div>
                <div class="doacao">
                    <p><span>150 </span>Doações</p>
                    <p><span>9 </span>Projetos</p>
                </div>
                <div class="acoes-ong">
                    <a href="#" class="saiba-mais-ong">Saiba Mais</a>
                    <div class="btn-salvar">
                        <div class="share">
                            <i class="fa-solid fa-share-nodes"></i>
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
    $jsPagina = [];
    require_once '../../components/footer.php';
?>