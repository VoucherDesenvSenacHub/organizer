<!-- LOGIN DO USUÁRIO -->
<?php
require_once __DIR__ . '/../../model/UsuarioModel.php';

session_start();

$usuarioModel = new Usuario();

$email = $_POST['email'];
$senha = $_POST['senha'];

$contaUsuario = $usuarioModel->login($email);

if ($contaUsuario && password_verify($senha, $contaUsuario['senha'])) {
    // Guardar dados do usuário na sessão de forma organizada
    $_SESSION['usuario'] = [
        'id'    => $contaUsuario['usuario_id'],
        'nome'  => $contaUsuario['nome'],
        'foto'  => $contaUsuario['foto_perfil'] ?? '../../assets/images/global/user-placeholder.jpg',
        'acessos' => [
            'doador' => (bool) $contaUsuario['doador'],
            'ong'    => (bool) $contaUsuario['ong'],
            'adm'    => (bool) $contaUsuario['adm'],
        ]
    ];

    $acessosUsuario = array_filter($_SESSION['usuario']['acessos']);
    $quantidadeAcessos = count($acessosUsuario);

    // Se o usuário escolheu ser ong, mas ainda não fez o cadastro
    if (array_key_first($acessosUsuario) === 'ong' && !$usuarioModel->buscarOngUsuario($_SESSION['usuario']['id'])) {
        header("Location: ../view/pages/ong/cadastro.php");
        exit;
    }

    $_SESSION['ong_id'] = $usuarioModel->buscarOngUsuario($_SESSION['usuario']['id']);

    if ($quantidadeAcessos === 1) {
        // Se o usuário tiver apenas 1 acesso, vai direto para home
        $perfil = array_key_first($acessosUsuario);
        $_SESSION['perfil_usuario'] = $perfil;
        header("Location: ../../view/pages/{$perfil}/home.php");
        exit;
    } elseif ($quantidadeAcessos > 1) {
        header('Location: ../../view/pages/visitante/acesso.php'); // Deixa ele escolher
        exit;
    } else {
        header('Location: ../../view/pages/visitante/primeiro-acesso.php'); // Ainda não escolheu nenhum
        exit;
    }
}

header('Location: ' . $_SERVER['HTTP_REFERER'] . '?msg=logerro');
exit;
