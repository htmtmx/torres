<?php
include_once "../model/USO_DETALLE.php";

function consultaUsoDetalle(){
    $obj_ud = new USO_DETALLE();
    $result= $obj_ud->queryConsultaUsoDetalle();
    return json_encode($result);
}

function deleteUsoDetalle($id_detalle_fk,$n_coche_fk){
    $obj_ud = new USO_DETALLE();
    $result = $obj_ud->queryDeleteUsoDetalle($id_detalle_fk,$n_coche_fk);
    return $result;
}
function addUsoDetalle($no_vehiculo,$idDetalle,$valor){
    include_once "../model/USO_DETALLE.php";
    $obj_ud = new USO_DETALLE();
    $obj_ud->setNoVehiculoFk($no_vehiculo);
    $obj_ud->setIdDetalleFk($idDetalle);
    $obj_ud->setValor($valor);
    $obj_ud->setEstatus(1);
    return $obj_ud->queryAddUsoDetalle();
}

function addListDetalles($listDetalles,$noVehiculo){
    include_once "../model/USO_DETALLE.php";
    $detalle= new USO_DETALLE();
    return $detalle->queryAddListDetalles($listDetalles,$noVehiculo);
}