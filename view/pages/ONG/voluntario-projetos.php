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
            'img-voluntario' => '../../assets/images/perfil-azul.png',
            'nome' => 'João',
            'email' => 'joao@email.com',
            'date' => '20/03/2025'
        ],
        [
            'img-voluntario' => '../../assets/images/perfil-amarelo.png',
            'nome' => 'Marcos',
            'email' => 'marcos@email.com',
            'date' => '20/03/2025'
        ],
        [
            'img-voluntario' => '../../assets/images/perfil-vermelho.png',
            'nome' => 'Maria',
            'email' => 'maria@email.com',
            'date' => '20/03/2025'
        ],
        [
            'img-voluntario' => '../../assets/images/perfil-cinza-claro.png',
            'nome' => 'Juliana',
            'email' => 'juliana@email.com',
            'date' => '20/03/2025'
        ],
        [
            'img-voluntario' => '../../assets/images/perfil-cinza.png',
            'nome' => 'Pedro',
            'email' => 'pedro@email.com',
            'date' => '20/03/2025'
        ]
    ]
?>

<?php 
    $tituloPagina = 'Visualizar Voluntarios por Projeto'; // Definir o título da página
    $cssPagina = ['ONG/voluntarios-projetos.css']; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header-ong.php';
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
            <img src=<?php echo $card['foto-empresa'] ?> alt="">
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
                <div class="v-solicitacoes" id="v-solicitacoes">
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
                    <img class="btn-delete" src="../../assets/images/delete_user.png" alt="">
                </td>
            </tr>
           
            <?php } ?>
        </tbody>
        </table>      
        </div>
</div>

<!-- tela notificação de voluntario deletado -->
<div class="tela-voluntario-delete" id="tela-voluntario-delete">
        <div class="card-voluntario-delete">
            <img src="../../assets/images/voluntario-delete.png" alt="">
            <h1>Voluntário Retirado do Projeto</h1>
        </div>
</div>

<!-- tela solicitações voluntarios -->
<div class="tela-voluntarios-solicitacoes" id="tela-voluntarios-solicitacoes">
        <div class="card-voluntarios-solicitacoes">
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
                <td>
                    <button class="btn-ver-solicitacao">Ver Solicitação</button>
                </td>
            </tr>
           
            <?php } ?>
        </tbody>
        </table>      
        </div>
</div>

<!-- tela solicitações voluntarios mensagem para ser aceita ou recusado -->
<div class="tela-solicitacao-voluntario" id="tela-solicitacao-voluntario">
    <div class="card-solicitacao-voluntario">
        <div class="texto-solicitacao">
            <form action="">
                <textarea name="" id="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur qui quasi accusamus ipsa inventore deserunt perspiciatis unde dolorum reiciendis officia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur qui quasi accusamus ipsa </textarea>
            </form>
        </div>
        <div class="img-usuario-solicitacao">
            <div class="div-img-info">
                <img src= <?php echo $voluntario['img-voluntario'] ?> alt="">
                <div class="info">
                    <h1><?php echo $voluntario['nome'] ?></h1>
                    <p><?php echo $voluntario['email'] ?></p>
                </div>
            </div>
            <div class="div-btns">
                <button class="aceitar" id="aceitar"><span><img src="../../assets/images/aceitar.png" alt=""></span> Aceitar</button>
                <button class="recusar" id="recusar"><span><img src="../../assets/images/recusar.png" alt=""></span>Recusar</button>
            </div>
        </div>
    </div>
</div>

<!-- tela aceitar -->
<div class="tela-aceitar" id="tela-aceitar">
    <div class="card-aceitar">
        <img src="../../assets/images/aceitar-verde.png" alt="">
        <h1>Voluntário Aceito</h1>
    </div>
</div>

<!-- tela recusar -->
<div class="tela-recusar" id="tela-recusar">
    <div class="card-recusar">
        <img src="../../assets/images/voluntario-delete.png" alt="">
        <h1>Voluntário Negado</h1>
    </div>
</div>



<?php
    $jsPagina = ['voluntarios-projetos.js']; //Colocar o arquivo .js (exemplo: 'cadastro.js')
    require_once '../../components/footer.php';
?>