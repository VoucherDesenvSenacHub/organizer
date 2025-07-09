<?php 
//Criação de gráfico tipo pizza

/**
 * 
 * Sumary of pie-graph
 * @param array $dados Array com nomes dos projetos e valores coletados nas doações
 * @param int $width Largura em pixels da área da imagem do gráfico
 * @param int $height Altura em pixels da área da imagem do gráfico
 */

 function graficoPizza($width, $height, $dados){
    $colors = ['#391df5', '#FFAE4C', '#3CC3DF', '#aedd2b', '#8979FF', '#FF928A', '#537FF1', '#FFFF00', '#DC143C', '#008000', '#xxff00', 'ff66ff'];
    $totalArrecadado = 0;
    $alturaUtil = $height-20; //Define margens de altura para o gráfico
    $divisoes = (int)($alturaUtil/(sizeof($dados))); // Calcula a separação para uso na escrita das legendas
    $yLegendas = $divisoes*(sizeof($dados));
    $larguraUtil = $width-40; //Define margens de largura para o gráfico
    $i=0;
    $grafico = '';
    $legenda = '';
    $larguraUtil<=$alturaUtil ? $raio=$larguraUtil/4 : $raio=$alturaUtil/4; // Define o raio máximo do círculo
    $width > 240 ? $cx = $larguraUtil-$raio-70 : $cx = $larguraUtil-$raio+5; // Define o centro do círculo no eixo X
    $cy = $height/2; // Define o centro do círculo no eixo Y
    $stroke=$raio*2; // Define a largura da linha de borda do círculo para preenchimento total
    $perimetro = 2*pi()*$raio; // Calcula o comprimento da circunferência
    $arco = 0;
    $percentual = 0;
    $acumulado = 0;

    //Laço para fazer a somatória do valor total arrecadado

    foreach($dados as $d){
        $totalArrecadado += $d[1];
        $acumulado = $totalArrecadado;
    }

    // Laço para desenhar o círculo e escrever as legendas

    for($i=sizeof($dados)-1;$i>=0;$i--){
        if($i==sizeof($dados)-1){
            $percentual = $totalArrecadado*100/$totalArrecadado; // Calcula o percentual de circunferência como círculo completo caso seja o primeiro a ser desenhado
        }else {
            $acumulado-=$dados[$i+1][1];
            $percentual = ($acumulado)*100/$totalArrecadado; // Calcula o percentual de circunferência proporcional ao valor arrecadado no projeto
        }
            $arco = $percentual*$perimetro/100; // Calcula o comprimento da circunferência de acordo com o valor arrecadado

            // Cria os gráficos de circunferência

            $grafico = $grafico."
            <circle cx='$cx' cy='$cy' r='$raio' fill='transparent' stroke='$colors[$i]'
            stroke-width='$stroke' stroke-dasharray='$arco $perimetro'/>
            ";

            // Cria as legendas
            if($width>240){
                $colRect = 30;
                $colLeg = 70;
                $rowCab = 30;
            }else{
                $colRect = 5;
                $colLeg = 30;
                $rowCab = 5;
            }
            $cabecalho = "<text x='$colLeg' y='$rowCab'>Total arrecadado R$ $totalArrecadado</text>";
            $leg = $dados[$i][0].' - R$ '.$dados[$i][1]; // Variável com texto de cada legenda
            $yIcone = $yLegendas-10; // Define o eixo Y onde será desenhado o retângulo/ícone da legenda
            $legenda = $legenda."
            <rect width='20' height='12' x='$colRect' y='$yIcone' fill='$colors[$i]'/>
            <text x='$colLeg' y='$yLegendas'>$leg</text>
            ";
            $yLegendas-=$divisoes;
    }
    

    return "
    <svg style = 'width: $width; height: $height;'>
    $cabecalho
    $grafico
    $legenda
    </svg>
    ";
 }
?>