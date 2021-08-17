<?php
include_once "../control/controlTipoArchivo.php";
$idtipoArchivo=8;
$nombre="Cartilla";
$tipo_uso="1";
$prioridad="1";
$result = updateTipoArchivo($idtipoArchivo,$nombre,$tipo_uso,$prioridad);
if($result){
    echo "Actualizado con exito";
}else echo "Fallo";