<?php
$params = [
    //AGREGA COCHE
    "id_modelo_fk" => $_POST['id_modelo_fk'],
    "anio" => $_POST['anio'],
    "placa" => $_POST['placa'],
    "entidad_placa" => $_POST['entidad_placa'],
    "color" => $_POST['color'],
    "kilometros" => $_POST['kilometros'],
    "transmision" => $_POST['transmision'],
    "combustible" => $_POST['combustible'],
    "no_puertas" => $_POST['no_puertas'],
    "precio_contado" => $_POST['precio_contado_compra'],
    "precio_credito" => $_POST['precio_credito_compra'],
    "nivCoche" => $_POST['nivCoche'],
    "opc_credito" => $_POST['opc_credito_coche'],
    "observaciones" => $_POST['observaciones'],
    //CLIENTE - VENDEDOR DATOS
    "no_cliente" => $_POST['no_cliente'],
    "nombre" => $_POST['nombre'],
    "apaterno" => $_POST['apaterno'],
    "amaterno" => $_POST['amaterno'],
    "correo" => $_POST['correo'],
    "telefono" => $_POST['telefono'],
    "celular" => $_POST['celular'],
    "subscripcion" => "0",
    "empresa" => $_POST['empresa'],
    "rfc" => $_POST['rfcCliente'],
    "medio_identificacion" => $_POST['medio_identificación'],
    "folio" => $_POST['folio'],
    "tipo_cliente" => $_POST['tipo_cliente'],
    //CONTRATO DATOS
    //tuipo de pago CONTADO -> 0 APARTADO -> 0 CREDITO -> 1
    "forma_pago" => $_POST['forma_pago_compra'],
    "total" => $_POST['total']
];
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