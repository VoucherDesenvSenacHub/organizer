<?php
session_start();
session_unset();
session_destroy();

session_start();
$_SESSION['mensagem_toast'] = ['sucesso', 'Tchau, até mais tarde!'];
header('Location: ../view/pages/visitante/home.php');
exit;