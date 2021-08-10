<?php
include_once "./controlDetalles.php";
$id_detalle=4;
if(deleteDetalle($id_detalle)){
    echo "Se ha eliminado con exito";
} else echo "Ha fallado";