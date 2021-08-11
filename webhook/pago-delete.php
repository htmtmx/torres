<?php
$folio_pago=3;
include_once "../control/controlPago.php";
if(deletePago($folio_pago)){
    echo "Se ha eliminado con exito";
} else echo "Ha fallado";