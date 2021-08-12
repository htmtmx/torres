<?php
$fecha_hoy= date('Y-m-d H:i:s');
$params = [
    "id_modelo_fk" => "1",
    "fecha_registro_coche" => $fecha_hoy,
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
    "estatus" => 1,
    "no_cliente" => "0",
    "nombre" => "Fernando",
    "apaterno" => "Hernandez",
    "amaterno" => "Ledezma",
    "telefono" => "5597091960",
    "celular" => "5537091960",
    "correo" => "fernando@gmail.com",
    "subscripcion" => "1",
    "empresa" => "ReckreaStudios",
    "fecha_registro" => $fecha_hoy,
    "medio_identificacion" => "1",
    "folio" => "50",
    "tipo_cliente" => "1",
    "estatus" => "1",
    "no_empleado_fk" => "2",
    "no_cliente_fk" => "0",
    "no" => "",
];

var_dump($params);





