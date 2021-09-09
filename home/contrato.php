<?php
require_once('../vendor/autoload.php');
include_once "../webhook/response_data_contrato.php";
require_once('./reportes/constructor_contratos.php');

$noVechiculo = $_GET['noVehiculo'];
$is_venta = $_GET['consult'];
$tipo = $is_venta =="true"? "0":"1";
$datosContrato = getContratoCoches($noVechiculo,$tipo);

$idCliente = $datosContrato['no_cliente_fk'];


include("../control/controlCliente.php");
$direcciones = listDireccionesCliente($idCliente);
$dir= "";
include_once ("../control/controlEmpresa.php");
if (count($direcciones)>0){
    $dir = $direcciones[0];
}

$dirNegocioArray = json_decode(consultaEmpresa(),true);
$dirNegocio = $dirNegocioArray[0];





$mpdf = new \Mpdf\Mpdf([
]);

var_dump($datosContrato);
die();
// CREACION DE LA PLANTILLA
$plantilla = getTemplateContrato($datosContrato,$dir,$dirNegocio);
$css = file_get_contents('./reportes/responsiva_style.css');

$mpdf->writeHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output();