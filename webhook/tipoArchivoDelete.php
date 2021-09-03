<?php
if(isset($_POST['idArchivo'])){
    $idArchivo=$_POST['idArchivo'];
    include_once "../control/controlTipoArchivo.php";
    if(deleteTipoArchivo($idArchivo)){
        echo "Se ha eliminado con exito";
    } else echo "HA FALLADO";
}