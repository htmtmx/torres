<?php
if (isset($_POST['noContrato'])
    && isset($_POST['montoPago'])
    ) {
    $no_contrato                =  $_POST['noContrato'];
    $monto                      =  $_POST['montoPago'];
    include_once "../control/controlAbonos.php";
    if(verificaAbono($no_contrato,$monto)){
        echo "¡Se ha registrado el abono con exito!";
    } else echo "No se ha podido registrar el abono";

} else echo "Los datos estan incompletos";