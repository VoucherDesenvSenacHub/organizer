<?php

    // Criação de gráfico barras horizontais duplas

    /**
     * Sumary of graficoBarrasVerticais
     * 
     * @param int $width Largura em pixels da área da imagem do gráfico
     * @param int $height Altura em pixels da área da imagem do gráfico
     * @param array $dados Lista de dados para preenchimento do grafico
     * 
     * 
     */

  
    function graficoHorizontalDuplo($width, $height, $dados){
        $mi=0;
        $alturaUtil = $height-10;
        $larguraUtil = $width-100;
        $centroLinha = 30;
        $linhaDoacoes = '';
        $linhaVoluntarios = '';
        $textoIndices = '';
        $divisoes = (int)($alturaUtil/(sizeof($dados)));
        foreach($dados as $dv) {
            $lDoacao=($dv[1]*$larguraUtil)/100+70;
            $lVoluntario=($dv[2]*$larguraUtil)/100+70;
            $textoIndices = $textoIndices."
            <text x='1' y='$centroLinha'>$dv[0]</text>
            ";
            //Linha Doações
            $ldy = $centroLinha-12;
            $tdx = $lDoacao+3;
            $tdy = $centroLinha-8;
            $linhaDoacoes = $linhaDoacoes."
            <line x1='70' y1='$ldy'
            x2='570' y2='$ldy'
            style='stroke: #51CD32; stroke-width: 12px; opacity:0.3'/>
            <line x1='70' y1='$ldy'
            x2='$lDoacao' y2='$ldy'
            style='stroke: #51CD32; stroke-width: 12px;'/>
            <text x='$tdx' y='$tdy'>$dv[1]</text>
            ";
            //Linha Voluntários

            $lvy = $centroLinha+12;
            $tvx = $lVoluntario+3;
            $tvy = $centroLinha+18;
            $linhaVoluntarios = $linhaVoluntarios."
            <line x1='70' y1='$lvy'
            x2='570' y2='$lvy'
            style='stroke: #006CA2; stroke-width: 12px; opacity:0.3'/>
            <line x1='70' y1='$lvy'
            x2='$lVoluntario' y2='$lvy'
            style='stroke: #006CA2; stroke-width: 12px;'/>
            <text x='$tvx' y='$tvy'>$dv[2]</text>
            ";
            $centroLinha+=$divisoes;
        }
        return "
        <svg style = 'width: $width; height: $height;'>
        $textoIndices
        $linhaDoacoes
        $linhaVoluntarios
        </svg>
        ";
    }