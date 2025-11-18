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
                    <p>Dados do Usúario</p>
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
                        <input data-mask="(##) #####-####" id="telefone" name="telefone" type="text" placeholder="(00) 00000-0000">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="cpf">CPF<span>*</span></label>
                        <input data-mask="###.###.###-##" id="cpf" name="cpf" type="text" placeholder="000.000.000-00">
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
                <div class="formBox">
                    <div class="inputBox" id="BoxG">
                        <label for="email">Email<span>*</span></label>
                        <input id="email" name="email" type="email" maxlength="45" placeholder="usúario@conta.com">
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
                    <div class="inputBox" id="mobileInput">
                        <label></label>
                        <input type="text" disabled>
                    </div>
                    <div class="btnNextBack">
                        <button class="btn btnVoltar" type="button" onclick="moverPara(0, 0)">Voltar</button>
                        <button class="btn" type="submit" onclick="return proximo(2)">CADASTRAR</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
<?php
$jsPagina = ['usuario/cadastro.js'];
require_once '../../components/layout/footer/footer-visitante.php';
?>