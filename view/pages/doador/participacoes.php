<?php
require_once '../../../controller/verificarLoginDoador.php';
$tituloPagina = 'Participações'; // Definir o título da página
$cssPagina = ['doador/participacoes.css']; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
require_once '../../components/layout/base-inicio.php';
require_once __DIR__ . "\..\..\..\model\ProjetoModel.php";

?>

<main>
    <section>
        <div class="container">
            <div id="secao-1">
                <h1>SUAS PARTICIPAÇÕES</h1>
                <h3>Projetos</h3>
                <a href="../projeto/perfil.php">
                    <div class="cards-participacao">
                        <div class="cards-projeto">
                            <div class="card-participacao">
                                <img src="../../assets/images/projeto-sem-foto.png" alt="Imagem do projeto">
                                <div class="info-card">
                                    <div class="info-cima">
                                        <div>
                                            <h3 class="titulo-projeto">Nome do Projeto</h3>
                                            <p class="projeto">Projeto</p>
                                        </div>
                                        <p class="ong-responsavel">Ong Responsável</p>
                                    </div>
                                    <div class="info-baixo">
                                        <ul>
                                            <li>Saúde</li>
                                            <li>Ambiente</li>
                                            <li>Esporte</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                </a>
                <a href="../projeto/perfil.php">
                    <div class="card-participacao">
                        <img src="../../assets/images/projeto-sem-foto.png" alt="Imagem do projeto">
                        <div class="info-card">
                            <div class="info-cima">
                                <div>
                                    <h3 class="titulo-projeto">Nome do Projeto</h3>
                                    <p class="projeto">Projeto</p>
                                </div>
                                <p class="ong-responsavel">Ong Responsável</p>
                            </div>
                            <div class="info-baixo">
                                <ul>
                                    <li>Saúde</li>
                                    <li>Ambiente</li>
                                    <li>Esporte</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="../projeto/perfil.php">
                    <div class="card-participacao">
                        <img src="../../assets/images/projeto-sem-foto.png" alt="Imagem do projeto">
                        <div class="info-card">
                            <div class="info-cima">
                                <div>
                                    <h3 class="titulo-projeto">Nome do Projeto</h3>
                                    <p class="projeto">Projeto</p>
                                </div>
                                <p class="ong-responsavel">Ong Responsável</p>
                            </div>
                            <div class="info-baixo">
                                <ul>
                                    <li>Saúde</li>
                                    <li>Ambiente</li>
                                    <li>Esporte</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="../projeto/perfil.php">
                    <div class="card-participacao">
                        <img src="../../assets/images/projeto-sem-foto.png" alt="Imagem do projeto">
                        <div class="info-card">
                            <div class="info-cima">
                                <div>
                                    <h3 class="titulo-projeto">Nome do Projeto</h3>
                                    <p class="projeto">Projeto</p>
                                </div>
                                <p class="ong-responsavel">Ong Responsável</p>
                            </div>
                            <div class="info-baixo">
                                <ul>
                                    <li>Saúde</li>
                                    <li>Ambiente</li>
                                    <li>Esporte</li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </a>
        <h3>Ongs</h3>
        <a href="../ong/perfil.php">
            <div class="cards-participacao">
                <div class="cards-projeto">
                    <div class="card-participacao">
                        <img src="../../assets/images/projeto-sem-foto.png" alt="Imagem do projeto">
                        <div class="info-card">
                            <div class="info-cima">
                                <div>
                                    <h3 class="titulo-ong">Nome da ONG</h3>
                                    <p class="projeto-de-ong">ONG</p>
                                </div>
                                <p><span>9</span> Projetos</p>
                            </div>
                            <div class="info-baixo">
                                <ul>
                                    <li>Saúde</li>
                                    <li>Ambiente</li>
                                    <li>Esporte</li>
                                </ul>
                            </div>
                        </div>
                    </div>
        </a>
        <a href="../ong/perfil.php">
            <div class="card-participacao">
                <img src="../../assets/images/projeto-sem-foto.png" alt="Imagem do projeto">
                <div class="info-card">
                    <div class="info-cima">
                        <div>
                            <h3 class="titulo-ong">Nome da ONG</h3>
                            <p class="projeto-de-ong">ONG</p>
                        </div>
                        <p><span>9</span> Projetos</p>
                    </div>
                    <div class="info-baixo">
                        <ul>
                            <li>Saúde</li>
                            <li>Ambiente</li>
                            <li>Esporte</li>
                        </ul>
                    </div>
                </div>
            </div>
        </a>
        <a href="../ong/perfil.php">
            <div class="card-participacao">
                <img src="../../assets/images/projeto-sem-foto.png" alt="Imagem do projeto">
                <div class="info-card">
                    <div class="info-cima">
                        <div>
                            <h3 class="titulo-ong">Nome da ONG</h3>
                            <p class="projeto-de-ong">ONG</p>
                        </div>
                        <p><span>9</span> Projetos</p>
                    </div>
                    <div class="info-baixo">
                        <ul>
                            <li>Saúde</li>
                            <li>Ambiente</li>
                            <li>Esporte</li>
                        </ul>
                    </div>
                </div>
            </div>
        </a>
        <a href="../ong/perfil.php">
            <div class="card-participacao">
                <img src="../../assets/images/projeto-sem-foto.png" alt="Imagem do projeto">
                <div class="info-card">
                    <div class="info-cima">
                        <div>
                            <h3 class="titulo-ong">Nome da ONG</h3>
                            <p class="projeto-de-ong">ONG</p>
                        </div>
                        <p><span>9</span> Projetos</p>
                    </div>
                    <div class="info-baixo">
                        <ul>
                            <li>Saúde</li>
                            <li>Ambiente</li>
                            <li>Esporte</li>
                        </ul>
                    </div>
                </div>
            </div>
        </a>
        </div>
        </div>
        </div>
        </div>
    </section>
</main>

<?php
// $jsPagina = ['home-doador.js'];
require_once '../../components/footer.php';
?>