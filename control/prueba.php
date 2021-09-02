<?php
#call the library DOMPDF
include "./dompdf/autoload.inc.php";
header("Content-type:application/pdf");
//mmandamos a llamar a las clases de PDF
use Dompdf\Dompdf;
$pdf = new Dompdf();
$pdf->loadHtml("Hola Mundo");
$pdf->setPaper("A4","landscape");
$pdf->render();
//$pdf->stream();
$pdf->stream("dompdf_out.pdf", array("Attachment" => false));

exit(0);

