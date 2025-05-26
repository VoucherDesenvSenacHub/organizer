<header id="header-ong">
    <div class="container">
        <a href="home.php">
            <div class="logo">
                <img src="../../assets/images/global/Logo-Organizer.png">
                <h1>Organizer</h1>
            </div>
        </a>
        <nav id="nav-bar">
            <ul>
                <li><a href="../ong/home.php">Home</a></li>
                <li><a href="projetos.php">Projetos</a></li>
                <li><a href="voluntarios.php">Voluntários</a></li>
                <li><a href="relatorios.php">Relatórios</a></li>
            </ul>
        </nav>
        <div id="btns-ong">
            <button id="btn-ong-conta" onclick="ativar_classe('btn-ong-conta')">
                <i class="fa-solid fa-user"></i>
                <span>Conta</span>
            </button>
            <div class="dropdown">
                <a href="conta.php"><button><i class="fa-solid fa-user-pen"></i>Editar Perfil</button></a>
                <button onclick="abrir_popup('sair-da-conta-popup')"><i class="fa-solid fa-right-from-bracket"></i>Sair</button>
            </div>
            <div class="btn-login">
                <button onclick="menu_mobile()" id="hamburguer"></button>
            </div>
        </div>
    </div>
</header>