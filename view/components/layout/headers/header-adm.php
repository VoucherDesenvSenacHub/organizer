<header id="header-adm">
    <div class="container">
        <a href="home.php">
            <div class="logo">
                <img src="../../assets/images/global/Logo-Organizer.png">
                <h1>Organizer</h1>
            </div>
        </a>
        <nav id="nav-bar">
            <ul>
                <li><a href="../adm/home.php">Home</a></li>
                <li><a href="../adm/ongs.php">Ongs</a></li>
                <li><a href="../adm/projetos.php">Projetos</a></li>
                <li><a href="../adm/doadores.php">Doadores</a></li>
            </ul>
        </nav>
        <div id="btns-adm">
            <a id="parceria" href="solicitacao-parceria.php">
                <i class="fa-solid fa-handshake"></i>
                <span>Parcerias</span>
            </a>
            <a id="relatorio" href="relatorios.php">
                <i class="fa-solid fa-chart-line"></i>
                <span>Relatórios</span>
            </a>
            <button id="btn-adm-conta" onclick="ativar_classe('btn-adm-conta')">
                <i class="fa-solid fa-user"></i>
                <span>Conta</span>
            </button>
            <div class="dropdown">
                <button><i class="fa-solid fa-user-pen"></i>Editar Perfil</button>
                <button onclick="abrir_popup('sair-da-conta-popup')"><i class="fa-solid fa-right-from-bracket"></i>Sair</button>
            </div>
            <div class="btn-login">
                <button onclick="menu_mobile()" id="hamburguer"></button>
            </div>
        </div>
    </div>
</header>