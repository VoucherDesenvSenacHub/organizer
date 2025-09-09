<?php 
    use Dompdf\Dompdf;
    use Dompdf\Options;

    require_once '../../../dompdf/autoload.inc.php';
    $dompdf = new Dompdf();
    
    ob_start();
    include ("voluntarios-por-projeto.php");
    $html = ob_get_clean();

    $option = new Options();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream("teste-html.pdf");
?>