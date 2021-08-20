<?php
if(isset($_POST['idCoche'])){
    $no_vehiculo = $_POST['idCoche'];
    include_once "../control/controlContrato.php";
//echo "Datos desde  Servidor ".$no_contrato;
    echo consultaContratosCoche($no_vehiculo);
} else echo "Faltan datos";
