<?php
//CONFIGURAÇÕES DA PÁGINA
$acesso = 'ong';
$tituloPagina = 'Projetos';
$cssPagina = ['ong/projetos.css'];
require_once '../../components/layout/base-inicio.php';

//IMPORTS
require_once __DIR__ . '/../../../model/ProjetoModel.php';

//CARREGA CARDS DE PROJETOS
$projetoModel = new Projeto();
$lista = $projetoModel->listar($_SESSION['ong_id']);
$temprojeto = $lista;
//PESQUISAR PROJETO
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    $lista = $projetoModel->buscarNome($pesquisa, $_SESSION['ong_id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $meta = $_POST['meta'];
    $ong = 1;
    $projetoModel->criar($nome, $descricao, $meta, $ong);
}

//FORMULÁRIO DE CRIAÇÃO DE PROJETO (popup)
$projeto = (object) [
    'projeto_id' => '',
    'nome' => '',
    'meta' => '',
    'descricao' => ''
];
require_once __DIR__ . '/../../components/popup/formulario-projeto.php';
?>
<div id="toast-projeto" class="toast">
    <i class="fa-regular fa-circle-check"></i>
    Projeto Criado com Sucesso!
</div>
<div id="toast-projeto-erro" class="toast erro">
    <i class="fa-solid fa-triangle-exclamation"></i>
    Falha ao Criar Projeto!
</div>

<!--CONTEÚDO PRINCIPAL DA PÁGINA-->
<div id="principal">
    <div class="header-principal">
        <div>
            <h1>PROJETOS DA SUA ONG</h1>
        </div>
        <form id="form-busca" action="projetos.php" method="GET">
            <input type="text" name="pesquisa" placeholder="Busque um projeto">
            <button class="btn"><i class="fa-solid fa-search"></i></button>
        </form>
        <div>
            <button class="botao-novo-projeto" onclick="abrir_popup('editar-projeto-popup')">NOVO PROJETO +</button>
        </div>
    </div>
    <?php if (isset($_GET['pesquisa'])) {
        echo "<p id='qnt-busca'><i class='fa-solid fa-search'></i> " . count($lista) . " Projetos Encontrados</p>";
    } ?>
    <!-- CARDS DE PROJETOS -->
    <div class="div-card-geral">
        <?php
        if ($lista) {
            $class = 'tp-ong';
            foreach ($lista as $projeto) {
                require '../../components/cards/card-projeto.php';
            }
        } 
        if (isset($temprojeto) && !$temprojeto) {
            echo 'Você ainda não tem nenhum projeto :(';
        }
        ?>
    </div>
</div>

<?php
$jsPagina = ['projetos-ong.js'];
require_once __DIR__ . '/../../components/footer.php';
?>