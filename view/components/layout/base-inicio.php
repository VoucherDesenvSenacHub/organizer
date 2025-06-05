<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título da aba (dinâmico) -->
    <title><?= isset($tituloPagina) ? $tituloPagina : 'Sem Nome'; ?></title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/images/global/Logo-Organizer.png">
    <!-- CSS global do sistema -->
    <link rel="stylesheet" href="../../assets/css/global/style.css">
    <!-- CSS específico da página (se houver) -->
    <?php
    if (isset($cssPagina) && is_array($cssPagina)) {
        foreach ($cssPagina as $css) {
            echo '<link rel="stylesheet" href="../../assets/css/pages/' . $css . '">' . PHP_EOL;
        }
    }
    ?>
</head>

<body>
    <?php
        require_once 'includes/popup_loader.php';
        require_once 'headers/header.php';
    ?>