<?php
$id_detalle=4;
$nombre="Colores fuertes";
$categoria=2;
$visible=0;
$obligatorio=0;
$estatus=1;
include_once "./controlDetalles.php";
if(updateDetalle($id_detalle,$nombre,$categoria,$visible,$obligatorio,$estatus)){
    echo "Se ha actualizado con exito";
} else echo "Ha falaldo";