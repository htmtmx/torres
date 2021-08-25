<?php
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    $datosRecibidos = file_get_contents("php://input");
   // $requestBody = file_get_contents("php://input");
    $array = json_decode($datosRecibidos);
    //de jsno a array

    echo($array);
    include_once "../control/controlContrato.php";
 //   echo creaContratoCompra($params) ? "Se ha creado contrato": "error al crear contrato";
   // echo "--->".$data["placa"];
}
else{
    echo "NO ESTA LLEGABNDO NADA";
}