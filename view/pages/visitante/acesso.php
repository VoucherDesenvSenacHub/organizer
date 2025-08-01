<?php
session_start();
$_SESSION['perfil_usuario'] = null;
require_once __DIR__ . '/../../../autoload.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso | Organizer</title>
    <link rel="stylesheet" href="../../assets/css/global/style.css">
    <link rel="stylesheet" href="../../assets/css/pages/visitante/acesso.css">
</head>

<body>
    <main>
        <div class="container">
            <h1>Olá, <?= explode(' ', $_SESSION['usuario']['nome'])[0] ?></h1>
            <p>Escolha qual acesso você deseja:</p>
            <div class="forms">
                <?php if ($_SESSION['usuario']['acessos']['doador']): ?>
                    <form class="form-doador" action="../../../controller/UsuarioController.php?acao=acesso" method="POST">
                        <input type="hidden" name="perfil" value="doador">
                        <button>
                            <div class="img">
                                <img src="../../assets/images/pages/visitante/pessoa-flutuando.png">
                            </div>
                            <p>DOADOR</p>
                        </button>
                    </form>
                <?php endif; ?>
                <?php if ($_SESSION['usuario']['acessos']['ong']): ?>
                    <form class="form-ong" action="../../../controller/UsuarioController.php?acao=acesso" method="POST">
                        <input type="hidden" name="perfil" value="ong">
                        <button>
                            <div class="img">
                                <img src="../../assets/images/pages/visitante/pessoa-apresentando.png">
                            </div>
                            <p>ONG</p>
                        </button>
                    </form>
                <?php endif; ?>
                <?php if ($_SESSION['usuario']['acessos']['adm']): ?>
                    <form class="form-adm" action="../../../controller/UsuarioController.php?acao=acesso" method="POST">
                        <input type="hidden" name="perfil" value="adm">
                        <button>
                            <div class="img">
                                <img src="../../assets/images/pages/adm/notebook.png">
                            </div>
                            <p>ADM</p>
                        </button>
                    </form>
                <?php endif; ?>
            </div>
            <a href="../../../controller/logout.php">SAIR</a>
        </div>
    </main>
</body>

</html>