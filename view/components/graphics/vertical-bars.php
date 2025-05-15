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
        $alturaUtil = $height-27;
        $linhasHorizontais = '';
        $barrasVerticais = '';
        $divisoes = (int)($alturaUtil/(sizeof($indices)-1));
        for($i = 1; $i <=$alturaUtil; $i+=$divisoes){
            $iText = $i+7;
            $linhasHorizontais = $linhasHorizontais."
            <line x1='40' y1='$i' x2='$width' y2='$i' style='stroke: black; stroke-dasharray: 4 '/>
            <text x='0' y='$iText' textlenght='7'>$indices[$mi]</text>";
            $mi++;
        }

        // Traça as linhas verticais extremas da esquerda e direita
        
        $linhasVerticais = "        
        <line x1='40' y1='0' x2='40' y2='$alturaUtil' style='stroke: black; stroke-dasharray: 4 '/>
        <line x1='599' y1='0' x2='599' y2='$alturaUtil' style='stroke: black; stroke-dasharray: 4 '/>
        ";

        //Desenha as barras verticais

        $divisoesHorizontais = (($width-60)/sizeof($dados));
        $pontoX = 40+($divisoesHorizontais/2); //Posição inicial do gráfico
        for($i = 0; $i<sizeof($dados); $i++){
            $pontoY = $alturaUtil-(($dados[$i][1]*$alturaUtil)/$indices[0]); //Calcula a altura da barra vertical? 
            $pontoTextoBase = $pontoX-($divisoesHorizontais/2)+15;
            $xTextoTopo = $pontoX-5;
            $yTextoTopo = $pontoY-3;
            $projeto = $dados[$i][0];
            $valorBarra = $dados[$i][1];
            $barrasVerticais = $barrasVerticais."
            <line x1='$pontoX' y1='$alturaUtil'
            x2='$pontoX'y2 ='$pontoY'
            style='stroke: #8DD9FF; stroke-width: 40px'/>
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

