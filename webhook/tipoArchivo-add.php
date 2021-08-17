<?php
include_once "../control/controlTipoArchivo.php";
$nombre="Cartilla Militar";
$tipo_uso="1";
$prioridad="1";
if(addTipoArchivo($nombre,$tipo_uso,$prioridad)){
    echo "Agregado con exito";
} else echo "Fallo";