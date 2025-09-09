<?php
$acesso = 'adm';
$tituloPagina = 'Painel de Doadores | Organizer';
$cssPagina = ['adm/doadores.css'];
require_once '../../components/layout/base-inicio.php';

require_once __DIR__ . '/../../../autoload.php';
$usuarioModel = new UsuarioModel();

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$tipo = '';
$valor = ['pagina' => $paginaAtual];

if ($_SERVER['REQUEST_METHOD'] = 'GET' && isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    $tipo = 'pesquisa';
    $valor = ['pesquisa' => $pesquisa, 'pagina' => $paginaAtual];
}

$lista = $usuarioModel->listar($tipo, $valor);
$totalRegistros = $usuarioModel->paginacaoUsuarios($tipo, $valor);
$paginas = ceil($totalRegistros / 14);

// Abrir o popup e ver o perfil do doador
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $usuario = $usuarioModel->buscar_perfil($id);
    require_once '../../components/popup/perfil-doador-adm.php';
    echo "<script>
        window.onload = function() {
            abrir_popup('perfil-doador-adm-popup');

            // Limpa o parâmetro 'id' da URL após abrir o popup
            const url = new URL(window.location.href);
            url.searchParams.delete('id');
            window.history.replaceState({}, document.title, url.pathname + url.search);
        };
    </script>";
}
?>

<main class="conteudo-principal">
    <section>
        <div class="container">
            <div class="top">
                <h1><i class="fa-solid fa-users"></i> PAINEL DE DOADORES</h1>
                <form id="form-busca" action="doadores.php" method="GET">
                    <input type="text" name="pesquisa" placeholder="Busque um doador">
                    <button class="btn" type="submit"><i class="fa-solid fa-search"></i></button>
                </form>
            </div>
            <!-- Quantidade da busca -->
            <?php if (isset($_GET['pesquisa'])) {
                echo "<p class='qnt-busca'><i class='fa-solid fa-search'></i> " . $totalRegistros . " Doadores Encontrados</p>";
            } ?>

            <section id="box-ongs">
                <?php
                if (isset($lista) && empty($lista)) {
                    echo '<p>Nenhum Doador cadastrado!</p>';
                } else {
                    foreach ($lista as $doador) {
                        require '../../components/cards/card-doador-adm.php';
                    }
                }
                ?>
            </section>
            <?php if ($paginas > 1): ?>
                <nav class="navegacao">
                    <?php for ($i = 1; $i <= $paginas; $i++): ?>
                        <a href="?pagina=<?= $i ?><?= isset($_GET['pesquisa']) ? '&pesquisa=' . urlencode($_GET['pesquisa']) : '' ?>"
                            class="<?= $i === $paginaAtual ? 'active' : '' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </nav>
            <?php endif; ?>
        </div>
    </section>
</main>
<!-- Mascara do popup de ver perfil -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    $("#telefone_div").mask("(00) 0 0000-0000");
    $("#cpf_div").mask("000.000.000-00");
</script>
<?php
$jsPagina = []; //Colocar o arquivo .js
require_once '../../components/layout/footer/footer-logado.php';
?>