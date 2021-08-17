<?php

// recibir el documento archivo
// TRATAMIENTO DE IMAGENES
//Imagen 1

if(isset($_POST['idContrato']) && isset($_POST['noVehiculo']) && isset($_POST['tipoArchivo']) && $_FILES['archivo1']['name'] ){

    $noVehiculo = $_POST['noVehiculo'];
    $nombreIMG1 = $_FILES['archivo1']['name']; //Obteniendo el nombre1
    $archivo1 = $_FILES['archivo1']['tmp_name']; //OBteniendo el file1
    $idContrado = $_POST['idContrato'];
    $tipoArchivo = $_POST['tipoArchivo'];
    $privado = $_POST["visibilidad"] == "1" ? 1:0;
    echo ($privado);
    echo $idContrado;

    include_once "../control/controlArchivos.php";
    echo agregaDocumentoContrato($noVehiculo,$nombreIMG1,$archivo1,$idContrado,$tipoArchivo,$privado)?  "Se ha agregado un archivo" : "Paso algo feo";
}
else{
    echo "Seleccione un archivo valido";
}