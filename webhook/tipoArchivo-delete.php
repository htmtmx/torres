<?php
include_once "../control/controlTipoArchivo.php";
$idtipoArchivo=8;
if(deleteTipoArchivo($idtipoArchivo)){
    echo "Eliminado con exito";
}else  echo "Fallo";