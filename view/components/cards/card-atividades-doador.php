<?php
switch ($atividade['tipo']):
    case 'doacao':
        $titulo = 'Doação Realizada';
        $icone = 'icon-doacao.png';
        $valorFormatado = number_format($atividade['valor'], 0, ',', '.');
        $texto = "Você doou <strong>R$ $valorFormatado</strong> para o projeto <strong>{$atividade['nome']}</strong>!";
        break;
    case 'apoio':
        $titulo = 'Projeto Apoiado';
        $icone = 'icon-apoio.png';
        $texto = "Você apoiou o projeto <strong>{$atividade['nome']}</strong>!";
        break;
    case 'ong_favorita':
        $titulo = 'ONG Salva';
        $icone = 'icon-coracao-amarelo.png';
        $texto = "Você favoritou a ONG <strong>{$atividade['nome']}</strong>!";
        break;
    case 'projeto_favorito':
        $titulo = 'Projeto Salvo';
        $icone = 'icon-coracao-azul.png';
        $texto = "Você favoritou o projeto <strong>{$atividade['nome']}</strong>!";
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
        <span><?= $atividade['data_registro'] ?></span>
    </div>
</div>