<?php
    session_start();
    session_unset(); 
    session_destroy();

    header('Location: ../view/pages/visitante/home.php?msg=volte');
    exit;