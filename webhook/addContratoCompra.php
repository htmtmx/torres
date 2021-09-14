<?php
$params = [
    //AGREGA COCHE
    "id_modelo_fk" => $_POST['id_modelo_fk'],
    "tipoVehiculo"=>$_POST['tipoVehiculo'],
    "anio" => $_POST['anio'],
    "placa" => $_POST['placa'],
    "entidad_placa" => $_POST['entidad_placa'],
    "color" => $_POST['color'],
    "kilometros" => $_POST['kilometros'],
    "transmision" => $_POST['transmision'],
    "combustible" => $_POST['combustible'],
    "no_puertas" => $_POST['no_puertas'],
    "noMotor"=>$_POST['noMotor'],
    "noSerieV"=>$_POST['noSerieV'],
    "carroceria"=>$_POST['carroceria'],
    "pintura"=>$_POST['pintura'],
    "llantas"=>$_POST['llantas'],
    "noFactura"=>$_POST['noFactura'],
    "fecha_factura"=>$_POST['fecha_factura'],
    "empresaExpide"=>$_POST['empresaExpide'],
    "dirFactura"=>$_POST['dirFactura'],
    "tarjeton"=>$_POST['tarjeton'],
    "folioTarjeton"=>$_POST['folioTarjeton'],
    "tarjectaCirc"=>$_POST['tarjectaCirc'],
    "folioTarjCirc"=>$_POST['folioTarjCirc'],
    "verificaciones"=>$_POST['verificaciones'],
    "arraydetalles"=>$_POST['detalles'],
    "precio_contado" => $_POST['precio_contado_compra'],
    "precio_credito" => $_POST['precio_credito_compra'],
    "nivCoche" => $_POST['nivCoche'],
    "opc_credito" => $_POST['opc_credito_coche'],
    "observaciones" => $_POST['observaciones'],
    "ultimaTenencia"=> $_POST['ultimaTenencia'],
    //CLIENTE - VENDEDOR DATOS
    "no_cliente" => $_POST['no_cliente'],
    "nombre" => $_POST['nombre'],
    "apaterno" => $_POST['apaterno'],
    "amaterno" => $_POST['amaterno'],
    "correo" => $_POST['correo'],
    "telefono" => $_POST['telefono'],
    "celular" => $_POST['celular'],
    "subscripcion" => "0",
    //DIRECCIÓN DATOS
    "id_dir"=> $_POST['id_dir'],
    "calle"=> $_POST['calle'],
    "noExt"=> $_POST['noExtEmp'],
    "noInt"=> $_POST['noIntEmp'],
    "colonia"=> $_POST['coloniaEmpr'],
    "municipio"=> $_POST['municipio'],
    "cp"=> $_POST['cpEmpr'],
    "estado"=> $_POST['estadoEmp'],
    "referencias"=> $_POST['referencias'],
    //OTROS DATOS
    "empresa" => $_POST['empresa'],
    "rfc" => $_POST['rfcCliente'],
    "medio_identificacion" => $_POST['medio_identificación'],
    "folio" => $_POST['folio'],
    "tipo_cliente" => $_POST['tipo_cliente'],
    //Datos contrato
    "nombreAv1"=>"",
    "nombreAv2"=>"",
    "telefonoAv1"=>"",
    "telefonoAv2"=>"",
    "dirAval1"=>"",
    "dirAval2"=>"",
    //tuipo de pago CONTADO -> 0 APARTADO -> 0 CREDITO -> 1
    "forma_pago" => $_POST['forma_pago_compra'],
    "total" => $_POST['total'],
    "fecha_firma_contrato"=>$_POST['datetimeFirma'],
    "observaciones"=>$_POST['observacionesContrato'],
];
if($params['opc_credito']=="on"){
    $params['opc_credito']=1;
} else {
    $params['opc_credito']=0;
}
var_dump($params['fecha_firma_contrato']);
include_once "../control/controlContrato.php";
echo creaContratoCompra($params) ? "Se ha creado un contrato de Compra": "error al crear contrato";
/*
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    $datosRecibidos = file_get_contents("php://input");
   // $requestBody = file_get_contents("php://input");
    $array = json_decode($datosRecibidos);
    //de jsno a array

    echo($array);
    include_once "../control/controlContrato.php";
 //   echo creaContratoCompra($params) ? "Se ha creado contrato": "error al crear contrato";
   // echo "--->".$data["placa"];
}
else{
    echo "NO ESTA LLEGABNDO NADA";
}*/