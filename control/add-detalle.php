<?php
$nombre="Pintura";
$categoria=1;
$visible=1;
$obligatorio=1;
$estatus=1;
include_once "./controlDetalles.php";
if(addDetalle($nombre,$categoria,$visible,$obligatorio,$estatus)){
    echo "Se ha guardado con exito";
} else echo "Ha falaldo";
