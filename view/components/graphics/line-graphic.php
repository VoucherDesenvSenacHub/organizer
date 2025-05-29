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

  
    function graficoLinhas($indices, $width, $height, $dados){
        $mi=0;
        if($width>240){
            $alturaUtil = $height-27; // Calcula a altura útil para vetorização do gráfico
            $xDash = 40;
        }else{
            $alturaUtil = $height-15; // Calcula a altura útil para vetorização do gráfico
            $xDash = 16;
        }
        $linhasHorizontais = '';
        $barrasVerticais = '';
        $xFinal = $width-1;
        $divisoes = (int)($alturaUtil/(sizeof($indices)-1));
            
        //Desenha linhas horizontais de referência do gráfico e escreve os índices do eixo Y

        for($i = 1; $i <=$alturaUtil; $i+=$divisoes){
            $width >240?$iText = $i+10 : $iText = $i+5;
            $linhasHorizontais = $linhasHorizontais."
                <line x1='$xDash' y1='$i' x2='$width' y2='$i' style='stroke: gray; stroke-dasharray: 3 '/>
                <text x='0' y='$iText'>$indices[$mi]</text>     
            ";
            $mi++;
        }

        // Desenha as divisões verticais e escreve os índices do eixo X
        $linhaIndicesY = $height-5;
        for($i = 0; $i < sizeof($dados); $i++){
            $indiceY = $dados[$i][0];
            $localTexto = ($i*($width-$xDash)/sizeof($dados))+$xDash;
            $barrasVerticais = $barrasVerticais."
            <text x='$localTexto' y='$linhaIndicesY' textlenght='7'>$indiceY</text>
            <line x1='$localTexto' y1='1' x2='$localTexto' y2='$alturaUtil' style='stroke: black; stroke-dasharray: 4 '/>
            ";
        }

        //Desenha o gráfico proporcional aos dados coletados
        $width > 240 ? $x1 = 60 : $x1 = 25;
        $passo = (($width-$xDash)/sizeof($dados));
        $x2 = $x1+$passo;
        $graficoLinhas = '';
        for($i=0; $i<sizeof($dados); $i++){
            $localPonto = $alturaUtil - ($alturaUtil*$dados[$i][1]/$indices[0]);
            if($i == sizeof($dados)-1){
                $localPonto2 = $localPonto;
                $x2 = $x1;
            }else{
                $localPonto2 = $alturaUtil - ($alturaUtil * $dados[$i+1][1]/$indices[0]);
            }
            $graficoLinhas = $graficoLinhas."
            <line x1='$x1' y1='$localPonto' x2='$x2' y2='$localPonto2'
            style='stroke: #007AFF; stroke-width: 2;'/>
            <circle r='4' cx='$x1' cy='$localPonto' fill='#007AFF'/>
            ";
            $x1+=$passo;
            $x2+=$passo;
        }
        
        return "
        <svg style = 'width: $width; height: $height;'>
        $linhasHorizontais
        $barrasVerticais
        $graficoLinhas
        <line x1='$xFinal' y1='1' x2='$xFinal' y2='$alturaUtil' style='stroke: black; stroke-dasharray: 4 '/>
        </svg>
        ";
    }