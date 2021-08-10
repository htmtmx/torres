<?php
    $idUser=84198;
    $status=1;
    if($status===1){
        $status=0;
    }else $status=1;
    include_once "../control/controlEmpleado.php";
    if(updateStatusE($idUser,$status)){
        echo "Se ha actualizado el status correctamente";
    } else echo "Algo ha fallado";
