<?php
function getContratos(){
    $noContrato = 0;
    include_once "../control/controlContrato.php";
    return $arrayContratos = consultaAllContratos();
}
