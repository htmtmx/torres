<?php
function addDireccion($params){
    include_once "../model/DIRECCIONES.php";
    $objDir = new DIRECCIONES();
    $objDir->setNoClienteFk($params['idCliente']);
    $objDir->setCalle($params['calle']);
    $objDir->setNoExt($params['noExt']);
    $objDir->setNoInt($params['noInt']);
    $objDir->setColonia($params['colonia']);
    $objDir->setMunicipio($params['municipio']);
    $objDir->setEstadoRepublica($params['estado']);
    $objDir->setCP($params['cp']);
    $objDir->setReferencias($params['referencias']);
    return $objDir->queryaddDireccion();
}

function deleteDireccion($idDir){
    include_once "../model/DIRECCIONES.php";
    $objDir = new DIRECCIONES();
    $objDir->setIdDireccion($idDir);
    return $objDir->querydeleteDireccion();
}