<?php
$no_vehiculo = $_POST['id'];
//$estatus= $_POST['estatus'];
include_once "../control/controlContrato.php";
//echo "Datos desde  Servidor ".$no_contrato
echo consultaPagosAbonosDocsDeContratoCompleto($no_vehiculo);
?>
