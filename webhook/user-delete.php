<?php
    $idEmpleado=84198;
    include_once "../control/controlEmpleado.php";
    if(deleteEmpleado($idEmpleado)){
        echo "Se ha eliminado con exito";
    } else echo "hA FALLADO";