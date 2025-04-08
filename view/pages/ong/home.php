<?php 
    $tituloPagina = 'ONG - Logon'; // Definir o título da página
    $cssPagina = ['ong/home.css']; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header-ong.php';
?>
    <!-- Início DIV principal -->  
    <div id="principal">
    
    
        <div id="painel-l1">
            <h1>BEM VINDO</h1>
            <h3>PAINEL</h3>
        </div>
        <div id="painel-l2">
            <div class="info-ong">
                <h4>Projetos Ativos</h4>
                <p>6</p>
            </div>
            <div class="info-ong">
                <h4>Doações Recebidas</h4>
                <p>R$ 200.000,00</p>
            </div>
            <div class="info-ong">
                <h4>Voluntários</h4>
                <p>150</p>
            </div>
        </div>
        <div id="painel-l3">
            <div class="controle-ong">
                <a href="noticias-logon.php"><img src="../../assets/images/notices.gif" alt=""></a>
                <p>NOTÍCIAS</p>
            </div>
            <div class="controle-ong">
                <a href="projetos.php"><img src="../../assets/images/globe-roxo.gif" alt=""></a>
                <p>PROJETOS</p>
            </div>
            <div class="controle-ong">
                <a href="voluntario-projetos.php"><img src="../../assets/images/favorite.gif" alt=""></a>
                <P>VOLUNTÁRIOS</P>
            </div>
            <div class="controle-ong">
                <a href="perfil.php"><img src="../../assets/images/perfil.gif" alt=""></a>
                <p>PERFIL</p>
            </div>
            <div class="controle-ong">
                <a href="relatorios.php"><img src="../../assets/images/relatorios.gif" alt=""></a>
                <p>RELATÓRIOS</p>
            </div>
        </div>
        <div id="painel-l4">
            <h3>Suas Atividades Recentes</h3>
        </div>
        <div id="atividades">
            <div class="card-atividades">
                <img src="../../assets/images/proj-criado.png" alt="">
                <span>
                    <h3>Projeto Criado</h3>
                    <p>Você criou o projeto "Mais Amor"</p>
                    <p>04 de agosto de 2024, 14:21</p>
                </span>
            </div>
            <div class="card-atividades">
                <img src="../../assets/images/noticia-publicada.png" alt="">
                <span>
                    <h3>Notícia Publicada</h3>
                    <p>Você publicou a notícia "Meta Alcançada"</p>
                    <p>02 de agosto de 2024, 18:01</p>
                </span>
            </div>
            <div class="card-atividades">
                <img src="../../assets/images/perfil-alterado.png" alt="">
                <span>
                    <h3>Perfil Alterado</h3>
                    <p>Você alterou o seu "endereço"</p>
                    <p>28 de julho de 2024, 08:45</p>
                </span>
            </div>
        </div>
    </div>
    <!-- Fim DIV principal  -->
    <?php
        $jsPagina = ['ongs.js']; //Colocar o arquivo .js
        require_once '../../components/footer.php';
    ?>

</body> 
</html>