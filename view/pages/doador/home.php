
<?php 
    $tituloPagina = 'Home'; // Definir o título da página
    $cssPagina = ['doador/home.css']; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header-usuario.php';
    require_once '../../components/aside-usuario.php';
?>

<main>
    <section>
        <div class="container">
            <div id="secao-1">
                <div id="container-esq">
                    <div>
                        <h1>Olá Júlia</h1>
                        <p>Explore os projetos e as últimas novidades</p>
                    </div>
                    <div>
                        <h4>Visão Geral</h4>
                        <div class="visaogeral">
                            <div class="info">
                                <span>Minhas doações</span>
                                <h5>R$ 300</h5>
                            </div>
                            <div class="info">
                                    <span>Participações</span>
                                    <h5>4 Projetos</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="img-inicio">
                        <img src="../../assets/images/Team work-bro.png" alt="">
                    </div>
                </div>
            <div id="secao-2">
                <h3>Suas atividades recentes</h3>
                <div id="boxCard">
                    <div class="card">
                        <div class="icon" id="icon_money">
                            <img src="../../assets/images/money.png">
                        </div>
                        <div class="text-card">
                            <h4>Doação realizada</h5>
                            <p>Você doou R$ 50,00 para o Projeto “Educação para Todos”</p>
                            <span>04 de agosto de 2024, 14:21</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon" id="icon_heart">
                            <img src="../../assets/images/coracao.png" alt="">
                        </div>
                        <div class="text-card">
                            <h4>Projeto Salvo</h5>
                            <p>Você favoritou o Projeto “Amigos da Natureza””</p>
                            <span>02 de julho de 2024, 04:32</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon" id="icon_hug">
                            <img src="../../assets/images/abraco.png" alt="">
                        </div>
                        <div class="text-card">
                            <h4>Voluntariado Inscrito</h5>
                            <p>Você se inscreveu na ONG “Ajuda Animal””</p>
                            <span>04 de agosto de 2024, 14:21</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="secao-3">
                <h3>Projetos em destaques</h3>
                <div id="card-projeto">
                    <div class="card-projeto">
                        <div class="acoes-projeto">
                            <div class="share">
                                <i class="fa-solid fa-share-nodes"></i>
                            </div>
                            <div class="like">
                                <i class="fa-solid fa-heart"></i>
                            </div>
                        </div>
                        <div class="img-projeto">250x130</div>
                        <div class="info-projeto">
                            <h5>Nome Projeto</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                                    ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                            </p>
                            <div class="barra-doacao">
                                <span>30%</span>
                                <div class="barra">
                                    <div class="barra-verde"></div>
                                </div>
                            </div>
                        </div>
                        <a class="saiba-mais-projeto" href="#">Saiba Mais</a>
                    </div>
                    <div class="card-projeto">
                        <div class="acoes-projeto">
                            <div class="share">
                                <i class="fa-solid fa-share-nodes"></i>
                            </div>
                            <div class="like">
                                <i class="fa-solid fa-heart"></i>
                            </div>
                        </div>
                        <div class="img-projeto">250x130</div>
                        <div class="info-projeto">
                            <h5>Nome Projeto</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                                    ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                            </p>
                            <div class="barra-doacao">
                                <span>30%</span>
                                <div class="barra">
                                    <div class="barra-verde"></div>
                                </div>
                            </div>
                        </div>
                        <a class="saiba-mais-projeto" href="#">Saiba Mais</a>
                    </div>
                    <div class="card-projeto">
                        <div class="acoes-projeto">
                            <div class="share">
                                <i class="fa-solid fa-share-nodes"></i>
                            </div>
                            <div class="like">
                                <i class="fa-solid fa-heart"></i>
                            </div>
                        </div>
                        <div class="img-projeto">250x130</div>
                        <div class="info-projeto">
                            <h5>Nome Projeto</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laborum et? Repellendus perferendis provident
                                    ratione deserunt alias cumque et quasi odio amet temporibus, quam obcaecati dolores. Enim quibusdam a atque.
                            </p>
                            <div class="barra-doacao">
                                <span>30%</span>
                                <div class="barra">
                                    <div class="barra-verde"></div>
                                </div>
                            </div>
                        </div>
                        <a class="saiba-mais-projeto" href="#">Saiba Mais</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="meu-perfil">
        <div class="container-meu-perfil">
        <!-- Barra lateral -->
        <div class="sidebar">
            <div class="profile">
                <img src="../../assets/images/Foto.png" alt="Foto de Perfil">
                <p class="username">Julia</p>
                <p class="email">julia@gmail.com.br</p>
            </div>
            <div>
                <button onclick="abrir_popup_confirmacao('fundo-confirmacao')" class="logout">
                    <span class="material-symbols-outlined">logout</span>
                    Sair
                </button>
            </div>
        </div>
        <!-- Conteúdo principal -->
        <div class="main-content">
            <form action="#" method="POST">
                <div class="infose">
                    <h2>MEU PERFIL</h2>
                    <div class="info-grid">
                        <div class="info">
                            <label for="nome">Nome</label>
                            <div class="input-box">
                                <span class="material-symbols-outlined">person</span>
                                <input type="text" id="nome" value="Julia" disabled>
                            </div>
                        </div>
                        <div class="info">
                            <label for="telefone">Telefone</label>
                            <div class="input-box">
                                <span class="material-symbols-outlined">call</span>
                                <input type="tel" id="telefone" placeholder="(00) 00000-0000">
                                <img class="imge" src="../../assets/images/Vector.png" alt="foto">
                            </div>
                        </div>
                        <div class="info">
                            <label for="cpf">CPF</label>
                            <div class="input-box">
                                <span class="material-symbols-outlined">badge</span>
                                <input type="text" id="cpf" placeholder="000.000.000-00" required maxlength="11"
                                    disabled>
                            </div>
                        </div>
                        <div class="info">
                            <label for="nascimento">Data de Nascimento</label>
                            <div class="input-box">
                                <span class="material-symbols-outlined">calendar_today</span>
                                <input type="date" id="nascimento" disabled>
                                <img class="imge" src="../../assets/images/Vector.png" alt="foto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-se">
                    <h2>LOGIN</h2>
                    <div class="infon">
                        <label for="email">Email</label>
                        <div class="input-box">
                            <span class="material-symbols-outlined">mail</span>
                            <input type="email" id="email" value="julia@gmail.com.br">
                            <img class="imge" src="../../assets/images/Vector.png" alt="foto">
                        </div>
                    </div>        
                    <button class="change-password" type="submit"><span class="material-symbols-outlined">
                        key_vertical  
                    </span> Alterar Senha</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    <div id="fundo-confirmacao">
        <div id="confirmacao">
            <span>Deseja mesmo sair da conta?</span>
            <div>
                <a href="../visitante/home.php"><button class="sair">SIM</button></a>
                <button class="nao-sair" onclick="fechar_confirmacao()" href="">NÃO</button>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#cpf").mask("000.000.000-00");
            $("#telefone").mask("(00) 00000-0000");
        });
    </script>
</main>
<?php
    $jsPagina = ['home.js']; //Colocar o arquivo .js (exemplo: 'ONG/cadastro.js')
    require_once '../../components/footer.php';
?>