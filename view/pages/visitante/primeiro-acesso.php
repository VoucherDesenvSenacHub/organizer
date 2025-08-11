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
    <link rel="stylesheet" href="../../assets/css/pages/visitante/primeiro-acesso.css">
</head>

<body>
    <main>
        <div class="container">
            <div>
                <h1>Bem Vindo ao Organizer!</h1>
                <p>Como você quer fazer parte dessa rede do bem?</p>
            </div>
            <div class="escolha">
                <div class="item">
                    <img src="../../assets/images/pages/visitante/pessoa-flutuando.png">
                    <div>
                        <h1>DOADOR</h1>
                        <p>Ajude projetos sociais a crescerem e alcançarem mais pessoas.</p>
                        <form onsubmit="return confirm('Confirmar sua escolha como Doador?')" action="../../../controller/Usuario/UsuarioPrimeiroAcessoController.php" method="POST">
                            <input type="hidden" name="escolha" value="doador">
                            <button class="btn">Ser um Doador</button>
                        </form>
                    </div>
                </div>
                <div class="item">
                    <img src="../../assets/images/pages/visitante/pessoa-apresentando.png">
                    <div>
                        <h1>ORGANIZAÇÃO</h1>
                        <p>Cadastre sua organização e divulgue projetos que fazem a diferença.</p>
                        <form onsubmit="return confirm('Confirmar sua escolha como Organização?')" action="../../../controller/Usuario/UsuarioPrimeiroAcessoController.php" method="POST">
                            <input type="hidden" name="escolha" value="ong">
                            <button class="btn">Ser uma Organização</button>
                        </form>
                    </div>
                </div>
            </div>
            <a href="../../../controller/logout.php">SAIR</a>
        </div>
    </main>
</body>

</html>