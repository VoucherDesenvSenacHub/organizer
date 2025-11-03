<?php 
    use Dompdf\Dompdf;
    use Dompdf\Options;

    require_once __DIR__ . '/../../../dompdf/autoload.inc.php';
    $dompdf = new Dompdf();

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $idOng = $_POST['id-ong'];
        $relatorio = $_POST['relatorio'];
        $titulo = 'Relatorio.pdf';
        if($relatorio === 'recibo-doacao.php'){
            $projeto = $_POST['projeto'];
            $valor = $_POST['valor'];
            $data = $_POST['data'];
            $nome = $_POST['nome'];
            $ong = $_POST['ong'];
            $cnpj = $_POST['cnpj'];
            $cidade = $_POST['cidade'];
            $titulo = 'Recibo.pdf';
        }
    }    
    ob_start();
    include ($relatorio);
    $html = ob_get_clean();

    $option = new Options();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream($titulo);
?>