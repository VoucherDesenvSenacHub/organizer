<?php 
    $tituloPagina = 'Cadastro do Doador';
    $cssPagina = ['DOADOR/cadastro.css'];
    require_once '../../components/header.php';
?>
<!-- COMEÇAR SEU CÓDIGO AQUI -->
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
                    <p>Banco</p>
                </div>
                <div class="item">
                    <div class="circle"><i class="fa-solid fa-check"></i></div>
                    <p>Login</p>
                </div>
            </div>
            <form id="form">
                <div class="formBox">
                    <div class="inputBox">
                        <label for="nome">Nome Completo</label>
                        <input id="nome" type="text" placeholder="Seu Nome">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="telefone">Telefone</label>
                        <input id="telefone" type="text" placeholder="(67) 9 0000-0000">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="text" placeholder="000.000.000-00">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="data">Data de Nascimento</label>
                        <input id="data" type="date" placeholder="DD/MM/AA">
                        <span class="visor"></span>
                    </div>
                    <div class="btnNext">
                        <button class="btn" type="button" onclick="return proximo(1)">Próximo</button>
                    </div>
                </div>
                <div class="formBox">
                    <div class="inputBox">
                        <label for="nome_cartao">Titular do Cartão</label>
                        <input id="nome_cartao" type="text" placeholder="Nome Completo">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="num_cartao">Número do Cartão</label>
                        <input id="num_cartao" type="text" placeholder="0000 0000 0000 0000">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="data_cartao">Data de Validade</label>
                        <input id="data_cartao" type="date" placeholder="MM/AA">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="code_cartao">Código de Segurança</label>
                        <input id="code_cartao" type="number" placeholder="CVV">
                        <span class="visor"></span>
                    </div>
                    <div class="btnNextBack">
                        <button class="btn btnVoltar" type="button" onclick="voltar(1)">Voltar</button>
                        <button class="btn" type="button" onclick="return proximo(2)">Próximo</button>
                    </div>
                </div>
                <div class="formBox">
                    <div class="inputBox" id="BoxG">
                        <label for="email">Email</label>
                        <input id="email" type="email" placeholder="usúario@conta.com">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" placeholder="********">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox">
                        <label for="confirm_senha">Confirmar Senha</label>
                        <input id="confirm_senha" type="password" placeholder="********">
                        <span class="visor"></span>
                    </div>
                    <div class="inputBox" id="mobileInput">
                        <label></label>
                        <input type="text" disabled>
                    </div>
                    <div class="btnNextBack">
                        <button class="btn btnVoltar" type="button" onclick="voltar(2)">Voltar</button>
                        <button class="btn" onclick="return proximo(3)">CADASTRAR</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    $("#telefone").mask("(00) 0 0000-0000");
    $("#cpf").mask("000.000.000-00");
    $("#num_cartao").mask("0000 0000 0000 0000");
</script>
<?php
    $jsPagina = ['cadastro.js'];
    require_once '../../components/footer.php';
?>