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
    $voluntarios = [
        [
            'img-voluntario' => '../../assets/images/foto.png',
            'nome' => 'Maria',
            'email' => 'maria@email.com',
            'date' => '20/03/2025'
        ],
        [
            'img-voluntario' => '../../assets/images/foto.png',
            'nome' => 'Maria',
            'email' => 'maria@email.com',
            'date' => '20/03/2025'
        ],
        [
            'img-voluntario' => '../../assets/images/foto.png',
            'nome' => 'Maria',
            'email' => 'maria@email.com',
            'date' => '20/03/2025'
        ],
        [
            'img-voluntario' => '../../assets/images/foto.png',
            'nome' => 'Maria',
            'email' => 'maria@email.com',
            'date' => '20/03/2025'
        ],
        [
            'img-voluntario' => '../../assets/images/foto.png',
            'nome' => 'Maria',
            'email' => 'maria@email.com',
            'date' => '20/03/2025'
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
            <p class="quant-voluntarios"><?php echo $card['quant-voluntarios'] ?></p>
            <p class="quant-solicitacao"><?php echo $card['quant-solicitacao'] ?></p>
        </div>
    </div>
    <?php } ?>     
    </div> 
</div>

<!-- tela escolher voluntarios ativos e solicitações de novos voluntarios -->
<div class="tela-voluntario-ativo-solicitacao" id="tela-voluntario-ativo-solicitacao">
        <div class="card-voluntario-ativo-solicitacao">
            <div class="div-button">
                <div class="v-ativos" id="v-ativos">
                    <img src="../../assets/images/icon-voluntarios.png" alt="">
                    <h1>Ver Voluntários Ativos</h1>
                </div>
                <div class="v-solicitacoes">
                    <img src="../../assets/images/icon-solicitacoes.png" alt="">
                    <h1>5 Solicitações</h1>
                </div>
            </div>        
        </div>
</div>

<!-- tela voluntarios ativos -->
<div class="tela-voluntarios-ativos" id="tela-voluntarios-ativos">
        <div class="card-voluntarios-ativos">
        <table class="table">
        <tbody>
            <?php foreach ($voluntarios as $voluntario) { ?>
            <tr class="linha-coluna">
                <td class="logo-empresa">
                    <img src= <?php echo $voluntario['img-voluntario'] ?> alt="">
                    <h1><?php echo $voluntario['nome'] ?> <br> <p><?php echo $voluntario['email'] ?></p> </h1>
                    
                </td>
                <td class="date">
                    <p><?php echo $voluntario['date'] ?></p>
                </td>
                <td class="btn-inativar-voluntario">
                    <img src="../../assets/images/delete_user.png" alt="">
                </td>
            </tr>
           
            <?php } ?>
        </tbody>
        </table>      
        </div>
</div>



<?php
    $jsPagina = ['voluntarios-projetos.js']; //Colocar o arquivo .js (exemplo: 'cadastro.js')
    require_once '../../components/footer.php';
?>