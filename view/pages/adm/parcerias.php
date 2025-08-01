<?php
$acesso = 'adm';
$tituloPagina = 'Parcerias | Organizer';
$cssPagina = ['adm/solicitacoes.css'];
require_once '../../components/layout/base-inicio.php';
?>
<main class="container">
    <h1><i class="fa-solid fa-handshake"></i> SOLICITAÇÃO DE PARCERIAS</h1>
    <div class="box-cards">
        <div class="card-solicitacao-empresa">
            <div class="nome">
                <div class="topo">
                    <h3>Nome da Empresa</h3>
                    <small>12/05/2025</small>
                </div>
                <small class="cnpj">20.942.513/0001-24</small><br>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, voluptatem. Perspiciatis voluptatem nostrum laudantium itaque consequatur, nihil dolore sapiente minima? Maiores pariatur rerum soluta atque amet corrupti nesciunt deserunt mollitia.</p>
            </div>
            <div class="btn-acoes">
                <button class="btn" onclick="abrir_popup('aprovar-popup')">APROVAR <i class="fa-solid fa-thumbs-up"></i></button>
                <button class="btn" onclick="abrir_popup('recusar-popup')">RECUSAR <i class="fa-solid fa-thumbs-down"></i></button>
            </div>
        </div>
        <div class="card-solicitacao-empresa">
            <div class="nome">
                <div class="topo">
                    <h3>Nome da Empresa</h3>
                    <small>12/05/2025</small>
                </div>
                <small class="cnpj">20.942.513/0001-24</small><br>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, voluptatem. Perspiciatis voluptatem nostrum laudantium itaque consequatur, nihil dolore sapiente minima? Maiores pariatur rerum soluta atque amet corrupti nesciunt deserunt mollitia.</p>
            </div>
            <div class="btn-acoes">
                <button class="btn" onclick="abrir_popup('aprovar-popup')">APROVAR <i class="fa-solid fa-thumbs-up"></i></button>
                <button class="btn" onclick="abrir_popup('recusar-popup')">RECUSAR <i class="fa-solid fa-thumbs-down"></i></button>
            </div>
        </div>
        <div class="card-solicitacao-empresa">
            <div class="nome">
                <div class="topo">
                    <h3>Nome da Empresa</h3>
                    <small>12/05/2025</small>
                </div>
                <small class="cnpj">20.942.513/0001-24</small><br>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, voluptatem. Perspiciatis voluptatem nostrum laudantium itaque consequatur, nihil dolore sapiente minima? Maiores pariatur rerum soluta atque amet corrupti nesciunt deserunt mollitia.</p>
            </div>
            <div class="btn-acoes">
                <button class="btn" onclick="abrir_popup('aprovar-popup')">APROVAR <i class="fa-solid fa-thumbs-up"></i></button>
                <button class="btn" onclick="abrir_popup('recusar-popup')">RECUSAR <i class="fa-solid fa-thumbs-down"></i></button>
            </div>
        </div>
        <div class="card-solicitacao-empresa">
            <div class="nome">
                <div class="topo">
                    <h3>Nome da Empresa</h3>
                    <small>12/05/2025</small>
                </div>
                <small class="cnpj">20.942.513/0001-24</small><br>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, voluptatem. Perspiciatis voluptatem nostrum laudantium itaque consequatur, nihil dolore sapiente minima? Maiores pariatur rerum soluta atque amet corrupti nesciunt deserunt mollitia.</p>
            </div>
            <div class="btn-acoes">
                <button class="btn" onclick="abrir_popup('aprovar-popup')">APROVAR <i class="fa-solid fa-thumbs-up"></i></button>
                <button class="btn" onclick="abrir_popup('recusar-popup')">RECUSAR <i class="fa-solid fa-thumbs-down"></i></button>
            </div>
        </div>
    </div>
</main>
<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-logado.php';
?>