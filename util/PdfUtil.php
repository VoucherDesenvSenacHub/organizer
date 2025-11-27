<?php 
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfUtil {

    public function gerarPdf($html, $titulo){
        
        require_once __DIR__ . '/../dompdf/autoload.inc.php';
        
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf();    
    
        $dompdf->loadHtml($html);
    
        $dompdf->setPaper('A4', 'portrait');
    
        $dompdf->render();
    
        $dompdf->stream($titulo);
    }
    }