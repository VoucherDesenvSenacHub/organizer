<?php 
    $tituloPagina = 'Projeto'; // Definir o título da página
    $cssPagina = ['ong/visualizar-projetos.css']; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header-ong.php';
?>
<!-- COMEÇAR SEU CÓDIGO AQUI -->
<div id="principal">
            <div class="header-principal">
                <div class="info-projeto-editar">
                    <div class="info-projeto">
                        <h1>Campanha Solidária</h1>
                        <img class="img-meta" src="../../assets/images/Meta.png" alt="">
                        <p>Meta: <b>R$ 100.000</b> </p>
                        <p>Status: Em progresso <b>(20% alcançado)</b></p>
                        <p><b>24</b> Doações Recebidas</p>
                    </div>
                    <div class="div-img-edicao">
                        <img src="../../assets/images/img-projeto-edicao.png" alt="">
                    </div>
                </div>
            </div>

            <div class="div-botao-editar-inativar">
                <div class="div-botao-editar">
                    <button id="editarprojeto" class="btn-editar" >Editar</button>
                    <img src="../../assets/images/editar.png" alt="">
                </div>
                <div class="div-botao-inativar">
                    <button id="inativar-projeto" class="btn-inativar">Inativar</button>
                    <img src="../../assets/images/lixeira.png" alt="">
                </div>
            </div>

            <div class="sobre-projeto">
                <div class="div-btn-sobre">
                    <button class="btn-sobre">Sobre</button>
                    <img class="img-sobre" src="../../assets/images/interrogacao.png" alt="">
                </div>
                <p>Projeto criado em: 04/08/2023</p>
                <textarea name="" id="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur qui quasi accusamus ipsa inventore deserunt perspiciatis unde dolorum reiciendis officia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur qui quasi accusamus ipsa inventore deserunt perspiciatis unde dolorum reiciendis officia? </textarea>
            </div>
            
        </div>

       <!-- tela para editar Projeto -->
    <div id="tela-de-edicao-projeto" class="tela-de-edicao-projeto">
        <div class="tela-de-edicao-projeto-fundo">
            <div class="tela-de-edicao-projeto-conteudo">


                <div>
                    <h2 class="titulo-tela-criacao">Novo Projeto</h2>

                    <div class="div-form">
                    
                    
                    <div>
                        <label for="nomeProjeto">Nome</label><br>
                        <div class="div-input-lapis">
                            <img class="img-perfil" src="../../assets/images/img-perfil-input.png" alt="">
                            <input type="text" id="nomeProjeto" placeholder="Novo Projeto">
                            <img class="lapis-input" src="../../assets/images/lapis.png" alt="">
                        </div>
                    </div>

                    <div>
                        <label for="metaProjeto">Meta de Doações</label><br>
                        <div class="div-input-lapis">
                            <img class="img-cifrao" src="../../assets/images/cifrao.png" alt="">
                            <input type="text" id ="metaProjeto" placeholder="R$00,00">     
                            <img class="lapis-input" src="../../assets/images/lapis.png" alt="">
                        </div>   
                    </div>           
                    
                    </div>
                </div>

                    
                <div>
                    <label class="preco" for="preco">Preços</label><br>

                    <select id="preco">
                    <option value="preco">Preços</option>
                    <option value="10,00">10,00</option>
                    <option value="20,00">20,00</option>
                    <option value="30,00">30,00</option>
                    <option value="50,00">50,00</option>
                    </select>
                </div>
            
                <div class="div-input-lapis">
                    <label for="descricaoProjeto">Descrição</label><br>
                    <textarea id="descricaoProjeto" name="descricaoProjeto"></textarea><br>
                    <img class="lapis-input" src="../../assets/images/lapis.png" alt="">
                </div>
            

            </div>

            <div class="conteudo-lado-direito">
                <div class="div-img-botao">
                    <img class="img-tela-de-criacao" src="../../assets/images/foto-projeto-card.png" alt="">
                    <div class="div-botao-uploud">
                        <img class="img-add" src="../../assets/images/uploud.png" alt="">
                        <button class="upload">Upload de Fotos</button>
                    </div>                    
                </div>
                <div class="div-botao-salvar-ateracao">
                <button class="botao-salvar-alteracao" id="salvar-alteracao-projeto">Salvar Alterações</button>
                <img class="img-editar" id="salvar-alteracao-projeto" src="../../assets/images/editar.png" alt="">
                </div>
            </div>

        </div>
        
    </div>

    <!-- tela confirmação de projeto alterado -->
    <div class="tela-confirma-edicao" id="tela-confirma-edicao">
        <div class="card-confirma-edicao">
            <div class="div-projeto-editado">
            <h2 class="titulo-projeto-editado">Projeto Alterado</h2>
            <img class="img-check" src="../../assets/images/Check.png" alt="">
            </div>
            <a href="visualizar-projetos.php">
            <button class="btn-card"> Visualizar</button>
            </a>        
        </div>
     </div>

     <!-- tela para inativar Projeto -->
    <div id="tela-inativa-projeto" class="tela-inativa-projeto">
        <div class="tela-inativa-projeto-fundo">
            <div class="tela-inativa-projeto-conteudo">


                <div>
                    <h1 class="titulo-tela-criacao">INFORME O MOTIVO DE INATIVAR ESSE PROJETO</h1>

                    <div class="quadro">
                        <h2>Escolha:</h2>
                        <ul class="opcoes">
                            <li>Falta de recursos financeiros</li>
                            <li>Mudança na missão ou objetivos da ONG</li>
                            <li>Falta de voluntários</li>
                            <li>Baixo impacto ou relevância</li>
                            <li>Problemas operacionais</li>
                            <li>Motivos internos da ONG</li>
                        </ul>
                    </div>
                    
                    <div class="div-input-lapis">
                        <label for="descricaoProjeto">Mensagem</label><br>
                        <textarea id="descricaoProjeto" name="descricaoProjeto"></textarea><br>
                    </div>
                    <div class="div-btn-inativar">
                        <button id="btn-inativa" class="btn-inativa">Inativar</button>
                    </div>
                </div>
            </div>    
        </div>
        
    </div>

    <!-- tela confirmação de projeto inativado -->
    <div class="tela-confirmacao-inativacao" id="confirmacao-inativa">
        <div class="card-confirma-inativacao">
            <div class="div-confirma-inativacao">
                <div><img class="img-lixeira" src="../../assets/images/delete.png" alt=""></div>
                <div><h2 class="titulo-confirma-inativacao">Seu Projeto foi Inativado</h2></div>            
            </div>        
        </div>
     </div>

<?php
    $jsPagina = ['visualizar-projetos-ong.js']; //Colocar o arquivo .js (exemplo: 'cadastro.js')
    require_once '../../components/footer.php';
?>