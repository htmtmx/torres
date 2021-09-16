<?php
$noVehiculo= $_POST['idCoche'];
include_once "../control/controlCoche.php";
echo deleteCoche($noVehiculo) ? "Se ha ocultado el coche con exito": "Algo ha fallado contacte con el desarrollador";