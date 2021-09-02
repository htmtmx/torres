<?php
#call the library DOMPDF
include "../control/dompdf/autoload.inc.php";
header("Content-type:application/pdf");
//mmandamos a llamar a las clases de PDF
use Dompdf\Dompdf;
$pdf = new Dompdf();
//leer contenido de archivo externo
ob_start();
include_once "./contrato_doc.php";

$html = ob_get_clean();
$pdf->loadHtml($html);
$pdf->setPaper("A4","portrait");
$pdf->render();
//$pdf->stream();
$pdf->stream("prueba.pdf", array("Attachment" => false));

exit(0);

