<?php
if(isset($_POST['idDetalles']) && isset($_POST['nombreCaracteristica'])){
    $idDetalle = $_POST['idDetalles'];
    $nombreCaracteristica = $_POST['nombreCaracteristica'];
    $categoria=  $_POST['catCarac'];
    $obligatorio = $_POST['obligCarac'];
    include_once "../control/controlDetalles.php";
    if ($idDetalle == 0) {
        if (addDetalle($nombreCaracteristica,$categoria,$obligatorio,1)) {
            echo"Se registro correctamente";
        }else{ echo "Error"; }
    }else {
        if (updateDetalle($idDetalle,$nombreCaracteristica,$categoria,$obligatorio)) {
            echo"Se actualizo correctamente";
        }else{ echo "Error"; }
    }
} else echo "Faltan datos";