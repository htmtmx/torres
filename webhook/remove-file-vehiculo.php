<?php
if(isset($_POST['idDocCoche'])){
    $id_archivo_vehiculo=$_POST['idDocCoche'];
    include_once "../control/controlArchivos.php";
    echo removeFileVehiculo($id_archivo_vehiculo) ? "Se eleimino el archivo" : "No se elimino/o no existe";
} else echo "Faltan datos";
