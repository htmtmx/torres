<?php
include_once "../control/controlTipoArchivo.php";
$idtipoArchivo=8;
$status=0;
if(updateStatusTipoArchivo($idtipoArchivo,$status)){
    echo "Estatus actualizado con exito";
} else echo "Fallo";
