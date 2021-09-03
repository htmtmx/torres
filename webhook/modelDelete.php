<?php
if(isset($_POST['idModelo'])){
    $idModelo=$_POST['idModelo'];
    include_once "../control/controlModelo.php";
    if(deleteModelo($idModelo)){
        echo "Se ha eliminado con exito";
    } else echo "HA FALLADO";
}