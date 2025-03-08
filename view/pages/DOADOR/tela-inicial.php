<?php 
    $tituloPagina = 'Tela inicial';
    $cssPagina = ['DOADOR/tela-inicial.css'];
    require_once '../../components/header.php';
?>

<main>
    <div class="container-branco">
        <section class="secao_visaogeral">
            <div class="cont-info">
                <h1>Olá Júlia</h1>
                <p>Explore os projetos e as últimas novidades</p>
                <div class="container-vsgeral">
                    <h2>Visão Geral</h2>
                    <div class="quadrado">
                        <p>Minhas doações</p>
                        <span>R$ 300</span>
                    </div>
                    <div class="quadrado">
                        <p>Minhas participações</p>
                        <span>4 Projetos</span>      
                    </div>
                </div>
            </div>
            <div class="cont-img">
                <img src="../../assets/images/team-work-bro.png" alt="">
            </div>
        </section>

    </div>
</main>

<?php
    $jsPagina = []; //Colocar o arquivo .js (exemplo: 'ONG/cadastro.js')
    require_once '../../components/footer.php';
?>