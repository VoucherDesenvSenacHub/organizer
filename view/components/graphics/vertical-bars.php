<?php

    // Criação de gráfico de barras verticais

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


    function graficoBarrasVerticais($indices, $width, $height, $dados){

        // Traça as linhas horizontais e índices

        $mi=0;
        if($width>240){
            $alturaUtil = $height-7; // Define a altura útil para renderização do gráfico
            $xDash = 40;
            $divisoesHorizontais = (($width-60)/sizeof($dados));
            $pontoX = 40+($divisoesHorizontais/2); //Posição inicial do gráfico
        }else if($width <=240){
            $alturaUtil = $height-27; // Define a altura útil para renderização do gráfico
            $xDash = 13;
            $divisoesHorizontais = (($width-20)/sizeof($dados));
            $pontoX = 10+($divisoesHorizontais/2); //Posição inicial do gráfico
        }
        $linhasHorizontais = '';
        $barrasVerticais = '';
        $limite = $width-1;
        $divisoes = (int)($alturaUtil/(sizeof($indices)-1)); // Calcula a altura das divisões baseada na altura útil
        for($i = 1; $i <=$alturaUtil; $i+=$divisoes){
            $width > 200 ? $yDash = $i : $yDash = $i;
            $iText = $yDash+6;
            $linhasHorizontais = $linhasHorizontais."
            <line x1='$xDash' y1='$yDash' x2='$width' y2='$yDash' style='stroke: gray; stroke-dasharray: 3 '/>
            <text x='0' y='$iText' textlenght='7'>$indices[$mi]</text>";
            $mi++;
        }

        // Traça as linhas verticais extremas da esquerda e direita
        
        $linhasVerticais = "        
        <line x1='$xDash' y1='0' x2='$xDash' y2='$yDash' style='stroke: gray; stroke-dasharray: 3 '/>
        <line x1='$limite' y1='0' x2='$limite' y2='$yDash' style='stroke: gray; stroke-dasharray: 3 '/>
        ";

        //Desenha as barras verticais

        
        $larguraBarra = $width * 0.065;
        for($i = 0; $i<sizeof($dados); $i++){
            $pontoY = $alturaUtil-(($dados[$i][1]*$alturaUtil)/$indices[0]); //Calcula a altura da barra vertical? 
            $pontoTextoBase = $pontoX-($divisoesHorizontais/2);
            $width >240 ? $pontoTextoBase+=15 : $pontoTextoBase+=5;
            $xTextoTopo = $pontoX-5;
            $yTextoTopo = $pontoY-3;
            $projeto = $dados[$i][0];
            $valorBarra = $dados[$i][1];
            $barrasVerticais = $barrasVerticais."
            <line x1='$pontoX' y1='$alturaUtil'
            x2='$pontoX'y2 ='$pontoY'
            style='stroke: #8DD9FF; stroke-width: $larguraBarra'/>
            <text x='$pontoTextoBase' y='$height'>$projeto</text>
            <text x='$xTextoTopo' y='$yTextoTopo'>$valorBarra</text>            
            ";
            $pontoX = $pontoX+$divisoesHorizontais;
        }
        return "
            <svg style = 'width: $width; height: $height;'>
            $linhasHorizontais
            $linhasVerticais
            $barrasVerticais
            </svg>
                
        ";

    }
?>

