<?php
$params = [
// COCHE SELECCIONADO PARA VENDER
    "no_vehiculo" => "2864787217398059",
    //CLIENTE - COMPRADOR DATOS
    "no_cliente" => "896610125442",
    "nombre" => "MariaDB",
    "apaterno" => "Romero",
    "amaterno" => "Avila",
    "telefono" => "5597091960",
    "celular" => "55987541365",
    "correo" => "maria@gmail.com",
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
    "fecha_primer_pago" => "2021-08-15",
    "enganche" => "20000",
    //CONTRATO DATOS
    //tuipo de pago CONTADO -> 0 APARTADO -> 0  CREDITO -> 1
    "forma_pago" => "1",
    "total" => "150000",
];

include_once "../control/controlContrato.php";
echo creaContratoVenta($params) ? "Se ha creado un contrato de Venta" : "Error al crear contrato";