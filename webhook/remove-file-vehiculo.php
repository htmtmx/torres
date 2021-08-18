<?php
$id_archivo_vehiculo=23;
include_once "../control/controlArchivos.php";
echo removeFileVehiculo($id_archivo_vehiculo) ? "Se eleimino el archivo" : "No se elimino/o no existe";