<?php

    /*INICIA PRUEBA DE ARRAY*/
$params = [
    //AGREGA COCHE
    "id_modelo_fk" => "2",
    "anio" => "2021",
    "placa" => "JHGKFO-25542",
    "entidad_placa" => "EDOMEX",
    "color" => "Rojo",
    "kilometros" => "15000",
    "transmision" => "MA",
    "combustible" => "DISEL",
    "no_puertas" => 4,
    "precio_contado" => 10000.00,
    "precio_credito" => 15000.00,
    "opc_credito" => 1,
    "observaciones" => "",
    //DATOS DIRECCION
    //Añadir o actualizar Direccion de un cliente
    //CLIENTE - VENDEDOR DATOS
    "no_cliente" => "0",
    "nombre" => "Christian",
    "apaterno" => "Pioquinto",
    "amaterno" => "Hernandez",
    "telefono" => "5597091960",
    "celular" => "55987541365",
    "correo" => "chris@gmail.com",
    "subscripcion" => "1",
    "empresa" => "ReckreaStudios",
    "medio_identificacion" => "1",
    "folio" => "50",
    "tipo_cliente" => "1",
    //CONTRATO DATOS
    //tuipo de pago CONTADO -> 0 APARTADO -> 0 CREDITO -> 1
    "forma_pago" => "0",
    "total" => "100000"
];

include_once "../control/controlContrato.php";
echo creaContratoCompra($params) ? "Se ha creado un contrato de Compra": "error al crear contrato";
/*
 *
 * Metodo para cuando se haga el JS, aqui ya llega por input.
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    $requestBody = file_get_contents("php://input");
    $params = json_decode($requestBody);
    //de jsno a array
    $params = (array)$params;

    include_once "../control/controlContrato.php";
    echo creaContratoCompra($params) ? "Se ha creado contrato": "error al crear contrato";
}
*/