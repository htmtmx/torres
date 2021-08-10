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