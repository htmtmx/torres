<?php
require_once('../vendor/autoload.php');
include_once "../webhook/response_data_contrato.php";
require_once('./reportes/constructor_contratos.php');

$noVechiculo = $_GET['noVehiculo'];
$is_venta = $_GET['consult'];
$tipo = $is_venta =="true"? "0":"1";
$datosContrato = getContratoCoches($noVechiculo,$tipo);

//var_dump($datosContrato);
//die();
$mpdf = new \Mpdf\Mpdf([
]);
// CREACION DE LA PLANTILLA
$plantilla = getTemplateContrato($datosContrato);
$css = file_get_contents('./reportes/responsiva_style.css');

$mpdf->writeHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output();