<?php
// Toast do 'Favoritar'
if (isset($_SESSION['favorito'])) {
    if ($_SESSION['favorito']) {
        echo "<script>mostrar_toast('toast-favorito')</script>";
    } else {
        echo "<script>mostrar_toast('toast-remover-favorito')</script>";
    }
    unset($_SESSION['favorito']);
}
// Toast do 'Apoiar'
if (isset($_SESSION['apoiar'])) {
    if ($_SESSION['apoiar']) {
        echo "<script>mostrar_toast('toast-apoio')</script>";
    } else {
        echo "<script>mostrar_toast('toast-desapoio')</script>";
    }
    unset($_SESSION['apoiar']);
}

// Toast do 'Editar'
if (isset($_SESSION['editar-projeto'])) {
    if ($_SESSION['editar-projeto']) {
        echo "<script>mostrar_toast('toast-projeto')</script>";
    } else {
        echo "<script>mostrar_toast('toast-projeto-erro')</script>";
    }
    unset($_SESSION['editar-projeto']);
}

// Toast do 'Doar'
if (isset($_SESSION['doar-projeto'])) {
    if ($_SESSION['doar-projeto']) {
        echo "<script>mostrar_toast('toast-doacao')</script>";
    } else {
        echo "<script>mostrar_toast('toast-doacao-erro')</script>";
    }
    unset($_SESSION['doar-projeto']);
}