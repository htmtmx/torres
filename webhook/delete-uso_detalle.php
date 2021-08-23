<?php
include_once "../control/controlUsoDetalle.php";
if(isset($_POST['idCarc']) && isset($_POST['no_vehiculo']) ){
    $id_detalle_fk=$_POST['idCarc'];
    $n_coche_fk=$_POST['no_vehiculo'];
    if(deleteUsoDetalle($id_detalle_fk,$n_coche_fk)){
        echo "Se ha eliminado con exito";
    } else echo "Ha fallado";
} else echo "Datos incompletos";
