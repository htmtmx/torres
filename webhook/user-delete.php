<?php
if(isset($_POST['idEmpleado'])){
    $idEmpleado=$_POST['idEmpleado'];
    include_once "../control/controlEmpleado.php";
    if(deleteEmpleado($idEmpleado)){
        echo "Se ha eliminado con exito";
    } else echo "hA FALLADO";
}
