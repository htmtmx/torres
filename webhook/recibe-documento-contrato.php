<?php

// recibir el documento archivo
// TRATAMIENTO DE IMAGENES
//Imagen 1
echo $_POST['recipient-name'];
if(isset($_POST['recipient-name']) && isset($_POST['noCocheContratoModal']) && isset($_POST['tipoArchivoContrato']) && $_FILES['archivo1']['name'] ){

    $noVehiculo = $_POST['noCocheContratoModal'];
    $nombreIMG1 = $_FILES['archivo1']['name']; //Obteniendo el nombre1
    $archivo1 = $_FILES['archivo1']['tmp_name']; //OBteniendo el file1
    $idContrado = $_POST['recipient-name'];
    $tipoArchivo = $_POST['tipoArchivoContrato'];
    $privado = $_POST["visibilidadDocumentoContrato"] == "1" ? 1:0;
    echo ($privado);
    echo $idContrado;

    include_once "../control/controlArchivos.php";
    echo agregaDocumentoContrato($noVehiculo,$nombreIMG1,$archivo1,$idContrado,$tipoArchivo,$privado)?  "Se ha agregado un archivo" : "Paso algo feo";
}
else{
    echo "Seleccione un archivo valido";
}