<?php
if(isset($_POST['idTipoArchivo']) && isset($_POST['nombreTipoArchivo'])){
    $idTipoArchivo = $_POST['idTipoArchivo'];
    $nombreTipoArchivo = $_POST['nombreTipoArchivo'];
    $prioridad=  $_POST['prioridadTipoArch'];
    $tipoArchivo = $_POST['selectTipoArch'];
    include_once "../control/controlTipoArchivo.php";
    if ($idTipoArchivo == 0) {
        if (addTipoArchivo($nombreTipoArchivo,$tipoArchivo,$prioridad)) {
            echo"Se registro correctamente";
        }else{ echo "Error"; }
    }else {
        if (updateTipoArchivo($idTipoArchivo,$nombreTipoArchivo,$tipoArchivo,$prioridad)) {
            echo"Se actualizo correctamente";
        }else{ echo "Error"; }
    }
} else echo "Faltan datos";