<?php

    // Criação de gráfico de linhas

    /**
     * Sumary of graficoBarrasVerticais
     * 
     * @param array $indices Lista de índices a serem colocados na primeira coluna vertical em ordem decrescente
     * @param int $width Largura em pixels da área da imagem do gráfico
     * @param int $height Altura em pixels da área da imagem do gráfico
     * @param array $dados Lista de dados para preenchimento do grafico
     * 
     * 
     */


    $mi=0;
    $alturaUtil = $height-27;
    $linhasHorizontais = '';
    $barrasVerticais = '';
    $iText = $i+10;
    $divisoes = (int)($alturaUtil/(sizeof($indices)-1));
    for($i = 1; $i <=$alturaUtil; $i+=$divisoes){
        $linhasHorizontais = $linhasHorizontais."
            <line x1='40' y1='$i' x2='$width' y2='$i' style='stroke: black; stroke-dasharray: 4 '/>
            <text x='0' y='$iText'>$indices[$mi]</text>        
        ";
    }

    function graficoLinhas($indices, $width, $height, $dados){

        return "
        <svg style = 'width: $width; height: $height;'>
        $linhasHorizontais

        </svg>
        ";
    }