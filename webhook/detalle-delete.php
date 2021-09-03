<?php
if(isset($_POST['idDetalle'])){
    $idDetalle=$_POST['idDetalle'];
    include_once "../control/controlDetalles.php";
    if(deleteDetalle($idDetalle)){
        echo "Se ha eliminado con exito";
    } else echo "HA FALLADO";
}