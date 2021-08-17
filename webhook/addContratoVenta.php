<?php
$params = [
// COCHE SELECCIONADO PARA VENDER
    "no_vehiculo" => "2903067539687445",
    //CLIENTE - COMPRADOR DATOS
    "no_cliente" => "2572742",
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
    "plazo" => "6",
    "fecha_primer_pago" => "2021-09-01",
    "enganche" => "30000",
    //CONTRATO DATOS
    //tuipo de pago CONTADO -> 0 APARTADO -> 0  CREDITO -> 1
    "forma_pago" => "1",
    "total" => "150000",
];

include_once "../control/controlContrato.php";
echo creaContratoVenta($params) ? "Se ha creado un contrato de Venta" : "Error al crear contrato";