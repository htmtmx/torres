<?php
$folio_pago=2;
$estatus=1;
include_once "../control/controlPago.php";
if(updateEstatusPago($folio_pago,$estatus)){
    echo "Se ha actualizado con exito";
} else echo "Ha falaldo";