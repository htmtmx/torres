<?php
if(isset($_POST['idmodelo']) && isset($_POST['nombreModelo'])){
    $idMarca = $_POST['marcaModelo'];
    $idModelo = $_POST['idmodelo'];
    $nombreModelo = $_POST['nombreModelo'];
    include_once "../control/controlModelo.php";
    if ($idModelo == 0) {
        if (addModelo($idMarca,$nombreModelo)) {
            echo"Se registro correctamente";
        }else{ echo "Error"; }
    }else {
        if (updateModelo($idMarca,$nombreModelo,$idModelo)) {
            echo"Se actualizo correctamente";
        }else{ echo "Error"; }
    }
} else echo "Faltan datos";