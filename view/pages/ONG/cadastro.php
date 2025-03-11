<?php 
    $tituloPagina = 'Cadastro ONG'; // Definir o título da página
    $cssPagina = ['ONG/cadastro.css']; //Colocar o arquivo .css 
    require_once '../../components/header.php';
?>
        <!-- Fim cabeçalho -->


    <!-- Início DIV Cadastro -->
    <div id="cadastro">
        <div id="cadastro-ong">
            <div class="titulo-cadastro">
                <h1>CADASTRO</h1>
            </div>
            <div class="progress">
                <img src="../../assets/images/progress-1.png" alt="">
            </div>
            <div id="text-progress">
                <div class="text-detalhes">Dados<br>da ONG</div>
                <div class="text-detalhes-draft">Descrição</div>
                <div class="text-detalhes-draft">Endereço</div>
                <div class="text-detalhes-draft">Responsável</div>
                <div class="text-detalhes-draft">Banco</div>
                <div class="text-detalhes-draft">Login</div>
            </div>
            <form class="form-cadastro">
                <div>
                    <label for="rSocial">Razão Social</label><br>
                    <input type="text" id="rSocial" placeholder="Digite o nome">
                </div>
                <div>
                    <label for="telefone">CEP</label><br>
                    <input type="tel" id="foneOng" placeholder="(00) 0000-0000">
                </div>
                <div>
                    <label for="cnpj">CNPJ</label><br>
                    <input type="text" id="cnpj" placeholder="00.000.000/0000-00">
                </div>
                <div>
                    <label for="email">Email</label><br>
                    <input type="email" id="mailOng" placeholder="usuario@conta.com">
                </div>
            <div class="btn-navegacao-first">
                <button id="proximo-1">Próximo</button>
            </div>
        </div>
    </div>
    <!-- Fim DIV Cadastro  -->

    <!-- Início Atuação da ONG -->
    <div id="atuacao">
        <div class="titulo-atuacao">
            <h1>ATUAÇÃO DA ONG</h1>
        </div>
        <div class="progress">
                <img src="../../assets/images/progress-2.png" alt="">
        </div>
        <div id="text-progress">
            <div class="text-detalhes">Dados<br>da ONG</div>
            <div class="text-detalhes">Descrição</div>
            <div class="text-detalhes-draft">Endereço</div>
            <div class="text-detalhes-draft">Responsável</div>
            <div class="text-detalhes-draft">Banco</div>
            <div class="text-detalhes-draft">Login</div>
        </div>
        <div>
            <label for="descricao">Descrição</label><br>
            <textarea id="descricao-ong" placeholder="Um breve resumo da sua ONG"></textarea><br>
        </div>
        <div id="areasDeAtuacao">
        <p>Áreas de atuação</p>
            <div class="row-checkbox">
                <div class="opt-atuacao">
                    <input type="checkbox" id="saude" value="saude" name="saude">
                    <label for="saude">Saúde</label>
                </div>
                <div class="opt-atuacao">
                    <input type="checkbox" id="esporte" value="esporte" name="esporte">
                    <label for="esporte">Esporte</label>
                </div>
                <div class="opt-atuacao">
                    <input type="checkbox" id="meioAmbiente" value="meioAmbiente" name="meioAmbiente">
                    <label for="meioAmbiente">Meio Ambiente</label>
                </div>
                <div class="opt-atuacao">
                    <input type="checkbox" id="tecnologia" value="tecnologia" name="tecnologia">
                    <label for="tecnologia">Tecnologia</label>
                </div>
            </div>
            <div class="row-checkbox">
                <div class="opt-atuacao">
                    <input type="checkbox" id="educacao" value="educacao" name="educacao">
                    <label for="educacao">Educação</label>
                </div>
                <div class="opt-atuacao">
                    <input type="checkbox" id="cultura" value="cultura" name="cultura">
                    <label for="cultura">Cultura</label>
                </div>
                <div class="opt-atuacao">
                    <input type="checkbox" id="protAnimal" value="protAnimal" name="protAnimal">
                    <label for="protAnimal">Proteção Animal</label>
                </div>
                <div class="opt-atuacao">
                    <input type="checkbox" id="dirHumanos" value="dirHumanos" name="dirHumanos">
                    <label for="dirHumanos">Direitos Humanos</label>
                </div>
            </div>
        </div>
        <div class="btn-navegacao">
            <a href="cadastro.html"><button class="voltar">Voltar</button></a>
            <a href="endereco.html"><button class="proximo">Próximo</button></a>
        </div>
    </div>
                
    </form>
    </div>
    <!-- Fim Atuação da ONG -->
    <?php
        $jsPagina = ['ongs.js']; //Colocar o arquivo .js
        require_once '../../components/footer.php';
    ?>
</body>
</html>