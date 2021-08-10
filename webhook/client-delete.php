<?php
       $idCliente= 1651;
       include_once "../control/controlCliente.php";
       if(deleteCliente($idCliente)){
        echo "Se ha eliminado con exito";
       } else echo "Algo ha fallado";
?>