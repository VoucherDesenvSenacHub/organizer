<?php
$tituloPagina = 'Projetos'; // Definir o título da página
$cssPagina = ['ong/projetos.css']; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
require_once '../../components/header.php';
?>
<!-- COMEÇAR SEU CÓDIGO AQUI -->
<div id="principal">
    <div class="header-principal">
        <div>
            <h1>PROJETOS DA SUA ONG</h1>
        </div>
        <div class="div-input-lupa">
            <input class="input-buscar-projetos" type="text" id="buscar" placeholder="Buscar"><br>
            <img class="lupa-input" src="../../assets/images/lupa-cinza.png" alt="">
        </div>
        <div>
            <button class="botao-novo-projeto" id="novoProjetoBtn">Novo Projeto</button>
        </div>
    </div>

    <!-- cards -->
    <div class="div-card-geral">
        <div class="card">
            <img class="img-card" src="../../assets/images/foto-projeto-card.png" alt="">
            <p>Campanha Solidária</p>
            <a href="./visualizar-projetos.php"><button class="btn-card">Visualizar</button></a>
        </div>

        <div class="card">
            <img class="img-card" src="../../assets/images/foto-projeto-card.png" alt="">
            <p>Campanha Solidária</p>
            <a href="./visualizar-projetos.php"><button class="btn-card">Visualizar</button></a>
        </div>

        <div class="card">
            <img class="img-card" src="../../assets/images/foto-projeto-card.png" alt="">
            <p>Campanha Solidária</p>
            <a href="./visualizar-projetos.php"><button class="btn-card">Visualizar</button></a>
        </div>

        <div class="card">
            <img class="img-card" src="../../assets/images/foto-projeto-card.png" alt="">
            <p>Campanha Solidária</p>
            <a href="./visualizar-projetos.php"><button class="btn-card">Visualizar</button></a>
        </div>

        <div class="card">
            <img class="img-card" src="../../assets/images/foto-projeto-card.png" alt="">
            <p>Campanha Solidária</p>
            <a href="./visualizar-projetos.php"><button class="btn-card">Visualizar</button></a>
        </div>

        <div class="card">
            <img class="img-card" src="../../assets/images/foto-projeto-card.png" alt="">
            <p>Campanha Solidária</p>
            <a href="./visualizar-projetos.php"><button class="btn-card">Visualizar</button></a>
        </div>
    </div>



</div>

<!-- tela para Novo Projeto -->
<div id="tela-de-criacao-projeto" class="tela-de-criacao-projeto">
    <div class="tela-de-criacao-projeto-fundo">
        <div class="tela-de-criacao-projeto-conteudo">


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
                            <input type="text" id="metaProjeto" placeholder="R$00,00">
                            <img class="lapis-input" src="../../assets/images/lapis.png" alt="">
                        </div>
                    </div>

                </div>
            </div>


            <div>
                <label for="preco">Preços</label><br>

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
                    <img class="img-add" src="../../assets/images/icon-upload.png" alt="">
                    <button class="upload">Upload de Fotos</button>
                </div>
            </div>
            <div class="div-botao-add">
                <button class="botao-salvar" id="salvarprojeto">Salvar Projeto</button>
                <img class="img-add" id="salvarprojeto" src="../../assets/images/add.png" alt="">
            </div>
        </div>

    </div>

</div>

<!-- tela confirmação de projeto criado -->
<div class="tela-confirma-criacao" id="tela-confirma-criacao">
    <div class="card-confirma-criacao">
        <div class="div-projeto-criado">
            <h2 class="titulo-projeto-criado">Projeto Criado</h2>
            <img class="img-check" src="../../assets/images/Check.png" alt="">
        </div>
        <button href="./visualizar-projetos.php" class="btn-card">Visualizar</button>
    </div>
</div>

<?php
$jsPagina = ['projetos-ong.js']; //Colocar o arquivo .js (exemplo: 'cadastro.js')
require_once '../../components/footer.php';
?>