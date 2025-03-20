<?php 
    $tituloPagina = 'Cadastro ONG'; // Definir o título da página
    $cssPagina = ['ong/cadastro.css']; //Colocar o arquivo .css 
    require_once '../../components/header.php';
    $itens_progressao = ['Dados<br>da ONG', 'Descrição', 'Endereço', 'Responsável', 'Banco', 'Login'];
    function botoes_navegacao($muda_classe, $card){        
            $full = 0;
            for($i=0; $i<=5; $i++){
            $full >=$muda_classe ? $classe_botao = 'p2' : $classe_botao = 'p1';
        ?>
        <button type="button" class="<?php echo $classe_botao ?>" onclick="targetPage(<?php echo $i ?>,
        <?php echo $card ?>)"></button>
        <?php
            $full++;
        }
    }
    function texto_progresso($itens_progressao, $muda_classe){
        $draft = 0;
        foreach($itens_progressao as $item){
            $draft >= $muda_classe ? $classe_item = 'text-detalhes-draft' : $classe_item = 'text-detalhes';
        ?>
        <div class="<?php echo $classe_item; ?>"><?php echo $item ?></div>
        <?php 
            $draft++;
        }
    }

?>
        <!-- Fim cabeçalho -->


    <!-- Início DIV Cadastro -->
    <div id="cadastro">
        <div id="cadastro-ong">
            <div class="titulo-atuacao">
                <h1>CADASTRO</h1>
            </div>
            <div class="nav-buttons">
                <?php botoes_navegacao(1,0)?>
            </div>
            <div class="progress">
                <div class="line">
                    <div class="line-0"></div>
                </div>
            </div>
            <div class="text-progress">
                <?php texto_progresso($itens_progressao, 1)?>
            </div>
            <form action="cadastrar-ong.php" method="post">
                <div class="formulario-geral">
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
            <div class="btn-navegacao-first">
                <button class="proximo" type="button" onClick="mudaPagina('cadastro', false)">Próximo</button>
            </div>
        </div>
    </div>
    <!-- Fim DIV Cadastro  -->

    <!-- Início Atuação da ONG -->
    <div id="atuacao">
        <div class="titulo-atuacao">
            <h1>ATUAÇÃO DA ONG</h1>
        </div>
        <div class="nav-buttons">
                <?php botoes_navegacao(2,1)?>
        </div>
        <div class="progress">
            <div class="line">
                <div class="line-0"></div>
            </div>
        </div>
        <div class="text-progress">
            <?php texto_progresso($itens_progressao, 2)?>
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
        <div class="btn-navegacao">
            <button class="voltar" type="button" onClick="mudaPagina('cadastro', true)">Voltar</button>
            <button class="proximo" type="button" onClick="mudaPagina('atuacao', false)">Próximo</button>
        </div>
    </div>
    <!-- Fim Atuação da ONG -->
    
    <!-- Início Endereço -->
     
    <div id="endereco">
        <div class="titulo-atuacao">
            <h1>ENDEREÇO</h1>
        </div>
        <div class="nav-buttons">
                <?php botoes_navegacao(3,2)?>
            </div>
            <div class="progress">
                <div class="line">
                    <div class="line-0"></div>
                </div>
            </div>
            <div class="text-progress">
                <?php texto_progresso($itens_progressao, 3)?>
            </div>
        <div class="formulario-geral">
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
        <div class="btn-navegacao">
            <button class="voltar" type="button" onClick="mudaPagina('atuacao', true)">Voltar</button>
            <button class="proximo" type="button" onClick="mudaPagina('endereco', false)">Próximo</button>
        </div>
    </div>

    <!-- Fim Endereço -->

    <!-- Início Responsável -->
    <div id="responsavel">
        <div class="titulo-atuacao">
            <h1>RESPONSÁVEL PELA ONG</h1>
        </div>
        <div class="nav-buttons">
            <?php botoes_navegacao(4,3)?>
        </div>
        <div class="progress">
            <div class="line">
                <div class="line-0"></div>
            </div>
        </div>
        <div class="text-progress">
            <?php texto_progresso($itens_progressao, 4)?>
        </div>
            <div class="formulario-geral">
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
            <div class="btn-navegacao">
                <button class="voltar" type="button" onClick="mudaPagina('endereco', true)">Voltar</button>
                <button class="proximo" type="button" onClick="mudaPagina('responsavel', false)">Próximo</button>
            </div>
        </div>
    <!-- Fim Responsável -->

    <!-- Início Dados bancários -->
    <div id="dados-bancarios">
        <div class="titulo-atuacao">
            <h1>DADOS BANCÁRIOS</h1>
        </div>
        <div class="nav-buttons">
            <?php botoes_navegacao(5,4)?>
        </div>
        <div class="progress">
            <div class="line">
                <div class="line-0"></div>
            </div>
        </div>
        <div class="text-progress">
            <?php texto_progresso($itens_progressao, 5)?>
        </div>
        <div class="formulario-geral">
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
        <div class="btn-navegacao">
            <button class="voltar" type="button" onClick="mudaPagina('responsavel', true)">Voltar</button>
            <button class="proximo" type="button" onClick="mudaPagina('dados-bancarios', false)">Próximo</button>
        </div>
    </div>
    <!-- Fim Dados bancários -->

    <!-- Início Criar login -->

    <div id="criar-login">
        <div class="titulo-atuacao">
            <h1>CRIAR SEU LOGIN</h1>
        </div>
        <div class="nav-buttons">
            <?php botoes_navegacao(6,5)?>
        </div>
        <div class="progress">
            <div class="line">
                <div class="line-0"></div>
            </div>
        </div>
        <div class="text-progress">
            <?php texto_progresso($itens_progressao, 6)?>
        </div>
        <div class="formulario-geral">
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
        <div class="btn-navegacao">
            <button class="voltar" type="button" onClick="mudaPagina('dados-bancarios', true)">Voltar</button>
            <button class="proximo" type="submit">Cadastrar</button>
        </div>
    </div>
    <!-- Fim Criar login -->
</form>
    <?php
        $jsPagina = ['ongs.js']; //Colocar o arquivo .js
        require_once '../../components/footer.php';
    ?>
</body>
</html>