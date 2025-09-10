<?php 
    use Dompdf\Dompdf;
    use Dompdf\Options;

    require_once '../../../dompdf/autoload.inc.php';
    $dompdf = new Dompdf();

    if($_SERVER['REQUEST_METHOD'] === "POST"):
        $idOng = $_POST['id-ong'];
        $relatorio = $_POST['relatorio'];
        // $html = "<h1>$idOng</h1>";
    endif;
    
    ob_start();
    include ($relatorio);
    $html = ob_get_clean();

    $option = new Options();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream("Relatorio.pdf");
?>