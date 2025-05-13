<?php 

// Cálculo das medidas dos gráficos para responsividade

/**
 * 
 * Componente que renderiza um formuláro para transferência de variáveis referentes ao tamanho dos gráficos
 * 
 */

 function calculaGraficos(){

    return "
    <form action='relatorios.php' method='POST' id='capturar-tamanho-tela'>
        <input type='hidden' name='largura' id='largura'>
        <input type='hidden' name='altura' id='altura'>
    </form>
    ";
 }


