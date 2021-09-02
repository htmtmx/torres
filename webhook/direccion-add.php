<?php
if(isset($_POST['idCliente']) && isset($_POST['calle']) && isset($_POST['noext'])
    &&isset($_POST['colonia']) && isset($_POST['municipio'])
    && isset($_POST['estado']) &&isset($_POST['cp']) ){
    $params = [
        "idCliente"=>$_POST['idCliente'],
        "calle"=>$_POST['calle'],
        "noExt"=>$_POST['noext'],
        "noInt"=>$_POST['noint'],
        "colonia"=>$_POST['colonia'],
        "municipio"=>$_POST['municipio'],
        "estado"=>$_POST['estado'],
        "cp"=>$_POST['cp'],
        "referencias"=>$_POST['referencias']
    ];

    include_once "../control/controlDirecciones.php";
    if(addDireccion($params)){
        echo "Se ha agregado con exito";
    } else echo "No se ha guardado";
} else echo "Faltan datos";

