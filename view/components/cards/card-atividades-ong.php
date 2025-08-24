<?php
switch ($atividade['tipo']):
    case 'projeto':
        $titulo = 'Projeto Criado';
        $icone = 'icon-foguete.png';
        $texto = "Você criou o projeto <strong>{$atividade['nome']}</strong>!";
        break;
    case 'noticia':
        $titulo = 'Notícia Publicada';
        $icone = 'icon-noticia.png';
        $texto = "Você publicou a notícia <strong>{$atividade['nome']}</strong>!";
        break;
    case 'doacao':
        $titulo = 'Doação Recebida';
        $icone = 'icon-dinheiro.png';
        $valorFormatado = number_format($atividade['valor'], 0, ',', '.');
        $texto = "Seu projeto <strong>{$atividade['nome']}</strong> recebeu <strong>R$ $valorFormatado</strong>!";
        break;
    default:
        return;
endswitch;
?>

<div class="card-atividade">
    <div class="icon">
        <img src="../../assets/images/icons/<?= $icone ?>">
    </div>
    <div class="text">
        <h4><?= $titulo ?></h4>
        <p><?= $texto ?></p>
        <span><?= date('d/m/Y H:i', strtotime($atividade['data_registro'])) ?></span>
    </div>
</div>