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
$dirNegocioArray = json_decode(consultaEmpresa(),true);
if (count($direcciones)>0){
    $dir = $direcciones[0];
}

$dirNegocio = $dirNegocioArray[0];

//Venta es 0 SUPON
if ($datosContrato['tipo_contrato'] == "0"){
    $dirVendedor = $dirNegocio;
    $dirCliente =  $dir;
    //Apartado para separacion de fecha y hora
    $fechas= $datosContrato['fecha_firma_contrato'];
    $fechaObj= date_create($fechas);
    $fecha= date_format($fechaObj,'d/m/Y');
    $hora= date_format($fechaObj,'H:i');
    $arrayDatos['fecha']=$fecha;
    $arrayDatos['hora']=$hora;
    //Termina asigacion de horas
    $arrayDatos['comprador'] =  $datosContrato['cliente'];
    $arrayDatos['vendedor'] = $datosContrato['vendido_comprado_por'];
    $arrayDatos['telefono_comprador']= $datosContrato['telefono'];
    $arrayDatos['telefono_vendedor']= $dirVendedor['telefono'];
    $arrayDatos['identificacion_comprador']= $datosContrato['medio_identificación'];
    $arrayDatos['identificacion_vendedor']= "INE";

}
else{
    $dirCliente = $dirNegocio;
    $dirVendedor = $dir;
    //Apartado para separacion de fecha y hora
    $fechas= $datosContrato['fecha_firma_contrato'];
    $fechaObj= date_create($fechas);
    $fecha= date_format($fechaObj,'d/m/Y');
    $hora= date_format($fechaObj,'H:i');
    $arrayDatos['fecha']=$fecha;
    $arrayDatos['hora']=$hora;
    //Termina asigacion de horas
    $arrayDatos['comprador'] = $datosContrato['vendido_comprado_por'];
    $arrayDatos['vendedor'] = $datosContrato['cliente'];
    $arrayDatos['telefono_comprador']= $dirCliente['telefono'];
    $arrayDatos['telefono_vendedor']= $datosContrato['telefono'];
    $arrayDatos['identificacion_comprador']= "INE";
    $arrayDatos['identificacion_vendedor']= $datosContrato['medio_identificación'];
}

//echo "<br>_______________________________<br>";
// CREACION DE LA PLANTILLA
$plantilla = getTemplateCartaResponsiva($datosContrato,$arrayDatos, $dirCliente, $dirVendedor);
$css = file_get_contents('./reportes/responsiva_style.css');

$mpdf->writeHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output();