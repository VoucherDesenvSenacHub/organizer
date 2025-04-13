<div id="meu-perfil">
        <div class="container-meu-perfil">
        <!-- Barra lateral -->
        <div class="sidebar">
            <div class="profile">
                <img src="../../assets/images/Foto.png" alt="Foto de Perfil">
                <p class="username"><?= $_SESSION['doador_nome'] ?></p>
                <p class="email">julia@gmail.com.br</p>
            </div>
            <div>
                <button onclick="abrir_popup('sair-da-conta-popup')" class="logout">
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
                                <input type="text" id="nome" value="<?= $_SESSION['doador_nome'] ?>" disabled>
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