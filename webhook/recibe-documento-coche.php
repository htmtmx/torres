<?php


// recibir el documento archivo
// TRATAMIENTO DE IMAGENES
//Imagen 1

if (isset($_POST['noVehiculo']) && isset($_POST['tipoArchivo2']) && $_FILES['archivo1']['name']) {

    $noVehiculo = $_POST['noVehiculo'];
    $nombreIMG1 = $_FILES['archivo1']['name']; //Obteniendo el nombre1
    $archivo1 = $_FILES['archivo1']['tmp_name']; //OBteniendo el file1
    $tipoArchivo = $_POST['tipoArchivo2'];
    $privado = $_POST["visibilidad"] == "1" ? 1 : 0;
    echo($privado);
    include_once "../control/controlArchivos.php";
    echo agregaDocumentoCoche($noVehiculo, $nombreIMG1, $archivo1, $tipoArchivo, $privado) ? "Se ha agregado un archivo" : "Paso algo feo";
} else {
    echo "Seleccione un archivo valido";
}