<?php
$params = [
// COCHE SELECCIONADO PARA VENDER
    "no_vehiculo" => $_POST['noCoche'],
    //CLIENTE - COMPRADOR DATOS
    "no_cliente" => $_POST['no_cliente'],
    "nombre" => $_POST['nombre'],
    "apaterno" => $_POST['apaterno'],
    "amaterno" => $_POST['amaterno'],
    "correo" => $_POST['correo'],
    "telefono" => $_POST['telefono'],
    "celular" => $_POST['celular'],
    "empresa" => $_POST['empresa'],
    "rfc"=> $_POST['rfcCliente'],
    "medio_identificacion" => $_POST['medio_identificación'],
    "folio" => $_POST['folio'],
    "tipo_cliente" => $_POST['tipo_cliente'],
    "subscripcion" => "1",
    //DATOS DIRECCION
    "id_dir"=> $_POST['id_dir'],
    "calle"=> $_POST['calle'],
    "noExt"=> $_POST['noExtEmp'],
    "noInt"=> $_POST['noIntEmp'],
    "colonia"=> $_POST['coloniaEmpr'],
    "municipio"=> $_POST['municipio'],
    "cp"=> $_POST['cpEmpr'],
    "estado"=> $_POST['estadoEmp'],
    "referencias"=> $_POST['referencias'],
    //Añadir o actualizar Direccion de un cliente
    //CONTRATO DATOS
    "plazo" => $_POST['plazo'],
    "fecha_primer_pago" => $_POST['fecha_primer_pago'],
    "enganche" => $_POST['enganche'],
    //CONTRATO DATOS
    "nombreAv1"=>$_POST['nombreAva1'],
    "nombreAv2"=>$_POST['nombreAval2'],
    "telefonoAv1"=>$_POST['telaval1'],
    "telefonoAv2"=>$_POST['telAval2'],
    "dirAval1"=>$_POST['dirAval1'] ,
    "dirAval2"=>$_POST['dirAval2'] ,
    "fecha_firma_contrato"=>$_POST['datetimeFirma'],
    "observaciones"=> "PRUEBA DE VENTA",
  //Este lo utilizaremos cuando ya se cree en la vista
//    "observaciones"=> $_POST['observacionesContrato'],
    //tuipo de pago CONTADO -> 0 APARTADO -> 0  CREDITO -> 1
    "forma_pago" => $_POST['forma_pago'],
    "total" => "0",
];
$plazo= $params['forma_pago']>0? $params['plazo']: 0;
$params['plazo']= $plazo;
var_dump($params);
die();
include_once "../control/controlContrato.php";
echo revisaContratoVenta($params) ? "Se ha creado un contrato de Venta" : "Error al crear contrato,este coche ya ha sido vendido.";