<?php
$idNoContrato=18;
include_once "../control/controlArchivos.php";
echo removeFileContrato($idNoContrato) ? "Se elimino el archivo de contrato" : "No se existe el archivo";