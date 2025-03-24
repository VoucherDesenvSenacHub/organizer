<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($tituloPagina) ? $tituloPagina : 'Index'; ?></title>
    <!-- LINK DO FONT-AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    <link rel="icon" type="image/x-icon" href="../../assets/images/global/Logo-Organizer.png">
    <!-- CSS GLOBAL -->
    <link rel="stylesheet" href="../../assets/css/global/style.css">

    <!-- CSS Específicos da Página -->
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
        require_once 'navbar-usuario.php'; 
        require_once 'aside-usuario.php'; 
    ?>