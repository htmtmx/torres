<?php
$no_vehiculo = $_POST['id'];
$filter = $_POST['filter'];
$archivados= $_POST['archivado'];
include_once "../control/controlCoche.php";
//echo "Datos desde  Servidor ".$no_vehiculo;
$archivados=$archivados=="true" ?   true    :   false;
echo consultaAllCochesOneFoto($no_vehiculo,$filter,$archivados);
