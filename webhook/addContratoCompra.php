<?php

    /*INICIA PRUEBA DE ARRAY*/
$params = [
    //AGREGA COCHE
    "id_modelo_fk" => "1",
    "fecha_registro_coche" => "14-jun-20021",
    "anio" => "2021",
    "placa" => "JHGKFO-25542",
    "entidad_placa" => "",
    "color" => "Rojo",
    "kilometros" => "15000",
    "transmision" => "MA",
    "combustible" => "DISEL",
    "no_puertas" => 4,
    "precio_contado" => 10000.00,
    "precio_credito" => 15000.00,
    "opc_credito" => 1,
    "observaciones" => "",
    "estatusC" => 1,
    //CLIENTE - VENDEDOR DATOS
    "no_cliente" => "777",
    "nombre" => "Fernando",
    "apaterno" => "Hernandez",
    "amaterno" => "Ledezma",
    "telefono" => "5597091960",
    "celular" => "5537091960",
    "correo" => "fernando@gmail.com",
    "subscripcion" => "1",
    "empresa" => "ReckreaStudios",
    "fecha_registro" => "FECHA AQUI",
    "medio_identificacion" => "1",
    "folio" => "50",
    "tipo_cliente" => "1",
    "estatusUs" => "1",
    //CONTRATO DATOS
    "no_empleado_fk" => "2",
    "no_cliente_fk" => "0",
    "no_vehiculo_fk" => "0",
    "hora_fecha_creacion" => "FechaDeCreacion",
    "tipo_contrato" => "1",
    "plazo" => "365",
    "fecha_primer_pago" => "FechaDePago1",
    "enganche" => "2000",
    "saldo" => "0",
    "forma_pago" => "1",
    "subtotal" => "8000",
    "iva" => "10",
    "total" => "8800",
    "estatusCon" => "1",
];

include_once "../control/controlContrato.php";
echo creaContratoCompra($params) ? "Se ha creado contrato": "error al crear contrato";
/*
 *
 * Metodo para cuando se haga el JS, aqui ya llega por input.
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    $requestBody = file_get_contents("php://input");
    $params = json_decode($requestBody);

    //de jsno a array
    //
    $params = (array)$params;

    include_once "../control/controlContrato.php";
    echo creaContratoCompra($params) ? "Se ha creado contrato": "error al crear contrato";

}
*/