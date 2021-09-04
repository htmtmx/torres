<?php
function getContratos(){
    include_once "../control/controlContrato.php";
    return consultaAllContratos();
}

function getContratoCoches($noCoche, $tipo){
    include_once "../control/controlContrato.php";
    $contratosJSON = consultaContratosCoche($noCoche);
    $contratos = json_decode($contratosJSON,true);
//discriminar al contrato, obtenemos el que se use segun tipo
    foreach($contratos as $contrato){
        if ($contrato['tipo_contrato'] == $tipo){
            return $contrato;
        }
    }
}