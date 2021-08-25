<?php


// recibir el documento archivo
// TRATAMIENTO DE IMAGENES
//Imagen 1

if (isset($_POST['noVehiculo']) && isset($_POST['tipoArchivoCarro']) && $_FILES['archivo']['name']) {

    $noVehiculo = $_POST['noVehiculo'];
    $nombreIMG1 = $_FILES['archivo']['name']; //Obteniendo el nombre1
    $archivo1 = $_FILES['archivo']['tmp_name']; //OBteniendo el file1
    $tipoArchivo = $_POST['tipoArchivoCarro'];
    $privado = $_POST["visibilidad"];
    include_once "../control/controlArchivos.php";
    echo agregaDocumentoCoche($noVehiculo, $nombreIMG1, $archivo1, $tipoArchivo, $privado) ? "Se ha agregado un archivo" : "Debe subir archivos menores a 2MB";
} else echo "Seleccione un archivo valido";
