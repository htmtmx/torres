<?php
function addDireccion($idCliente,$calle,$noExt,$noInt,$colonia,$estado,$cp,$referencias){
    include_once "../model/DIRECCIONES.php";
    $objDir = new DIRECCIONES();
    $objDir->setNoClienteFk($idCliente);
    $objDir->setCalle($calle);
    $objDir->setNoExt($noExt);
    $objDir->setNoInt($noInt);
    $objDir->setColonia($colonia);
    $objDir->setEstadoRepublica($estado);
    $objDir->setCP($cp);
    $objDir->setReferencias($referencias);
    return $objDir->queryaddDireccion();
}