<?php
if(isset($_POST['idEmpleado'])){
    $idUser=$_POST['idEmpleado'];
    $statusActual= $_POST['estatusActual'];
    include_once "../control/controlEmpleado.php";
   // echo "estatus Actual: ". ($statusActual == "0" ? "APAGADO": "ENCENDIDO");
   echo updateStatusE($idUser,$statusActual)? "OK":"Error";
} else echo "Faltan datos";
