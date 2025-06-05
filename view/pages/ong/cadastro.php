<?php
$tituloPagina = 'Cadastro do Doador';
$cssPagina = ['ong/cadastro.css'];
require_once '../../components/layout/base-inicio.php';
?>

<main>
    <section>
        <div class="container">
            <h1>CADASTRE SUA ONG</h1>
            <div class="line">
                <div id="linhaClara"></div>
                <div id="linhaAzul"></div>
                <div class="item active">
                    <div class="circle"><i class="fa-solid fa-check"></i></div>
                    <p>Dados da ONG</p>
                </div>
                <div class="item">
                    <div class="circle"><i class="fa-solid fa-check"></i></div>
                    <p>Descrição</p>
                </div>
                <div class="item">
                    <div class="circle"><i class="fa-solid fa-check"></i></div>
                    <p>Endereço</p>
                </div>
                <!-- <div class="item">
                    <div class="circle"><i class="fa-solid fa-check"></i></div>
                    <p>Responsável</p>
                </div> -->
                <div class="item">
                    <div class="circle"><i class="fa-solid fa-check"></i></div>
                    <p>Banco</p>
                </div>
                <!-- <div class="item">
                    <div class="circle"><i class="fa-solid fa-check"></i></div>
                    <p>Login</p>
                </div> -->
            </div>
            <form id="form" action="login.php" method="POST">
                <div class="formBox">
                    <div class="inputBox">
                        <label for="nome">Razão Social<span>*</span></label>
                        <input id="nome" type="text" placeholder="Digite um nome">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="telefone">Telefone da ONG<span>*</span></label>
                        <input id="telefone" type="text" placeholder="(00) 00000-0000">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="cnpj">CNPJ<span>*</span></label>
                        <input id="cnpj" type="text" placeholder="00.000.000/0000-00">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="email-ong">Email da ONG<span>*</span></label>
                        <input id="email-ong" type="email" placeholder="ong@conta.com" required>
                        <span class="visor"></span>
                    </div>
                    <div class="btnNext">
                        <button class="btn" type="button" onclick="return proximo(1)">Próximo</button>
                    </div>
                </div>
                <div class="formBox">
                    <div class="inputBox">
                        <label for="descricao">Descrição<span>*</span></label>
                        <textarea id="descricao"></textarea>
                        <!-- <input id="descricao" type="text" placeholder="Fale um pouco da sua ONG"> -->
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="">Áreas de Atuação</label>
                        <div class="checkbox-group">
                            <div class="item-check">
                                <input type="checkbox" id="cat-saude">
                                <label for="cat-saude">Saúde</label>
                            </div>
                            <div class="item-check">
                                <input type="checkbox" id="cat-esporte">
                                <label for="cat-esporte">Esporte</label>
                            </div>
                            <div class="item-check">
                                <input type="checkbox" id="cat-ambiente">
                                <label for="cat-ambiente">Meio Ambiente</label>
                            </div>
                            <div class="item-check">
                                <input type="checkbox" id="cat-tecnologia">
                                <label for="cat-tecnologia">Tecnologia</label>
                            </div>
                            <div class="item-check">
                                <input type="checkbox" id="cat-educacao">
                                <label for="cat-educacao">Educação</label>
                            </div>
                            <div class="item-check">
                                <input type="checkbox" id="cat-cultura">
                                <label for="cat-cultura">Cultura</label>
                            </div>
                            <div class="item-check">
                                <input type="checkbox" id="cat-animal">
                                <label for="cat-animal">Proteção Animal</label>
                            </div>
                        </div>
                    </div>
                    <div class="btnNextBack">
                        <button class="btn btnVoltar" type="button" onclick="moverPara(0, 16)">Voltar</button>
                        <button class="btn" type="button" onclick="return proximo(2)">Próximo</button>
                    </div>
                </div>
                <div class="formBox">
                    <div class="inputBox">
                        <label for="cep">CEP<span>*</span></label>
                        <input id="cep" type="text" placeholder="00000-000">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="rua">Rua<span>*</span></label>
                        <input id="rua" type="text" placeholder="Ex: Rui Barbosa,1436">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="bairro">Bairro<span>*</span></label>
                        <input id="bairro" type="text" placeholder="Ex: Centro">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="cidade">Cidade<span>*</span></label>
                        <input id="cidade" type="text" placeholder="Campo Grande">
                        <span class="visor"></span>
                    </div>
                    <div class="btnNextBack">
                        <button class="btn btnVoltar" type="button" onclick="moverPara(1, 16)">Voltar</button>
                        <button class="btn" type="button" onclick="return proximo(3)">Próximo</button>
                    </div>
                </div>
                <!-- <div class="formBox">
                    <div class="inputBox">
                        <label for="nome-resp">Nome<span>*</span></label>
                        <input id="nome-resp" type="text" placeholder="Nome Completo">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="cpf-resp">CPF<span>*</span></label>
                        <input id="cpf-resp" type="text" placeholder="000.000.000.00">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="telefone-resp">Telefone<span>*</span></label>
                        <input id="telefone-resp" type="text" placeholder="(00) 00000-0000">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="email-resp">Email<span>*</span></label>
                        <input id="email-resp" type="email" placeholder="usuario@conta.com">
                        <span class="visor"></span>
                    </div>
                    <div class="btnNextBack">
                        <button class="btn btnVoltar" type="button" onclick="moverPara(2, 16)">Voltar</button>
                        <button class="btn" type="button" onclick="return proximo(4)">Próximo</button>
                    </div>
                </div> -->
                <div class="formBox">
                    <div class="inputBox">
                        <label for="agencia">Agência<span>*</span></label>
                        <input id="agencia" type="text" placeholder="0000-0">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="tipo-conta">Tipo<span>*</span></label>
                        <!-- <input id="tipo-conta" type="text"> -->
                        <select>
                            <option value="" disabled selected>Escolha</option>
                            <option value="CORRENTE">Corrente</option>
                            <option value="POUPANÇA">Poupança</option>
                        </select>
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="conta">Conta<span>*</span></label>
                        <input id="conta" type="text" placeholder="00000-00">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="nome-conta">Nome do Titular<span>*</span></label>
                        <input id="nome-conta" type="text" placeholder="Nome Completo">
                        <span class="visor"></span>
                    </div>
                    <div class="btnNextBack">
                        <button class="btn btnVoltar" type="button" onclick="moverPara(2, 16)">Voltar</button>
                        <button class="btn" type="submit" onclick="return proximo(4)">CADASTRAR ONG</button>
                    </div>
                </div>
                <!-- <div class="formBox">
                    <div class="inputBox BoxG">
                        <label for="email-login">Email<span>*</span></label>
                        <input id="email-login" type="text" placeholder="usúario@conta.com">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="senha-login">Senha<span>*</span></label>
                        <input id="senha-login" type="password" placeholder="********">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="confirm-login">Confirmar Senha<span>*</span></label>
                        <input id="confirm-login" type="password" placeholder="********">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox" id="mobileInput">
                        <label></label>
                        <input type="text" disabled>
                    </div>
                    <div class="btnNextBack">
                        <button class="btn btnVoltar" type="button" onclick="moverPara(4, 16)">Voltar</button>
                        <button class="btn" type="submit" onclick="return proximo(6)">CADASTRAR</button>
                    </div>
                </div> -->
            </form>
        </div>
    </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    $("#telefone").mask("(00) 00000-0000");
    $("#cnpj").mask("00.000.000/0000-00");
    $("#cep").mask("00000-00");
    $("#cpf-resp").mask("000.000.000-00");
    $("#telefone-resp").mask("(00) 00000-0000");
    $("#agencia").mask("0000-0");
    $("#conta").mask("00000-00");
</script>
<?php
$jsPagina = ['ong/cadastro.js'];
require_once '../../components/footer.php';
?>