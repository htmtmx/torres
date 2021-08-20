<?php
$no_vehiculo = $_POST['id'];
$filter = $_POST['filter'];
include_once "../control/controlCoche.php";
//echo "Datos desde  Servidor ".$no_vehiculo;
echo consultaAllCochesOneFoto($no_vehiculo,$filter);
