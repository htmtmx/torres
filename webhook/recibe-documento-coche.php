<?php


// recibir el documento archivo
// TRATAMIENTO DE IMAGENES
//Imagen 1

if (isset($_POST['noVehiculo']) && isset($_POST['tipoArchivo']) && $_FILES['archivo']['name']) {

    $noVehiculo = $_POST['noVehiculo'];
    $nombreIMG1 = $_FILES['archivo']['name']; //Obteniendo el nombre1
    $archivo1 = $_FILES['archivo']['tmp_name']; //OBteniendo el file1
    $tipoArchivo = $_POST['tipoArchivo'];
    $privado = $_POST["visibilidad"];
    include_once "../control/controlArchivos.php";
    if( agregaDocumentoCoche($noVehiculo, $nombreIMG1, $archivo1, $tipoArchivo, $privado) ? "Se ha agregado un archivo" : "Paso algo feo"){
        echo "Se ha agregado el documento";
    }

} else echo "Seleccione un archivo valido";
