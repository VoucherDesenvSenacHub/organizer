<?php
$empresas = [
    [
        'nome' => 'Coca Cola',
        'foto_empresa' => '../../assets/images/avatar_logo.png',
        'cnpj' => '00.000.000/0000-00',
        'icon_visualizar' => '../../assets/images/visualizar.png'
    ],
    [
        'nome' => 'Coca Cola',
        'foto_empresa' => '../../assets/images/avatar_logo.png',
        'cnpj' => '00.000.000/0000-00',
        'icon_visualizar' => '../../assets/images/visualizar.png'
    ],
    [
        'nome' => 'Coca Cola',
        'foto_empresa' => '../../assets/images/avatar_logo.png',
        'cnpj' => '00.000.000/0000-00',
        'icon_visualizar' => '../../assets/images/visualizar.png'
    ],
    [
        'nome' => 'Coca Cola',
        'foto_empresa' => '../../assets/images/avatar_logo.png',
        'cnpj' => '00.000.000/0000-00',
        'icon_visualizar' => '../../assets/images/visualizar.png'
    ],
    [
        'nome' => 'Coca Cola',
        'foto_empresa' => '../../assets/images/avatar_logo.png',
        'cnpj' => '00.000.000/0000-00',
        'icon_visualizar' => '../../assets/images/visualizar.png'
    ],
    [
        'nome' => 'Coca Cola',
        'foto_empresa' => '../../assets/images/avatar_logo.png',
        'cnpj' => '00.000.000/0000-00',
        'icon_visualizar' => '../../assets/images/visualizar.png'
    ],
    [
        'nome' => 'Coca Cola',
        'foto_empresa' => '../../assets/images/avatar_logo.png',
        'cnpj' => '00.000.000/0000-00',
        'icon_visualizar' => '../../assets/images/visualizar.png'
    ],
    [
        'nome' => 'Coca Cola',
        'foto_empresa' => '../../assets/images/avatar_logo.png',
        'cnpj' => '00.000.000/0000-00',
        'icon_visualizar' => '../../assets/images/visualizar.png'
    ],
    [
        'nome' => 'Coca Cola',
        'foto_empresa' => '../../assets/images/avatar_logo.png',
        'cnpj' => '00.000.000/0000-00',
        'icon_visualizar' => '../../assets/images/visualizar.png'
    ],
    [
        'nome' => 'Coca Cola',
        'foto_empresa' => '../../assets/images/avatar_logo.png',
        'cnpj' => '00.000.000/0000-00',
        'icon_visualizar' => '../../assets/images/visualizar.png'
    ]
]
    ?>

<?php
$tituloPagina = ''; // Definir o título da página
$cssPagina = ['adm/solicitacao-parcerias.css']; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
require_once '../../components/header-adm.php';
?>
<!-- COMEÇAR SEU CÓDIGO AQUI -->
<div class="principal">
    <div class="top">
        <h1 class="titulo-solicitacao">SOLICITAÇÃO DE PARCERIAS</h1>
    </div>


    <div class="solicitacoes">
        <?php foreach ($empresas as $empresa) { ?>
            <div class="card_empresa">
                <div class="card-esq">
                    <img class="perfil_img" src=<?php echo $empresa['foto_empresa'] ?> alt="">
                    <div class="info_empresa">
                        <h2 class="nome_empresa"><?php echo $empresa['nome'] ?> </h2>
                        <p class="cnpj_empresa"><?php echo $empresa['cnpj'] ?></p>
                    </div>
                </div>
                <div class="card-dir">
                    <img class="icon-visible" id="visualiza-solicitacao" src="<?php echo $empresa['icon_visualizar'] ?>"
                        alt="">
                    <button class="btn-aceitar" id="btn-aceita-solicitacao">Aceitar</button>
                    <button class="btn-recusar" id="btn-recusa-solicitacao">Recusar</button>
                </div>
            </div>
        <?php } ?>
    </div>

</div>

<!-- tela visualiza pedido -->
<div class="tela-visualiza-solicitacao" id="tela-visualiza-solicitacao">

    <div class="card-visualiza-solicitacao">
        <div class="logo-descricao">
            <img src="../../assets/images/avatar_logo.png" alt="">
            <h3>Coca Cola <br> 00.000.000/0000-00</h3>
        </div>
        <div>
            <div>
                <p>Somos a Coca-Cola e acreditamos no impacto positivo que seu sistema pode gerar. Estamos interessados
                    em estabelecer uma parceria para apoiar seus projetos e promover juntos um futuro melhor. Aguardamos
                    ansiosamente seu retorno.</p>
            </div>
        </div>
    </div>

</div>

<!-- tela confirmação de pedido aceito -->
<div class="tela-confirma-solicitacao" id="tela-confirma-solicitacao">
    <div class="card-confirma-solicitacao">
        <div><img src="../../assets/images/parcerias.png" alt=""></div>
        <div>
            <h1>Parceria Aceita</h1>
        </div>
        <div>
            <p>Um email foi enviado para informar</p>
        </div>
    </div>
</div>

<!-- tela confirmação de pedido recusado -->
<div class="tela-recusa-solicitacao" id="tela-recusa-solicitacao">
    <div class="card-recusa-solicitacao">
        <div><img src="../../assets/images/parceria-recusada.png" alt=""></div>
        <div>
            <h1>Parceria Recusada</h1>
        </div>
        <div>
            <p>Um email foi enviado para informar</p>
        </div>
    </div>
</div>

<?php
$jsPagina = ['solicitacao-parcerias-adm.js']; //Colocar o arquivo .js (exemplo: 'cadastro.js')
require_once '../../components/footer.php';
?>