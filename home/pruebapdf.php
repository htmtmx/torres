<?php
require_once('../vendor/autoload.php');
include_once "../webhook/response_data_contrato.php";
require_once('./reportes/constructor_contratos.php');
$contratos = getContratos();
/*
var_dump($contratos);
die();

 *
 **/
$mpdf = new \Mpdf\Mpdf([

]);

$plantilla = getPlantilla($contratos);
$css = file_get_contents('./reportes/style.css');

$mpdf->writeHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);


$mpdf->Output();



/*
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
* */