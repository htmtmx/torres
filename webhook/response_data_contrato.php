<?php
function getContratos(){
    include_once "../control/controlContrato.php";
    return consultaAllContratos();
}

function getContrato($noContrato){
    include_once "../control/controlContrato.php";
    return consultaContrato($noContrato);
}