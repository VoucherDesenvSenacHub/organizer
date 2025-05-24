<?php
    $tituloPagina = 'Perfil da ONG'; // Definir o título da página
    $cssPagina = ["adm/perfil-ong.css"]; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header-adm.php';
?>

<!-- Início DIV principal -->
<div id="principal">

    <div class="card">

        <div class="cima">
            <div class="img">
                <img class="imagemONG" src="../../assets/images/Slide-4.png">
            </div>

            <div class="titulo">
                <div>
                    <h1>ONG TODOS JUNTOS</h1>
                    <h2>Arrecadado: R$50.000</h2>
                    <h3>87 doações recebidas</h3>
                </div>

                <button class="botao">Inativar
                    <img src="../../assets/images/lixeira.png">
                </button>
                <span>saúde</span>
            </div>
        </div>

        <div></div>

        <div class="baixo">
            <div class="doadores">

                <p style="margin: 2%;">
                    <img class="moeda" src="../../assets/images/moeda.jpg">
                    Doadores
                </p>

                <div class="lista">
                    <div class="nomes">
                        <img src="../../assets/images/usuario.png">
                        <div class="margin_nome">
                            João
                        </div>
                        <span>R$102</span>

                    </div>

                    <div class="nomes">
                        <img src="../../assets/images/usuario.png">
                        <div class="margin_nome">
                            Maria
                        </div>
                        <span>R$112</span>
                    </div>

                    <div class="nomes">
                        <img src="../../assets/images/usuario.png">
                        <div class="margin_nome">
                            Pedro
                        </div>
                        <span>R$102</span>
                    </div>

                    <div class="nomes">
                        <img src="../../assets/images/usuario.png">
                        <div style="margin-left: 2px;" class="margin_nome">
                            Carlos
                        </div>
                        <span>R$102</span>
                    </div>

                    <div class="nomes">
                        <img src="../../assets/images/usuario.png">
                        <div class="margin_nome">
                            Bruna
                        </div>
                        <span>R$102</span>
                    </div>
                    <p> Ver todos</p>
                </div>
            </div>

            <div class="sobre">
                <p>
                    <img class="interrogação" src="../../assets/images/interrogação.png" alt="">
                    Sobre
                </p>
                <div class="letra">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Consequuntur qui quasi accusamus ipsa inventore deserunt
                    perspiciatis unde dolorum reiciendis officia?
                </div>
                <p class="criacao">Ong criada em: 12/04/2023</p>
            </div>

        </div>

        <div></div>

        <div class="baixo2">
            <div class="voluntario">
                <p style="margin: 2%;">
                    <img class="abraco" src="../../assets/images/voluntarios.png">
                    Voluntários
                <p>

                <div class="lista_voluntarios">
                    <div class="nomes">
                        <img src="../../assets/images/logovoluntario.png">
                        <div class="margin_voluntarios">
                            João
                            <span>Apoiando o projeto tal</span>
                        </div>

                    </div>

                    <div class="nomes_voluntarios">
                        <img src="../../assets/images/logovoluntario.png">
                        <div class="margin_voluntarios">
                            Maria
                            <span>Apoiando o projeto tal</span>
                        </div>
                    </div>

                    <div class="nomes_voluntarios">
                        <img src="../../assets/images/logovoluntario.png">
                        <div class="margin_voluntarios">
                            Pedro
                            <span>Apoiando o projeto tal</span>
                        </div>
                    </div>

                    <div class="nomes_voluntarios">
                        <img src="../../assets/images/logovoluntario.png">
                        <div class="margin_voluntarios">
                            Carlos
                            <span>Apoiando o projeto tal</span>
                        </div>
                    </div>

                    <div class="nomes_voluntarios">
                        <img src="../../assets/images/logovoluntario.png">
                        <div class="margin_voluntarios">
                            Bruna
                            <span>Apoiando o projeto tal</span>
                        </div>
                    </div>
                    <p> Ver todos</p>
                </div>
            </div>

            <div class="projeto">
                <p>
                    <img class="lampada" src="../../assets/images/projetos-removebg-preview.png">
                    Projetos
                </p>

                <div class="lista_projeto">
                    <div class="projetinhos">
                        <img src="../../assets/images/fotofoto.png">
                        <div class="textos">
                            <h5>Campanha Solidária</h5>

                            <div class="porcentagem">
                                <p>50%</p>
                                <div class="barra">
                                    <div class="verde"></div>
                                </div>
                            </div>

                            <div>
                                <span class="quantitativo">24 doações recebidas</span>
                            </div>

                        </div>
                    </div>

                    <div class="projetinhos">
                        <img src="../../assets/images/fotofoto.png">
                        <div class="textos">
                            <h5>Nome do Projeto</h5>

                            <div class="porcentagem">
                                <p>50%</p>
                                <div class="barra">
                                    <div class="verde"></div>
                                </div>
                            </div>

                            <div>
                                <span class="quantitativo">24 doações recebidas</span>
                            </div>

                        </div>
                    </div>

                    <div class="projetinhos">
                        <img src="../../assets/images/fotofoto.png">
                        <div class="textos">
                            <h5>Nome do Projeto</h5>

                            <div class="porcentagem">
                                <p>50%</p>
                                <div class="barra">
                                    <div class="verde"></div>
                                </div>
                            </div>

                            <div>
                                <span class="quantitativo">24 doações recebidas</span>
                            </div>

                        </div>
                    </div>

                    <p class="ver"> Ver todos</p>
                </div>
            </div>
        </div>

        <div></div>

        <div class="baixo3">
            <div class="contato">
                <p style="margin: 1%;">
                    <img class="autofalante" src="../../assets/images/autofalante-removebg-preview.png">
                    Contato
                </p>
                <div class="letra_contato">
                    Entre em contato com os responsáveis dessa ONG para mais informações
                </div>
                <div class="telefone">
                    <p class="letra_telefone">
                        <img class="cell" src="../../assets/images/telefone2.0.png" alt="">
                        Telefone:
                        <span style="font-size: 15px; color:#000000c9;">(00)00000-0000</span>
                    </p>
                </div>

                <div></div>

                <div class="telefone">
                    <p class="letra_telefone">
                        <img class="cell" src="../../assets/images/email2.0.png">
                        E-mail:
                        <span style="font-size: 15px; color:#000000c9;">ong@organizer.com </span>
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!-- Fim DIV principal  -->


    <?php
    $jsPagina = []; //Colocar o arquivo .js (exemplo: 'cadastro.js')
    require_once '../../components/footer.php';
    ?>