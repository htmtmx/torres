<?php
include_once "../control/controlUsoDetalle.php";
$id_detalle_fk=1;
$n_coche_fk=2;
if(deleteUsoDetalle($id_detalle_fk,$n_coche_fk)){
    echo "Se ha eliminado con exito";
} else echo "Ha fallado";