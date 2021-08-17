<?php



function addTipoArchivo($nombre,$tipo_uso,$prioridad){
    include_once "../model/TIPO_ARCHIVO.php";
    $obj_arch = new TIPO_ARCHIVO();
    $obj_arch->setNombre($nombre);
    $obj_arch->setTipoUso($tipo_uso);
    $obj_arch->setPrioridad($prioridad);
    $obj_arch->setEstatus(1);
    $result = $obj_arch->queryAddTipoArchivo();
    return $result;
}
function updateTipoArchivo(){
    include_once "../model/TIPO_ARCHIVO.php";
    $obj_arch = new TIPO_ARCHIVO();
    $obj_arch->setNombre();
    $obj_arch->setTipoUso();
    $obj_arch->setPrioridad();
    $result = $obj_arch->queryUpdateTipoArchivo();
    return $result;
}
function deleteTipoArchivo(){
    include_once "../model/TIPO_ARCHIVO.php";
    $obj_arch = new TIPO_ARCHIVO();
    $obj_arch->setIdTipoArchivo();
    $result= $obj_arch->queryDeleteTipoArchivo();
    return $result;
}
function consultTipoArchivo(){
    include "../model/SINGLETON_TIPOS_ARCHIVOS.php";
    $listaArchivostmp = SINGLETON_TIPOS_ARCHIVOS::getInst()->consultaTiposDocumento();
    return json_encode($listaArchivostmp);
}
function updateStatusTipoArchivo(){
    include_once "../model/TIPO_ARCHIVO.php";
    $obj_arch = new TIPO_ARCHIVO();
    $obj_arch->setEstatus();
    $result = $obj_arch->queryUpdateStatusTipoArchivo();
    return $result;
}