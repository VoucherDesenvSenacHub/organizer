<!-- PEGAR A BASE NO README.md -->

<?php 
    $tituloPagina = 'Home | Organizer'; // Definir o título da página
    $cssPagina = ['doador/favoritos-logado.css']; //Colocar o arquivo .css 
    require_once '../../components/header.php';
?>
<main>

        <section class="secoes" id="secao-2">
            <div class="container">
                <h1>MEUS FAVORITOS</h1>
                
                    <div id="buttons">
                        <button class="rs">ONGS <img src= "../../assets/images/medalha-icon.png" alt=""> </button>
                        <button class="rs">PROJETO <img src="../../assets/images/medalha-icon.png" alt=""></button>
                    </div>
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
                            <div class="btn-salvar">
                                <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
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
                            <div class="btn-salvar">
                                <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                                <button id="like" class="fa-solid fa-heart" ></button>
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
                            <a href="perfil-ong.php" class="saiba-mais-ong">Saiba Mais</a>
                            <div class="btn-salvar">
                                <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
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
                            <div class="btn-salvar">
                                <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                                <button id="like" class="fa-solid fa-heart" ></button>
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
                            <a href="perfil-ong.php" class="saiba-mais-ong">Saiba Mais</a>
                            <div class="btn-salvar">
                                <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                                <button id="like" class="fa-solid fa-heart" ></button>
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
                            <a href="perfil-ong.php" class="saiba-mais-ong">Saiba Mais</a>
                            <div class="btn-salvar">
                                <button id="share" class="fa-solid fa-share-nodes" onclick="abrir_popup('compartilhar-popup')"></button>
                                <button id="like" class="fa-solid fa-heart" ></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main> 

<?php
    $jsPagina = []; //Colocar o arquivo .js
    require_once '../../components/footer.php';
?>



<!-- PEGAR A BASE NO README.md -->