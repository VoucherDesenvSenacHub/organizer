<?php 
    $tituloPagina = 'Cadastro ONG'; // Definir o título da página
    $cssPagina = ['ong/cadastro.css']; //Colocar o arquivo .css 
    require_once '../../components/header.php';
?>
        <!-- Fim cabeçalho -->
<!-- Barra de navegação -->

<div class="nav-buttons">
    <button id="b1"></button>
    <button id="b2"></button>
    <button id="b3"></button>
    <button id="b4"></button>
    <button id="b5"></button>
    <button id="b6"></button>
</div>
<div class="progress">
    <div class="line">
        <div class="line-0"></div>
    </div>
</div>
<div class="text-progress">
    <div id="t1">Dados<br> da ONG</div>
    <div id="t2">Descrição</div>
    <div id="t3">Endereço</div>
    <div id="t4">Responsável</div>
    <div id="t5">Banco</div>
    <div id="t6">Login</div>
</div>

<!-- Início DIV Cadastro -->
<div id="cadastro-completo">
    <div id="container">
        <div id="cadastro">
            <div class="formulario-geral">
                <div class="titulo">
                    <h1>CADASTRO</h1>
                </div>
                <form>
                    <div class="formulario-dados">
                        <div>
                            <label for="rSocial">Razão Social</label><br>
                            <input type="text" id="rSocial" placeholder="Digite o nome">
                        </div>
                        <div>
                            <label for="telefone">Telefone</label><br>
                            <input type="text" id="foneOng" placeholder="(00) 0000-0000">
                        </div>
                        <div>
                            <label for="cnpj">CNPJ</label><br>
                            <input type="text" id="cnpj" placeholder="00.000.000/0000-00">
                        </div>
                        <div>
                            <label for="email">Email</label><br>
                            <input type="email" id="mailOng" placeholder="usuario@conta.com">
                        </div>
                    </div>
            </div>
        </div>
        <!-- Fim DIV Cadastro  -->
        
        <!-- Início Atuação da ONG -->
        <div id="atuacao">
        <div class="formulario-geral">
            <div class="titulo">
                <h1>ATUAÇÃO DA ONG</h1>
            </div>
            
            <div id="form-atuacao">
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
            </div>
            
        </div>
        </div>
        <!-- Fim Atuação da ONG -->
          
        
        <!-- Início Endereço -->
        
        <div class="formulario-geral">
            <div class="titulo">
                <h1>ENDEREÇO</h1>
            </div>
            <div class="formulario-dados">
                <div>
                    <label for="rua">Endereço</label><br>
                    <input type="text" id="rua" placeholder="Ex. Rua Projetada, 199">
                </div>
                <div>
                    <label for="cidade">Cidade</label><br>
                    <input type="text" id="cidade" placeholder="Campo Grande">
                </div>
                <div>
                    <label for="cep">CEP</label><br>
                    <input type="text" id="cep" placeholder="00000-000">
                </div>
                <div>
                    <label for="uf">UF</label><br>
                    <input type="text" id="uf" placeholder="Mato Grosso do Sul">
                </div>
            </div>
            
        </div>
        
        <!-- Fim Endereço -->

        <!-- Início Responsável -->
        <div id="responsavel">
            <div class="formulario-geral">
                <div class="titulo">
                    <h1>RESPONSÁVEL PELA ONG</h1>
                </div>
                    <div>
                        <label for="nome">Nome</label><br>
                        <input type="text" id="nome" placeholder="Nome completo">
                    </div>
                    <div>
                        <label for="cpf">CPF</label><br>
                        <input type="text" id="cpf" placeholder="000.000.000-00">
                    </div>
                    <div>
                        <label for="telefone">Telefone</label><br>
                        <input type="tel" id="telefone" placeholder="(00) 0000-0000">
                    </div>
                    <div>
                        <label for="email">Email</label><br>
                        <input type="email" id="email" placeholder="usuario@conta.com">
                    </div>
                
            </div>
        </div>
        <!-- Fim Responsável -->

        <!-- Início Dados bancários -->
        <div id="dados-bancarios">
        <div class="formulario-geral">
            <div class="titulo">
                <h1>DADOS BANCÁRIOS</h1>
            </div>
            <div>
                <label for="banco">Banco</label><br>
                <input type="text" id="banco" placeholder="Banco">
            </div>
            <div>
                <label for="agencia">Agência</label><br>
                <input type="text" id="agencia" placeholder="Agência">
            </div>
            <div>
                <label for="conta">Conta</label><br>
                <input type="tel" id="conta" placeholder="Conta">
            </div>
            <div>
                <label for="tipo">Tipo</label><br>
                <select name="tipo" id="tipo">
                    <option value="c-corrente">Conta Corrente</option>
                    <option value="c-poupanca">Conta Poupança</option>
                </select>
            </div>
        
        </div>
        </div>
        <!-- Fim Dados bancários -->

        <!-- Início Criar login -->

        <div id="criar-login">
            <div class="formulario-geral">
            <div class="titulo">
                <h1>CRIAR SEU LOGIN</h1>
            </div>
            <div id="senhas">
                <div>
                    <label for="senha-login">Senha</label><br>
                    <input type="password" id="senha-login" placeholder="**********">
                    <button class="ver-senha" type="button"onclick="showHide('senha-login', 'eyepassword')">
                        <span class="material-symbols-outlined" id="eyepassword">
                            visibility
                        </span>
                    </button>
                </div>
                <div>
                    <label for="conf-senha">Confirmar senha</label><br>
                    <input type="password" id="conf-senha" placeholder="**********">
                    <button class="ver-senha" type="button" onclick="showHide('conf-senha', 'eye-conf-password')">
                        <span class="material-symbols-outlined" id="eye-conf-password">
                            visibility
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Fim Criar login -->
    </div>
</div>
</div>
<div class="btn-navegacao">
    <button class="voltar" type="button" onClick="mudaEtapaCadastro(-1)">Voltar</button>
    <button class="proximo" type="button" onClick="mudaEtapaCadastro(1)">Próximo</button>
    <a id="confirmacao" href="login.php">
                <button class="confirm" type="button">Cadastrar</button>
            </a>
</div>
</form>

    <?php
        $jsPagina = ['ongs.js']; //Colocar o arquivo .js
        require_once '../../components/footer.php';
    ?>
</body>
</html>