<?php
if(isset($_POST['idDir'])){
    $idDir = $_POST['idDir'];
    include_once "../control/controlDirecciones.php";
    if(deleteDireccion($idDir)){
        echo "Se ha eliminado con exito";
    } else echo "algo fallo";
}else echo "Faltan datos";