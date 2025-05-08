<?php 
//Criação de gráfico tipo pizza

/**
 * 
 * Sumary of pie-graph
 * @param array $dados Array com nomes dos projetos e valores coletados nas doações
 * @param int $width Largura em pixels da área da imagem do gráfico
 * @param int $height Altura em pixels da área da imagem do gráfico
 */

 function graficoPizza($dados, $width, $height){
    $colors = ['#391df5', '#FFAE4C', '#3CC3DF', '#aedd2b', '#8979FF', '#FF928A', '#537FF1', '#dd423e', '#bf496a', ];
    $totalArrecadado = 0;
    $alturaUtil = $height-20;
    $larguraUtil = $width-40;
    $cx = $width/2;
    $cy = $height/2;
    $i=0;
    $grafico = '';
    $larguraUtil<=$alturaUtil ? $raio=$larguraUtil/4 : $raio=$alturaUtil/4;
    $stroke=$raio*2;
    $perimetro = 2*pi()*$raio;
    $arco = 0;
    $percentual = 0;
    $acumulado = 0;
    foreach($dados as $d){
        $totalArrecadado += $d[1];
    }
    foreach($dados as $d){
        $percentual = $d[1]*100/$totalArrecadado;
        $acumulado += $percentual;
        $arco = $acumulado*$perimetro/100;
        $grafico = $grafico."
        <circle cx='$cx' cy='$cy' r='$raio' fill='transparent' stroke='$colors[$i]'
        stroke-width='$stroke' stroke-dasharray='$arco $perimetro'/>
        ";
        $i++;
    }

    return "
    <svg style = 'width: $width; height: $height;'>
    $grafico
    </svg>
    ";
 }
?>