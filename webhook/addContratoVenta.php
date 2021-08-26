<?php
$params = [
// COCHE SELECCIONADO PARA VENDER
    "no_vehiculo" => "6255313736033669",
    //CLIENTE - COMPRADOR DATOS
    "no_cliente" => "2212623316091576",
    "nombre" => "Fernando",
    "apaterno" => "Hernandez",
    "amaterno" => "Hernandez",
    "telefono" => "5597091960",
    "celular" => "55987541365",
    "correo" => "fernando@gmail.com",
    "rfc"=> "JHSDIJFIJOS",
    "subscripcion" => "1",
    "empresa" => "ReckreaStudios",
    "medio_identificacion" => "1",
    "folio" => "80",
    "tipo_cliente" => "1",
    //DATOS DIRECCION
    //Añadir o actualizar Direccion de un cliente
    //CONTRATO DATOS
    "plazo" => "12",
    "fecha_primer_pago" => "2021-08-31",
    "enganche" => "20000",
    //CONTRATO DATOS
    //tuipo de pago CONTADO -> 0 APARTADO -> 0  CREDITO -> 1
    "forma_pago" => "1",
    "total" => "120000",
];

include_once "../control/controlContrato.php";
echo creaContratoVenta($params) ? "Se ha creado un contrato de Venta" : "Error al crear contrato";