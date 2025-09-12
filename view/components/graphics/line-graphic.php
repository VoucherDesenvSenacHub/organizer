<?php
require_once '../../../model/RelatoriosModel.php';

// Criação de gráfico de linhas

/**
 * Sumary of graficoBarrasVerticais
 * 
 * @param int $width Largura em pixels da área da imagem do gráfico
 * @param int $height Altura em pixels da área da imagem do gráfico
 * @param int $idOng ID da ong para query do banco de dados
 * 
 * 
 */


function graficoLinhas($width, $height, $idOng){
    $relatorio = new RelatoriosModel();
    $year = date('Y');
    $dados = array();
    $valoresArrecadados = array();
    $mesExtenso = ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'];
        for($month = 1; $month <=12; $month++):
            $arrecadacao = $relatorio->painelDeArrecadacao($idOng, $month, $year);
            if($arrecadacao['total_doado'] === null){
                $valorTotal = 0;
            }else {
                $valorTotal = (float)$arrecadacao['total_doado'];
            }
            $mes = [$mesExtenso[$month-1], $valorTotal];
            array_push($dados, $mes);
            array_push($valoresArrecadados, $valorTotal);
        endfor;
        $maiorIndice = max($valoresArrecadados)*1.1;
        $indices = array();

        // Cria um array com os índices a serem utilizados de acordo com a divisão exata possível
        if($maiorIndice != 0){
            if($maiorIndice % 5 == 0){
                $divisao = $maiorIndice / 5;
            }else if ($maiorIndice % 4 == 0){
                $divisao = $maiorIndice / 4;
            }else if ($maiorIndice % 3 == 0){
                $divisao = $maiorIndice / 3;
            }
            while($maiorIndice >=0){
                array_push($indices, (int)$maiorIndice);
                $maiorIndice -= $divisao;
            }
        } else {
            $maiorIndice = 5; // Cria uma média de índices fictícia caso não haja apoiadores nos projetos da ONG somente para renderização gráfica
            $indices = [5, 3, 0]; // Atribui índices verticais fictícios para o caso de não existência de apoiadores
        }
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
            $indiceCalculado = 'R$ '.number_format($indices[$mi], 2,',','.');
            $linhasHorizontais = $linhasHorizontais."
                <line x1='$xDash' y1='$i' x2='$width' y2='$i' style='stroke: gray; stroke-dasharray: 3 '/>
                <text x='0' y='$iText'>$indiceCalculado</text>     
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