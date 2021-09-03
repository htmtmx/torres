<?php



function addTipoArchivo($nombre,$tipo_archivo,$prioridad){
    include_once "../model/TIPO_ARCHIVO.php";
    $obj_arch = new TIPO_ARCHIVO();
    $obj_arch->setNombre($nombre);
    $obj_arch->setTipoUso($tipo_archivo);
    $obj_arch->setPrioridad($prioridad);
    $obj_arch->setEstatus(1);
    $result = $obj_arch->queryAddTipoArchivo()? "Se registro correctamente":"Error";
    return $result;
}
function updateTipoArchivo($idtipoArchivo,$nombre,$tipo_archivo,$prioridad){
    include_once "../model/TIPO_ARCHIVO.php";
    $obj_arch = new TIPO_ARCHIVO();
    $obj_arch->setIdTipoArchivo($idtipoArchivo);
    $obj_arch->setNombre($nombre);
    $obj_arch->setTipoUso($tipo_archivo);
    $obj_arch->setPrioridad($prioridad);
    $obj_arch->queryUpdateTipoArchivo();
    return true;
}
function deleteTipoArchivo($idtipoArchivo){
    include_once "../model/TIPO_ARCHIVO.php";
    $obj_arch = new TIPO_ARCHIVO();
    $obj_arch->setIdTipoArchivo($idtipoArchivo);
    $result= $obj_arch->queryDeleteTipoArchivo();
    return $result;
}
function consultTipoArchivo(){
    include "../model/SINGLETON_TIPOS_ARCHIVOS.php";
    $listaArchivostmp = SINGLETON_TIPOS_ARCHIVOS::getInst()->consultaTiposDocumento();
    return json_encode($listaArchivostmp);
}
function updateStatusTipoArchivo($idtipoArchivo,$status){
    include_once "../model/TIPO_ARCHIVO.php";
    $obj_arch = new TIPO_ARCHIVO();
    $obj_arch->setIdTipoArchivo($idtipoArchivo);
    $obj_arch->setEstatus($status);
    $result = $obj_arch->queryUpdateStatusTipoArchivo();
    return $result;
}