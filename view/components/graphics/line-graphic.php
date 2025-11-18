<?php
require_once '../../../model/RelatoriosModel.php';

/**
 * Cria um gráfico de linhas em SVG
 * 
 * @param int $width  Largura do gráfico
 * @param int $height Altura do gráfico
 * @param int $idOng  ID da ONG
 * 
 * @return string SVG renderizado
 */
function graficoLinhas($width, $height, $idOng)
{
    $relatorio = new RelatoriosModel();
    $ano = date('Y');

    // ----------------------------
    // 1. Coleta dos dados
    // ----------------------------
    $meses = ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'];
    $dados = [];
    $valores = [];

    for ($m = 1; $m <= 12; $m++) {
        $registro = $relatorio->painelDeArrecadacao($idOng, $m, $ano);

        $valor = $registro['total_doado'] ?? 0;
        $valor = (float)$valor;

        $dados[] = [$meses[$m-1], $valor];
        $valores[] = $valor;
    }

    // ----------------------------
    // 2. Cálculo dos índices (Y)
    // ----------------------------
    $maxValor = max($valores);

    // Evita divisão por zero
    if ($maxValor > 0) {
        $maxValor *= 1.1;
    } else {
        $maxValor = 10;
    }

    // Criar 5 divisões fixas
    $divisoesY = 5;
    $intervalo = $maxValor / $divisoesY;
    $indices = [];

    for ($i = 0; $i <= $divisoesY; $i++) {
        $indices[] = (int)($maxValor - $intervalo * $i);
    }

    // ----------------------------
    // 3. Parâmetros do gráfico
    // ----------------------------
    $xDash = ($width > 240) ? 40 : 20;
    $alturaUtil = $height - 25;
    $linhaBaseY = $height - 5;
    $xFinal = $width - 1;

    // ----------------------------
    // 4. Linhas horizontais + texto Y
    // ----------------------------
    $linhasHorizontais = '';
    $passoY = $alturaUtil / $divisoesY;

    for ($i = 0; $i <= $divisoesY; $i++) {
        $y = $i * $passoY;
        $valorIdx = 'R$ '.number_format($indices[$i], 2, ',', '.');

        $linhasHorizontais .= "
            <line x1='$xDash' y1='$y' x2='$width' y2='$y' style='stroke: #ccc; stroke-dasharray: 3;'/>
            <text x='0' y='".($y+10)."' font-size='10'>$valorIdx</text>
        ";
    }

    // ----------------------------
    // 5. Linhas verticais + meses
    // ----------------------------
    $barrasVerticais = '';
    $qtd = count($dados);
    $passoX = ($width - $xDash) / $qtd;

    for ($i = 0; $i < $qtd; $i++) {
        $x = $xDash + $i * $passoX;
        $mes = $dados[$i][0];

        $barrasVerticais .= "
            <line x1='$x' y1='0' x2='$x' y2='$alturaUtil' style='stroke: #ddd; stroke-dasharray: 4'/>
            <text x='$x' y='$linhaBaseY' font-size='10'>$mes</text>
        ";
    }

    // ----------------------------
    // 6. Linhas do gráfico
    // ----------------------------
    $grafico = '';
    $x = $xDash;
    $pontosX = [];
    $pontosY = [];

    foreach ($dados as $d) {
        $valor = $d[1];

        // proporcional
        $y = $alturaUtil - ($valor / $maxValor) * $alturaUtil;

        $pontosX[] = $x;
        $pontosY[] = $y;

        $x += $passoX;
    }

    // Desenhar linhas e pontos
    for ($i = 0; $i < $qtd - 1; $i++) {
        $grafico .= "
            <line x1='{$pontosX[$i]}' y1='{$pontosY[$i]}'
                  x2='{$pontosX[$i+1]}' y2='{$pontosY[$i+1]}'
                  style='stroke:#007AFF; stroke-width:2;'/>
            <circle cx='{$pontosX[$i]}' cy='{$pontosY[$i]}' r='4' fill='#007AFF'/>
        ";
    }

    // Último ponto
    $ultimo = $qtd - 1;
    $grafico .= "<circle cx='{$pontosX[$ultimo]}' cy='{$pontosY[$ultimo]}' r='4' fill='#007AFF'/>";

    // ----------------------------
    // 7. Retorno SVG
    // ----------------------------
    return "
        <svg width='$width' height='$height'>
            $linhasHorizontais
            $barrasVerticais
            $grafico
            <line x1='$xFinal' y1='0' x2='$xFinal' y2='$alturaUtil' style='stroke:black; stroke-dasharray:4;'/>
        </svg>
    ";
}
