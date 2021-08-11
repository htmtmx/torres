<?php
$id_tipo_archivo_fk = 2;
$no_contrato_fk = 1;
$nombre = "Pasaporte";
$path = "pathFileContrato";
$ext = "pdf";
$nivel_acceso = 2;
include_once "../control/controlFileContrato.php";
if (addFileContrato($id_tipo_archivo_fk,$no_contrato_fk,$nombre,
                    $path,$ext,$nivel_acceso)) {
    echo "Se ha guardado con exito";
} else echo "Ha falaldo";
