<?php
require_once '../../model/NoticiaModel.php';
require_once '../../service/AuthService.php';
AuthService::verificaLoginOng();

$noticiaModel = new NoticiaModel();

// Validação dos inputs
$inputs = filter_input_array(INPUT_POST, [
    'titulo'    => FILTER_SANITIZE_SPECIAL_CHARS,
    'texto'     => FILTER_SANITIZE_SPECIAL_CHARS,
    'subtitulo' => FILTER_SANITIZE_SPECIAL_CHARS,
    'subtexto'  => FILTER_SANITIZE_SPECIAL_CHARS,
    'id'        => FILTER_VALIDATE_INT,
]);

$titulo    = $inputs['titulo']    ?? null;
$texto     = $inputs['texto']     ?? null;
$subtitulo = $inputs['subtitulo'] ?? null;
$subtexto  = $inputs['subtexto']  ?? null;
$noticiaId = $inputs['id']        ?? null;

$ongId = $_SESSION['ong_id'] ?? null;
// Criar uma Notícia
if (!$noticiaId) {
    if ($titulo && $texto && $subtitulo && $subtexto) {
        $noticiaModel->criar($titulo, $subtitulo, $texto, $subtexto, $ongId);
        $_SESSION['criar-noticia'] = true;
    }
    $_SESSION['criar-noticia'] = false;
}
// Editar uma Notícia
else {
    $edicao = $noticiaModel->editar($noticiaId, $titulo, $subtitulo, $texto, $subtexto);
    $_SESSION['editar-noticia'] = (bool) $edicao;
    header('Location: ../../view/pages/noticia/perfil.php?id=' . $noticiaId);
    exit;
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;