<?php 
    $tituloPagina = '';
    $cssPagina = ['visitante/ongs.css'];
    require_once '../../components/header.php';
?>

    <main>
        <div class="container" id="container-ongs">
            <div id="top-info">
                <div id="info">
                    <h1>ENCONTRE PROJETOS</h1>
                    <p>Explore projetos inspiradores e apoie causas e faça a diferença hoje mesmo.</p>
                    <form action="projetos.php" method="GET">
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
                <div id="imagem-ong">
                    <img src="../../assets/images/pages/tela-projeto-kids.png" alt="">
                </div>
            </div>
            <div id="box-ongs">
                <div class="card-projeto">
                    <div class="acoes-projeto">
                        <div class="share">
                            <i class="fa-solid fa-share-nodes"></i>
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>
                    <div class="img-projeto">250x130</div>
                    <div class="info-projeto">
                        <h5>Nome Projeto</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                            ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                        </p>
                        <div class="barra-doacao">
                            <span>30%</span>
                            <div class="barra">
                                <div class="barra-verde"></div>
                            </div>
                        </div>
                    </div>
                    <a class="saiba-mais-projeto" href="#">Saiba Mais</a>
                </div>
                <div class="card-projeto">
                    <div class="acoes-projeto">
                        <div class="share">
                            <i class="fa-solid fa-share-nodes"></i>
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>
                    <div class="img-projeto">250x130</div>
                    <div class="info-projeto">
                        <h5>Nome Projeto</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                            ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                        </p>
                        <div class="barra-doacao">
                            <span>30%</span>
                            <div class="barra">
                                <div class="barra-verde"></div>
                            </div>
                        </div>
                    </div>
                    <a class="saiba-mais-projeto" href="#">Saiba Mais</a>
                </div>
                <div class="card-projeto">
                    <div class="acoes-projeto">
                        <div class="share">
                            <i class="fa-solid fa-share-nodes"></i>
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>
                    <div class="img-projeto">250x130</div>
                    <div class="info-projeto">
                        <h5>Nome Projeto</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                            ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                        </p>
                        <div class="barra-doacao">
                            <span>30%</span>
                            <div class="barra">
                                <div class="barra-verde"></div>
                            </div>
                        </div>
                    </div>
                    <a class="saiba-mais-projeto" href="#">Saiba Mais</a>
                </div>
                <div class="card-projeto">
                    <div class="acoes-projeto">
                        <div class="share">
                            <i class="fa-solid fa-share-nodes"></i>
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>
                    <div class="img-projeto">250x130</div>
                    <div class="info-projeto">
                        <h5>Nome Projeto</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                            ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                        </p>
                        <div class="barra-doacao">
                            <span>30%</span>
                            <div class="barra">
                                <div class="barra-verde"></div>
                            </div>
                        </div>
                    </div>
                    <a class="saiba-mais-projeto" href="#">Saiba Mais</a>
                </div>
                <div class="card-projeto">
                    <div class="acoes-projeto">
                        <div class="share">
                            <i class="fa-solid fa-share-nodes"></i>
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>
                    <div class="img-projeto">250x130</div>
                    <div class="info-projeto">
                        <h5>Nome Projeto</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                            ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                        </p>
                        <div class="barra-doacao">
                            <span>30%</span>
                            <div class="barra">
                                <div class="barra-verde"></div>
                            </div>
                        </div>
                    </div>
                    <a class="saiba-mais-projeto" href="#">Saiba Mais</a>
                </div>
                <div class="card-projeto">
                    <div class="acoes-projeto">
                        <div class="share">
                            <i class="fa-solid fa-share-nodes"></i>
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>
                    <div class="img-projeto">250x130</div>
                    <div class="info-projeto">
                        <h5>Nome Projeto</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                            ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                        </p>
                        <div class="barra-doacao">
                            <span>30%</span>
                            <div class="barra">
                                <div class="barra-verde"></div>
                            </div>
                        </div>
                    </div>
                    <a class="saiba-mais-projeto" href="#">Saiba Mais</a>
                </div>
                <div class="card-projeto">
                    <div class="acoes-projeto">
                        <div class="share">
                            <i class="fa-solid fa-share-nodes"></i>
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>
                    <div class="img-projeto">250x130</div>
                    <div class="info-projeto">
                        <h5>Nome Projeto</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                            ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                        </p>
                        <div class="barra-doacao">
                            <span>30%</span>
                            <div class="barra">
                                <div class="barra-verde"></div>
                            </div>
                        </div>
                    </div>
                    <a class="saiba-mais-projeto" href="#">Saiba Mais</a>
                </div>
                <div class="card-projeto">
                    <div class="acoes-projeto">
                        <div class="share">
                            <i class="fa-solid fa-share-nodes"></i>
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>
                    <div class="img-projeto">250x130</div>
                    <div class="info-projeto">
                        <h5>Nome Projeto</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                            ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                        </p>
                        <div class="barra-doacao">
                            <span>30%</span>
                            <div class="barra">
                                <div class="barra-verde"></div>
                            </div>
                        </div>
                    </div>
                    <a class="saiba-mais-projeto" href="#">Saiba Mais</a>
                </div>
            </div>
        </div>
    </main>

<?php
    $jsPagina = [];
    require_once '../../components/footer.php';
?>