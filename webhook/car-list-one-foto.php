<?php
$no_vehiculo = $_POST['id'];
include_once "../control/controlCoche.php";
//echo "Datos desde  Servidor ".$no_vehiculo;
echo consultaAllCochesOneFoto($no_vehiculo);
