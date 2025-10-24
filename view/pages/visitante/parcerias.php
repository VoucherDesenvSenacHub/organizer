<?php
require_once __DIR__ . '/../../../model/AdminModel.php';
$acesso = $_SESSION['perfil_usuario'] ?? 'visitante';
$tituloPagina = 'Parcerias | Organizer';
$cssPagina = ['visitante/parcerias.css'];

//Buscar parcerias aprovadas
$adminModel = new AdminModel();
$parcerias = $adminModel->ListarParceriasAprovadas();
require_once '../../components//layout/base-inicio.php';
?>
<main class="container">
    <section class="top">
        <h1>NOSSOS PARCEIROS</h1>
        <p>Conheça empresas e organizações que colaboram conosco para criar um impacto positivo. Veja como essas parcerias ajudam a fortalecer a nossa missão.</p>
    </section>
    <section class="parceiros">
        <h3><i class="fa-solid fa-handshake"></i> EMPRESAS QUE NOS APOIAM</h3>
        <?php if (empty($parcerias)): ?>
            <div class="sem-parceiros">
                <p>Nenhuma parceria aprovada no momento.</p>
                <span>Em breve teremos empresas parceiras para apresentar!</span>
            </div>
        <?php else: ?>
            <div class="grid-parceiros">
                <?php foreach ($parcerias as $parceria): ?>
                    <div class="card-parceiro">
                        <div class="logo-empresa">
                            <i class="fa-solid fa-building"></i>
                            <!-- <img src="" alt=""> -->
                        </div>
                        <div class="texto">
                            <h4><?= htmlspecialchars($parceria['nome']) ?></h4>
                            <p><?= htmlspecialchars($parceria['descricao']) ?></p>
                            <span class="data-parceria">
                                <i class="fa-solid fa-calendar"></i>
                                Parceiro desde <?= $parceria['data_aprovacao'] ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <!-- Seção de Solicitação de Parceria -->
    <section class="solicitar-parceria">
        <div class="conteudo-solicitacao">
            <h3><i class="fa-solid fa-plus-circle"></i> QUER SER NOSSO PARCEIRO?</h3>
            <p>Junte-se a nós e faça parte dessa rede de impacto social. Sua empresa pode contribuir de diversas formas para fortalecer nossa missão.</p>
            <button class="btn" onclick="abrir_popup('parceria-popup')">Solicitar Parceria</button>
        </div>
    </section>
</main>

<?php require_once '../../components/popup/solicitacao-parceria.php'; ?>
<div class="popup-fundo" id="parceria-enviada">
    <div class="container-popup">
        <button class="btn-fechar-popup fa-solid fa-xmark" onclick="fechar_popup('parceria-enviada')"></button>
        <i class="fa-solid fa-thumbs-up"></i>
        <p>Solicitação de parceria enviada com sucesso! Nossa equipe entrará em contato em breve.</p>
    </div>
</div>

<?php
$jsPagina = ['visitante/parcerias.js'];
require_once '../../components/layout/footer/footer-visitante.php';

// Mostrar mensagem de erro ou sucesso.
if (isset($_SESSION['parceria'])) {
    if ($_SESSION['parceria']) {
        echo "<script>abrir_popup('parceria-enviada')</script>";
    }
    unset($_SESSION['parceria']);
}
?>