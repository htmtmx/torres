<?php
if(isset($_POST['nombreDetalle'])&& isset($_POST['visibilidad'])){
    $nombre=$_POST['nombreDetalle'];
    $categoria=1;
    $visible=$_POST['visibilidad'];
    $obligatorio=0;
    $estatus=1;
    include_once "../control/controlDetalles.php";
    if(addDetalle($nombre,$categoria,$visible,$obligatorio,$estatus)){
        echo "Se ha guardado con exito";
    } else echo "Ha falaldo";

} else echo "Faltan datos";
