<?php
$params = [
// COCHE SELECCIONADO PARA VENDER
    "no_vehiculo" => "9533917065821094",
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
    "tipo_contrato" => "0",
    "plazo" => "6",
    "fecha_primer_pago" => "FechaDePago1",
    "enganche" => "2000",
    "saldo" => "0",
    "forma_pago" => "1",
    "subtotal" => "8000",
    "iva" => "10",
    "total" => "8800",
    "estatusCon" => "0",
];

include_once "../control/controlContrato.php";
echo creaContratoVenta($params) ? "Se ha creado un contrato de Venta" : "Error al crear contrato";