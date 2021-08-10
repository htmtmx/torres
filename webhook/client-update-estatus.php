<?php
    $idCliente=2572742;
    include_once "../control/controlCliente.php";
    if(updateStatus($idCliente)){
        echo "Se ha actualizado con exito";
    } else echo "Ha fallado";