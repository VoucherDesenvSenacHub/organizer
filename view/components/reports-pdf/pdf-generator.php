<?php 
    use Dompdf\Dompdf;
    use Dompdf\Options;

    require_once __DIR__ . '/../../../dompdf/autoload.inc.php';
    $dompdf = new Dompdf();
    $idOng = null;
    $relatorio = null;

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $idOng = $_POST['id-ong'];
        $relatorio = $_POST['relatorio'];
    } else{
        $relatorio = 'recibo-doacao.php';
    }
    
    ob_start();
    include ($relatorio);
    $html = ob_get_clean();

    $option = new Options();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream("Relatorio.pdf");
?>