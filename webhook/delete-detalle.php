<?php
include_once "../control/controlDetalles.php";
$id_detalle=4;
if(deleteDetalle($id_detalle)){
    echo "Se ha eliminado con exito";
} else echo "Ha fallado";