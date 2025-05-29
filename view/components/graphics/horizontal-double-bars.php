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
        if($width>240){
            $alturaUtil = $height-10;
            $larguraUtil = $width-100;
            $centroLinha = 30;
            $deslocamentoLdy = 12;
            $deslocamentoTdy  = 8;
            $deslocamentoLvy = 12;
            $deslocamentoTvy = 18;
            $inicioLinha = 70;
            $fimLinha = 570;
            $espessuraLinha = 12;
        }else{
            $alturaUtil = $height-5;
            $larguraUtil = $width-30;
            $centroLinha = 15;
            $deslocamentoLdy = 5;
            $deslocamentoTdy = 3;
            $deslocamentoLvy = 5;
            $deslocamentoTvy = 7;
            $inicioLinha = 40;
            $fimLinha = 230;
            $espessuraLinha = 7;
        }
        $linhaDoacoes = '';
        $linhaVoluntarios = '';
        $textoIndices = '';
        $divisoes = (int)($alturaUtil/(sizeof($dados)));
        foreach($dados as $dv) {
            $lDoacao=($dv[1]*$larguraUtil)/100+$inicioLinha;
            $lVoluntario=($dv[2]*$larguraUtil)/100+$inicioLinha;
            $textoIndices = $textoIndices."
            <text x='1' y='$centroLinha'>$dv[0]</text>
            ";
            //Linha Doações
            $tdx = $lDoacao+3;
            $ldy = $centroLinha-$deslocamentoLdy;
            $tdy = $centroLinha-$deslocamentoTdy;
            $linhaDoacoes = $linhaDoacoes."
            <line x1='$inicioLinha' y1='$ldy'
            x2='$fimLinha' y2='$ldy'
            style='stroke: #51CD32; stroke-width: $espessuraLinha; opacity:0.3'/>
            <line x1='$inicioLinha' y1='$ldy'
            x2='$lDoacao' y2='$ldy'
            style='stroke: #51CD32; stroke-width: $espessuraLinha;'/>
            <text x='$tdx' y='$tdy'>$dv[1]</text>
            ";
            //Linha Voluntários

            $lvy = $centroLinha+$deslocamentoLvy;
            $tvx = $lVoluntario+3;
            $tvy = $centroLinha+$deslocamentoTvy;
            $linhaVoluntarios = $linhaVoluntarios."
            <line x1='$inicioLinha' y1='$lvy'
            x2='$fimLinha' y2='$lvy'
            style='stroke: #006CA2; stroke-width: $espessuraLinha; opacity:0.3'/>
            <line x1='$inicioLinha' y1='$lvy'
            x2='$lVoluntario' y2='$lvy'
            style='stroke: #006CA2; stroke-width: $espessuraLinha;'/>
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