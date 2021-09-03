<?php
require_once('../vendor/autoload.php');
include_once "../webhook/response_data_contrato.php";
require_once('./reportes/constructor_contratos.php');

$noContrato = $_GET['noContrato'];
$contrato = getContrato($noContrato);

//var_dump($contrato);

$mpdf = new \Mpdf\Mpdf([

]);

$plantilla = getTemplateCartaResponsiva($contrato);
$css = file_get_contents('./reportes/responsiva_style.css');

$mpdf->writeHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);


$mpdf->Output();