<?php 
    $tituloPagina = 'Validação de Ongs'; // Definir o título da página
    $cssPagina = ["adm/ongs-a-serem-validadas.css"]; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header.php';
?>
<?php
    $ongs = [
        [
            'nome' => 'Nome da ONG',
            'responsavel' => 'Responsável',
            'icon_visualizar' => '../../assets/images/visualizar.png'
        ],
        [
            'nome' => 'Nome da ONG',
            'responsavel' => 'Responsável',
            'icon_visualizar' => '../../assets/images/visualizar.png'
        ],
        [
            'nome' => 'Nome da ONG',
            'responsavel' => 'Responsável',
            'icon_visualizar' => '../../assets/images/visualizar.png'
        ],
        [
            'nome' => 'Nome da ONG',
            'responsavel' => 'Responsável',
            'icon_visualizar' => '../../assets/images/visualizar.png'
        ],
        [
            'nome' => 'Nome da ONG',
            'responsavel' => 'Responsável',
            'icon_visualizar' => '../../assets/images/visualizar.png'
        ],
        [
            'nome' => 'Nome da ONG',
            'responsavel' => 'Responsável',
            'icon_visualizar' => '../../assets/images/visualizar.png'
        ],
        [
            'nome' => 'Nome da ONG',
            'responsavel' => 'Responsável',
            'icon_visualizar' => '../../assets/images/visualizar.png'
        ],
        [
            'nome' => 'Nome da ONG',
            'responsavel' => 'Responsável',
            'icon_visualizar' => '../../assets/images/visualizar.png'
        ]
    ]
?>
<!-- INICIO CÓDIGO -->

<main>
    <section>
        <div class="principal">
            <h1 class="titulo-inicial">Ongs a serem aprovadas</h1>
            <table class="table">
            <tbody>
                <?php foreach ($ongs as $ong) { ?>
                <tr class="linha-coluna">
                    <td class="info-ong"><?php echo $ong['nome'] ?> <br>
                        <?php echo $ong['responsavel'] ?>
                    </td>
                    <td>
                        <img class="icon-visible" id="icon-visible" src="<?php echo $ong['icon_visualizar'] ?>" alt="">
                    </td>
                    <td class="botoes">
                        <button class="btn-aprovar" id="btn-aprovar">Aprovar</button>
                        <button class="btn-recusar" id="btn-recusar">Recusar</button>
                    </td>
                </tr>

                <?php } ?>
            </tbody>
            </table>

                    <!-- tela visualizar pedido -->
            <div class="tela-visualiza-solicitacao" id="tela-visualiza-solicitacao">
        
            <div class="card-visualiza-solicitacao">
                <div class="logo-descricao">
                    <img src="../../assets/images/avatar_logo.png" alt="">  
                    <h3>Nome da Ong <br> 00.000.000/0000-00</h3>
                </div>
                <div>
                    <div><p>Somos a Coca-Cola e acreditamos no impacto positivo que seu sistema pode gerar. Estamos interessados em estabelecer uma parceria para apoiar seus projetos e promover juntos um futuro melhor. Aguardamos ansiosamente seu retorno.</p></div>      
                </div>
            </div>

            </div>

                <!-- visualizar aprovação-->
            <div class="tela-confirma-solicitacao" id="tela-confirma-solicitacao">
                <div class="card-confirma-solicitacao">
                    <div><img src="../../assets/images/envelope-verde.svg" alt=""></div>   
                    <div><h1>Ong aprovada</h1></di>
                    <div><p>Um email foi enviado para informar</p></div>
                </div>    
            </div>
    </div>
    <!-- visualiza  recusa-->
    <div class="tela-recusa-solicitacao" id="tela-recusa-solicitacao">
                    <div class="card-recusa-solicitacao">
                        <div><img src="../../assets/images/envelope-vermelho.svg" alt=""></div>   
                        <div><h1>Ong recusada</h1></div>
                        <div><p>Um email foi enviado para informar</p></div>  
                    </div>
    </div>
    </section>
</main>
             



<?php
    $jsPagina = ["ongs-a-serem-aprovadas.js"]; //Colocar o arquivo .js (exemplo: 'cadastro.js')
    require_once '../../components/footer.php';
?>