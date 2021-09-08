<?php
 include_once "../model/DETALLE.php";

//Funciones para el webhook de Detalle
function consultaDetalle($id_detalle)
{
$obj_detalle = new DETALLE();
$result=$obj_detalle->queryConsultaDetalles($id_detalle);
return json_encode($result);
}

function consultaDetallesParaInventarioContrato(){
    $obj_detalle = new DETALLE();
    $result=$obj_detalle->queryConsultaDetallesInventario();
    return json_encode($result);
}

function addDetalle($nombre,$categoria,$obligatorio,$estatus){
    $obj_detalle = new DETALLE();
    $obj_detalle->setNombre($nombre);
    $obj_detalle->setCategoria($categoria);
    $obj_detalle->setVisible(1);
    $obj_detalle->setOblogatorio($obligatorio);
    $obj_detalle->setEstatus($estatus);
    $result=$obj_detalle->queryAddDetalle();
    return $result;
}

function updateDetalle($id_detalle,$nombre,$categoria,$obligatorio){
    $obj_detalle = new DETALLE();
    $obj_detalle->setNombre($nombre);
    $obj_detalle->setCategoria($categoria);
    $obj_detalle->setVisible(1);
    $obj_detalle->setOblogatorio($obligatorio);
    $result=$obj_detalle->queryUpdateDetalle($id_detalle);
    return $result;
}

function deleteDetalle($id_detalle){
    $obj_detalle = new DETALLE();
    $result = $obj_detalle->queryDeleteDetalle($id_detalle);
    return $result;
}