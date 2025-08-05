<!-- LOGIN DO USUÁRIO -->
<?php
require_once __DIR__ . '/../../model/UsuarioModel.php';

session_start(); // Inicia a sessão para armazenar os dados do usuário após o login

$usuarioModel = new Usuario();

$email = $_POST['email'];
$senha = $_POST['senha'];

// Busca os dados do usuário pelo e-mail fornecido
$contaUsuario = $usuarioModel->login($email);

// Verifica se a conta existe e se a senha informada está correta
if ($contaUsuario && password_verify($senha, $contaUsuario['senha'])) {
    // Armazena os dados principais do usuário na sessão
    $_SESSION['usuario'] = [
        'id'    => $contaUsuario['usuario_id'],
        'nome'  => $contaUsuario['nome'],
        'foto'  => $contaUsuario['foto_perfil'] ?? '../../assets/images/global/user-placeholder.jpg', // Foto padrão caso não tenha
        'acessos' => [
            'doador' => (bool) $contaUsuario['doador'], // Conversão explícita para booleano
            'ong'    => (bool) $contaUsuario['ong'],
            'adm'    => (bool) $contaUsuario['adm'],
        ]
    ];

    // Filtra os acessos verdadeiros (com valor true)
    $acessosUsuario = array_filter($_SESSION['usuario']['acessos']);
    $quantidadeAcessos = count($acessosUsuario);

    // Se o usuário tentar acessar como ONG, mas ainda não completou o cadastro da ONG
    if (array_key_first($acessosUsuario) === 'ong' && !$usuarioModel->buscarOngUsuario($_SESSION['usuario']['id'])) {
        header("Location: ../view/pages/ong/cadastro.php"); // Redireciona para o cadastro da ONG
        exit;
    }

    // Armazena o ID da ONG associada na sessão (caso exista)
    $_SESSION['ong_id'] = $usuarioModel->buscarOngUsuario($_SESSION['usuario']['id']);

    if ($quantidadeAcessos === 1) {
        // Se o usuário tem apenas um tipo de acesso, redireciona diretamente para a home correspondente
        $perfil = array_key_first($acessosUsuario);
        $_SESSION['perfil_usuario'] = $perfil;
        header("Location: ../../view/pages/{$perfil}/home.php");
        exit;
    } elseif ($quantidadeAcessos > 1) {
        // Se o usuário possui múltiplos acessos (por exemplo: doador e ONG), ele escolhe qual perfil quer usar
        header('Location: ../../view/pages/visitante/acesso.php');
        exit;
    } else {
        // Caso o usuário ainda não tenha definido nenhum tipo de acesso
        header('Location: ../../view/pages/visitante/primeiro-acesso.php');
        exit;
    }
}

// Caso falhe o login, redireciona de volta para a página anterior com uma mensagem de erro
header('Location: ' . $_SERVER['HTTP_REFERER'] . '?msg=logerro');
exit;
