<?php
if(isset($_POST['idCoche']) && isset($_POST['detalle']) && isset($_POST['valor'])){

    include_once "../control/controlUsoDetalle.php";
    $no_vehiculo= $_POST['idCoche'];
    $idDetalle= $_POST['detalle'];
    $valor=$_POST['valor'];
    if($valor!=""){
        try {
            if(addUsoDetalle($no_vehiculo,$idDetalle,$valor)){
                $mje = array(
                    "mjeType" => "1",
                    "Mensaje" => "Se ha agregado la caracteristica"
                );
            }
        }
        catch (Exception $e) {
            $mje = array(
                "mjeType" => "0",
                "Mensaje" => "Esta caracteristica ya existe, elija otra"
            );
        }

    }
    else {
        $mje = array(
            "mjeType" => "-1",
            "Mensaje" => "Agrega un valor valido",
        );
    }


    echo json_encode($mje);
}
else{
    $mje = array(
        "mjeType" => "-1",
        "Mensaje" => "Faltan datos",
    );
    echo json_encode($mje);
}


