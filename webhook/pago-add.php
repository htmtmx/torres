<?php
$no_contrato_fk = 2;
$no_transaccion = 3;
$concepto = "Tercer pago";
$tipo = "Tipo 1";
$total = 15000;
$no_pago = 3;
$detalles = "Detalles del pago no 3";
include_once "../control/controlPago.php";
if(addPago($no_contrato_fk,$no_transaccion,$concepto,$tipo,
    $total,$no_pago,$detalles)){
    echo "Se ha guardado con exito";
} else echo "Ha falaldo";