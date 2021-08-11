<?php
$id_file_contrato = 3;
include_once "../control/controlFileContrato.php";
if (removeFileContrato($id_file_contrato)) {
    echo "Se ha eliminado con exito";
} else echo "HA FALLADO";