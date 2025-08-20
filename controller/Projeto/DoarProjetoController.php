<?php
// Fazer doação (doador)
if (isset($_POST['valor-doacao'])) {
    $valor = $_POST['valor-doacao'];
    if ($valor == 'outro') {
        $valor = $_POST['valor-personalizado'];
    }
    if ($valor + $projeto['valor_arrecadado'] > $projeto['meta']) {
        echo "<script>alert('O valor ultrapassou a meta!! Doe um valor menor.')</script>";
    } elseif ($valor <= 0) {
        echo "<script>alert('Valor inválido!! Doe um valor maior.')</script>";
    } else {
        $doacao = $projetoModel->doacao($projeto['projeto_id'], $_SESSION['usuario']['id'], $valor);
        if ($doacao > 0) {
            header("Location: perfil.php?id=$IdProjeto&msg=doacao");
            exit;
        }
    }
}
