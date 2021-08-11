<?php
$id_file_contrato = 3;
$nivel_acceso = 1;
include_once "../control/controlFileContrato.php";
if (updateNivelAcceso($id_file_contrato,$nivel_acceso)) {
    echo "Se ha actualizado el nivel de acceso correctamente";
} else echo "Algo ha fallado";