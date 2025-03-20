<?php 
    $cards = [
        [
            'foto-empresa' => '../../assets/images/projeto_placeholder.png',
            'nome' => 'C. Solidaria',
            'quant-voluntarios' => '14 Voluntários ativos',
            'quant-solicitacao' => '5 Solicitações'
        ],
        [
            'foto-empresa' => '../../assets/images/projeto_placeholder.png',
            'nome' => 'C. Solidaria',
            'quant-voluntarios' => '14 Voluntários ativos',
            'quant-solicitacao' => '5 Solicitações'
        ],
        [
            'foto-empresa' => '../../assets/images/projeto_placeholder.png',
            'nome' => 'C. Solidaria',
            'quant-voluntarios' => '14 Voluntários ativos',
            'quant-solicitacao' => '5 Solicitações'
        ],
        [
            'foto-empresa' => '../../assets/images/projeto_placeholder.png',
            'nome' => 'C. Solidaria',
            'quant-voluntarios' => '14 Voluntários ativos',
            'quant-solicitacao' => '5 Solicitações'
        ],
        [
            'foto-empresa' => '../../assets/images/projeto_placeholder.png',
            'nome' => 'C. Solidaria',
            'quant-voluntarios' => '14 Voluntários ativos',
            'quant-solicitacao' => '5 Solicitações'
        ],
        [
            'foto-empresa' => '../../assets/images/projeto_placeholder.png',
            'nome' => 'C. Solidaria',
            'quant-voluntarios' => '14 Voluntários ativos',
            'quant-solicitacao' => '5 Solicitações'
        ],
        [
            'foto-empresa' => '../../assets/images/projeto_placeholder.png',
            'nome' => 'C. Solidaria',
            'quant-voluntarios' => '14 Voluntários ativos',
            'quant-solicitacao' => '5 Solicitações'
        ],
        [
            'foto-empresa' => '../../assets/images/projeto_placeholder.png',
            'nome' => 'C. Solidaria',
            'quant-voluntarios' => '14 Voluntários ativos',
            'quant-solicitacao' => '5 Solicitações'
        ],
        [
            'foto-empresa' => '../../assets/images/projeto_placeholder.png',
            'nome' => 'C. Solidaria',
            'quant-voluntarios' => '14 Voluntários ativos',
            'quant-solicitacao' => '5 Solicitações'
        ],
        [
            'foto-empresa' => '../../assets/images/projeto_placeholder.png',
            'nome' => 'C. Solidaria',
            'quant-voluntarios' => '14 Voluntários ativos',
            'quant-solicitacao' => '5 Solicitações'
        ],
        [
            'foto-empresa' => '../../assets/images/projeto_placeholder.png',
            'nome' => 'C. Solidaria',
            'quant-voluntarios' => '14 Voluntários ativos',
            'quant-solicitacao' => '5 Solicitações'
        ],
        [
            'foto-empresa' => '../../assets/images/projeto_placeholder.png',
            'nome' => 'C. Solidaria',
            'quant-voluntarios' => '14 Voluntários ativos',
            'quant-solicitacao' => '5 Solicitações'
        ]
    ]
?>

<?php 
    $tituloPagina = 'Visualizar Voluntarios por Projeto'; // Definir o título da página
    $cssPagina = ['ONG/voluntarios-projetos.css']; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header.php';
?>
<!-- COMEÇAR SEU CÓDIGO AQUI -->
<div id="principal">
    <div class="header-principal">
        <h1>VOLUNTÁRIO POR PROJETO</h1>
        <form class="input">
            <input type="text" placeholder="Buscar Voluntário">
            <span class="lupa-icon">
                <img src="../../assets/images/lupa-cinza.png" alt="">
            </span>
        </form>
    </div>
    <div class="cards-container">
    <?php foreach ($cards as $card) { ?>
    <div class="card-ong">
        <div class="foto">
            <img src=<?php echo $card['foto-empresa'] ?>alt="">
        </div>
        <div class="dados">
            <h4><?php echo $card['nome'] ?></h4>
            <p><?php echo $card['quant-voluntarios'] ?></p>
            <p><?php echo $card['quant-solicitacao'] ?></p>
        </div>
    </div>
    <?php } ?>     
    </div> 
</div>

<?php
    $jsPagina = []; //Colocar o arquivo .js (exemplo: 'cadastro.js')
    require_once '../../components/footer.php';
?>