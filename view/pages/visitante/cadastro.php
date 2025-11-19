<?php
$acesso = 'visitante';
$tituloPagina = 'Cadastro | Organizer';
$cssPagina = ['visitante/cadastro.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$usuarioModel = new UsuarioModel();

?>
<main>
    <section>
        <div class="container">
            <h1>FAÇA SEU CADASTRO</h1>
            <div class="line">
                <div id="linhaClara"></div>
                <div id="linhaAzul"></div>
                <div class="item active">
                    <div class="circle"><i class="fa-solid fa-check"></i></div>
                    <p>Dados do Usuário</p>
                </div>
                <div class="item">
                    <div class="circle"><i class="fa-solid fa-check"></i></div>
                    <p>Endereço</p>
                </div>
                <div class="item">
                    <div class="circle"><i class="fa-solid fa-check"></i></div>
                    <p>Login</p>
                </div>
            </div>
            <form id="form" action="../../../controller/Usuario/CadastrarUsuarioController.php" method="POST">
                <div class="formBox">
                    <div class="inputBox">
                        <label for="nome">Nome Completo<span>*</span></label>
                        <input id="nome" name="nome" type="text" maxlength="100" placeholder="Seu Nome">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="telefone">Telefone<span>*</span></label>
                        <input id="telefone" name="telefone" type="text" placeholder="(67) 9 0000-0000">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="cpf">CPF<span>*</span></label>
                        <input id="cpf" name="cpf" type="text" placeholder="000.000.000-00">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="data">Data de Nascimento<span>*</span></label>
                        <input id="data" name="data_nascimento" type="date" placeholder="DD/MM/AA">
                        <span class="visor"></span>
                    </div>
                    <div class="btnNext">
                        <button class="btn" type="button" onclick="return proximo(1)">Próximo</button>
                    </div>
                </div>
                <div class="formBox busca-cep">
                    <div class="inputBox">
                        <label for="cep">CEP<span>*</span></label>
                        <input name="cep" id="cep" type="text" placeholder="00000-000">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="rua">Rua<span>*</span></label>
                        <input name="rua" id="rua" type="text" placeholder="Ex: Rui Barbosa" readonly>
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="numero">Nº<span>*</span></label>
                        <input name="numero" id="numero" type="text">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="bairro">Bairro<span>*</span></label>
                        <input name="bairro" id="bairro" type="text" placeholder="Ex: Centro" readonly>
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="cidade">Cidade<span>*</span></label>
                        <input name="cidade" id="cidade" type="text" placeholder="Campo Grande" readonly>
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="estado">Estado<span>*</span></label>
                        <input name="estado" id="estado" type="text" placeholder="MS" readonly>
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox" id="mobileInput">
                        <label></label>
                        <input type="text" disabled>
                    </div>
                    <div class="btnNextBack">
                        <button class="btn btnVoltar" type="button" onclick="moverPara(0, 33)">Voltar</button>
                        <button class="btn" type="button" onclick="return proximo(2)">Próximo</button>
                    </div>
                </div>
                <div class="formBox">
                    <div class="inputBox" id="BoxG">
                        <label for="email">Email<span>*</span></label>
                        <input id="email" name="email" type="email" maxlength="45" placeholder="usuário@conta.com">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="senha">Senha<span>*</span></label>
                        <input id="senha" name="senha" type="password" maxlength="20" placeholder="********">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="confirm_senha">Confirmar Senha<span>*</span></label>
                        <input id="confirm_senha" type="password" maxlength="20" placeholder="********">
                        <span class="visor"></span>
                    </div>
                     <div class="btnNextBack">
                        <button class="btn btnVoltar" type="button" onclick="moverPara(1, 33)">Voltar</button>
                        <button class="btn" type="submit" onclick="return proximo(3)">CADASTRAR</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="../../assets/js/pages/ong/cep.js"></script>
<script type="text/javascript">
    $("#telefone").mask("(00) 0 0000-0000");
    $("#cpf").mask("000.000.000-00");
    $("#cep").mask("00000-000");
    $("#num_cartao").mask("0000 0000 0000 0000");
    $("#code_cartao").mask("000");


    $("#nome").on("input", function () {
        var valor = $(this).val();
        // Remove tudo que não for letra ou espaço
        $(this).val(valor.replace(/[^a-zA-ZÀ-ÿ\s]/g, ""));
    });
    $("#bairro").on("input", function() {
            var valor = $(this).val();
            $(this).val(valor.replace(/[^a-zA-ZÀ-ÿ\s]/g, ""));
    });
    $("#cidade").on("input", function() {
        var valor = $(this).val();
        $(this).val(valor.replace(/[^a-zA-ZÀ-ÿ\s]/g, ""));
    });
</script>
<?php
$jsPagina = ['usuario/cadastro.js'];
require_once '../../components/layout/footer/footer-visitante.php';
?>