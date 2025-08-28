<?php

    // Criação de gráfico de barras verticais

    /**
     * Sumary of graficoBarrasVerticais
     * 
     * @param int $width Largura em pixels da área da imagem do gráfico
     * @param int $height Altura em pixels da área da imagem do gráfico
     * @param array $dados Lista de dados para preenchimento do grafico
     * 
     * 
     */


    function graficoBarrasVerticais($width, $height, $dados){

        /*
        Necessário extrair as quantidades de apoiadores que vêm através do array $dados, identificar o maior valor,
        arredondar para o primeiro decimal acima e dividir os índices para impressão lateral.
        */

        // Calcula uma média das quantidades de apoiadores dos projetos da ONG para determinar o índice máximo do gráfico
        $mediaIndices = 0;
        $indicesVert = array();
        if(sizeof($dados)>1){
            for($i = 0; $i<sizeof($dados); $i++){
                $mediaIndices += $dados[$i][1];
            }
            // Cria um array com os índices a serem utilizados de acordo com a divisão exata possível
            if($mediaIndices != 0){
                if($mediaIndices % 5 == 0){
                    $divisao = $mediaIndices / 5;
                }else if ($mediaIndices % 4 == 0){
                    $divisao = $mediaIndices / 4;
                }else if ($mediaIndices % 3 == 0){
                    $divisao = $mediaIndices / 3;
                }
                while($mediaIndices >=0){
                    array_push($indicesVert, $mediaIndices);
                    $mediaIndices -= $divisao;
                }
            } else {
                $mediaIndices = 5; // Cria uma média de índices fictícia caso não haja apoiadores nos projetos da ONG somente para renderização gráfica
                $indicesVert = [5, 3, 0]; // Atribui índices verticais fictícios para o caso de não existência de apoiadores
            }
        }else {
            $indicesVert = [50, 25, 0];
        }
        
        // Traça as linhas horizontais e escreve índices

        $mi=0;
        if($width>240){
            $alturaUtil = $height-27; // Define a altura útil para renderização do gráfico
            $xDash = 40;
            $divisoesHorizontais = (($width-60)/sizeof($dados));
            $pontoX = 40+($divisoesHorizontais/2); //Posição inicial do gráfico
        }else if($width <=240){
            $alturaUtil = $height-10; // Define a altura útil para renderização do gráfico
            $xDash = 13;
            $divisoesHorizontais = (($width-20)/sizeof($dados));
            $pontoX = 10+($divisoesHorizontais/2); //Posição inicial do gráfico
        }
        $linhasHorizontais = '';
        $barrasVerticais = '';
        $limite = $width-1;
        $divisoes = (int)($alturaUtil/(sizeof($indicesVert)-1)); // Calcula a altura das divisões baseada na altura útil
        for($i = 1; $i <=$alturaUtil; $i+=$divisoes){
            $width > 200 ? $yDash = $i : $yDash = $i;
            $iText = $yDash+6;
            $linhasHorizontais = $linhasHorizontais."
            <line x1='$xDash' y1='$yDash' x2='$width' y2='$yDash' style='stroke: gray; stroke-dasharray: 3 '/>
            <text x='0' y='$iText' textlenght='7'>$indicesVert[$mi]</text>";            
            $mi++;
        }

        // Traça as linhas verticais extremas da esquerda e direita
        
        $linhasVerticais = "        
        <line x1='$xDash' y1='0' x2='$xDash' y2='$yDash' style='stroke: gray; stroke-dasharray: 3 '/>
        <line x1='$limite' y1='0' x2='$limite' y2='$yDash' style='stroke: gray; stroke-dasharray: 3 '/>
        ";

        //Desenha as barras verticais de acordo com as quantidades de apoiadores
        
        $larguraBarra = $width * 0.065;
        for($i = 0; $i<sizeof($dados); $i++){
            $pontoY = $alturaUtil-(($dados[$i][1]*$alturaUtil)/$indicesVert[0]); //Calcula a altura da barra vertical
            $pontoTextoBase = $pontoX-($divisoesHorizontais/2.5);
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
    function pdfVoluntariosPorProjeto($dados){
        $linha = array();
        foreach($dados as $d){
            array_push($linha, $d);
        }
        $pdf = "
        <!DOCTYPE html>
        <html lang='pt-br'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Relatório de Usuários</title>
        </head>
        <body>
            
        </body>
        </html>
        ";
        return $pdf;
    }
?>

