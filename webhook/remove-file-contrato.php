<?php
if(isset($_POST['idDocumento'])){
    $idNoContrato= $_POST['idDocumento'];
        include_once "../control/controlArchivos.php";
    echo removeFileContrato($idNoContrato) ? "Se elimino el archivo de contrato" : "No se existe el archivo";
}
