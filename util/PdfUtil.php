<?php 
    use Dompdf\Dompdf;
    use Dompdf\Options;

    require_once __DIR__ . '/../dompdf/autoload.inc.php';
    $dompdf = new Dompdf();
    
    ob_start();

    include ($relatorio);

    $html = ob_get_clean();

    $option = new Options();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream($titulo);