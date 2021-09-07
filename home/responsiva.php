<?php
require_once('../vendor/autoload.php');
include_once "../webhook/response_data_contrato.php";
require_once('./reportes/constructor_contratos.php');

$noVechiculo = $_GET['noVechiculo'];
$is_venta = $_GET['consult'];
$tipo = $is_venta =="true"? "0":"1";
$datosContrato = getContratoCoches($noVechiculo,$tipo);
//var_dump($datosContrato);
//die();
$mpdf = new \Mpdf\Mpdf([
]);

$dirCliente = "";
$dirVendedor = "";

$arrayDatos = array();

$idCliente = $datosContrato['no_cliente_fk'];

//llamar al control de direcciones
include("../control/controlCliente.php");
$direcciones = listDireccionesCliente($idCliente);
$dir= "";
include_once ("../control/controlEmpresa.php");
$dirNegocio = json_decode(consultaEmpresa(),true);
if (count($direcciones)>0){
    $dir = $direcciones[0];
}
//Venta es 0 SUPON
if ($datosContrato['tipo_contrato'] == "0"){
    $dirCliente = "Atizapan Edomex";
    $dirVendedor = "Autos Torres Dir";
    $cliente= $datosContrato['tipo_contrato'];
    $arrayDatos['comprador'] =  $datosContrato['cliente'];
    $arrayDatos['vendedor'] = $datosContrato['vendido_comprado_por'];
    $dirCliente =  $dir;
    $dirVendedor = $dirNegocio[0];
}
else{
    $dirCliente = $dirNegocio[0];
    $dirVendedor = $dir;
    $arrayDatos['comprador'] = $datosContrato['vendido_comprado_por'];
    $arrayDatos['vendedor'] = $datosContrato['cliente'];
}

//var_dump($dirVendedor);
//echo "<br>_______________________________<br>";
//var_dump($dirCliente);
//die();

// CREACION DE LA PLANTILLA
$plantilla = getTemplateCartaResponsiva($datosContrato,$arrayDatos, $dirCliente, $dirVendedor);
$css = file_get_contents('./reportes/responsiva_style.css');

$mpdf->writeHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output();