<?php 
    $tituloPagina = 'Cadastro ONG'; // Definir o título da página
    $cssPagina = ['ONG/cadastro.css']; //Colocar o arquivo .css 
    require_once '../../components/header.php';
?>
        <!-- Fim cabeçalho -->


    <!-- Início DIV principal -->
    <div id="principal">
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
            </form>
            <div class="btn-navegacao">
                <a href="login-corporativo.html"><button class="voltar">Voltar</button></a>
                <a href="atuacao.html"><button class="proximo">Próximo</button></a>
            </div>
        </div>
        
    </div>
    <!-- Fim DIV principal  -->
    <script src="../assets//js/main.js"></script>
</body>
</html>