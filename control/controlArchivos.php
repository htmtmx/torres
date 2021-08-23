<?php


function agregaDocumentoContrato($noVehiculo,$nombreIMG1,$archivo1,$idContrato,$tipoArchivo,$privado){
    $carpeta = '../contratos/'.$noVehiculo.'/'.$idContrato; // URL COMPLETA
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
    include "../model/SINGLETON_TIPOS_ARCHIVOS.php";
    $listaArchivostmp = SINGLETON_TIPOS_ARCHIVOS::getInst()->consultaTiposDocumento();
    $nombre = "";
    foreach ($listaArchivostmp as $file){
        if ($file['id_tipo_archivo'] == $tipoArchivo)
            $nombre = $file['nombre'];
    }

    echo $privado == 1 ? "PUBLICO": "PRIVADO";
    $nombre =str_replace(' ', '', $nombre);
    $ruta1 = $carpeta.'/'.$nombreIMG1; // RUTA1 EXAMPLE: "/24072019.24/e-r.jpg"
    $extension = pathinfo($ruta1, PATHINFO_EXTENSION);
    move_uploaded_file($archivo1, $ruta1);
    rename ($ruta1, $carpeta.'/'.$nombre.'.'.$extension); // RUTA1 EXAMPLE: "/24072019.24/tarjetaCirc.jpg"
    //Guardar en el modelo de arhcivo

    $path = $carpeta.'/'.$nombre.'.'.$extension;
    return constructObjFC($nombre,$tipoArchivo,$idContrato,$path,$extension,$privado);

}

function agregaDocumentoCoche($noVehiculo, $nombreIMG1, $archivo1, $tipoArchivo, $privado){
    $carpeta = '../contratos/'.$noVehiculo.'/docs'; // URL COMPLETA
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
    include "../model/SINGLETON_TIPOS_ARCHIVOS.php";
    $listaArchivostmp = SINGLETON_TIPOS_ARCHIVOS::getInst()->consultaTiposDocumento();
    $nombre = "";
    foreach ($listaArchivostmp as $file){
        if ($file['id_tipo_archivo'] == $tipoArchivo)
            $nombre = $file['nombre'];
    }
    $hoy= date('Y-m-d-His');
    $nombre=$nombre.'-'.$hoy;
    $nombre =str_replace(' ', '', $nombre);
    $ruta1 = $carpeta.'/'.$nombreIMG1; // RUTA1 EXAMPLE: "/24072019.24/e-r.jpg"
    $extension = pathinfo($ruta1, PATHINFO_EXTENSION);
    move_uploaded_file($archivo1, $ruta1);
    rename ($ruta1, $carpeta.'/'.$nombre.'.'.$extension); // RUTA1 EXAMPLE: "/24072019.24/tarjetaCirc.jpg"
    //Guardar en el modelo de arhcivo

    $path = $carpeta.'/'.$nombre.'.'.$extension;
    $result = insertObjDocCoch($tipoArchivo,$noVehiculo,$nombre,$path,$extension,$privado,0);
    return $result;
}

function agregaImagenCoche($noVehiculo, $nombreIMG1, $archivo1){
    $carpeta = '../contratos/'.$noVehiculo.'/image'; // URL COMPLETA
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
    include "../model/SINGLETON_TIPOS_ARCHIVOS.php";
    $nombre = "foto-".date('Y-m-d-His');
    $nombre =str_replace(' ', '', $nombre);
    $ruta1 = $carpeta.'/'.$nombreIMG1; // RUTA1 EXAMPLE: "/24072019.24/e-r.jpg"
    $extension = pathinfo($ruta1, PATHINFO_EXTENSION);
    move_uploaded_file($archivo1, $ruta1);
    rename ($ruta1, $carpeta.'/'.$nombre.'.'.$extension); // RUTA1 EXAMPLE: "/24072019.24/tarjetaCirc.jpg"
    //Guardar en el modelo de arhcivo

    $path = $carpeta.'/'.$nombre.'.'.$extension;
    $tipoArchivo=1;
    $privado=1;
    $result = insertObjDocCoch($tipoArchivo,$noVehiculo,$nombre,$path,$extension,$privado,1);
    return $result;

}

/**************FUNCION PARA INSERTAR OBJETO FILE CONTRATO******************/

function constructObjFC($nombre,$tipoArchivo,$idContrato,$path,$extension,$privado){
    include_once "../model/FILE_CONTRATO.php";
    $obj_FC= new FILE_CONTRATO();
    $obj_FC->setIdTipoArchivoFk($tipoArchivo);
    $obj_FC->setNoContratoFk($idContrato);
    $obj_FC->setNombre($nombre);
    $obj_FC->setPath($path);
    $obj_FC->setExt($extension);
    $obj_FC->setNivelAcceso($privado);
    return $obj_FC->queryaddFileContrato();
}
/**************FUNCION PARA INSERTAR OBJETO FILE COCHE DOCUMENTOS******************/

function insertObjDocCoch($tipoArchivo,$noVehiculo,$nombre,$path,$extension,$privado,$uso){
     include_once "../model/FILE_VEHICULO.php";
    //FCD = File Contrato Documento
    $obj_FCD= new FILE_VEHICULO();
    $obj_FCD->setIdTipoArchivoFk($tipoArchivo);
    $obj_FCD->setNoVehiculoFk($noVehiculo);
    $obj_FCD->setUsoArchivo($uso);
    $obj_FCD->setNombre($nombre);
    $obj_FCD->setPath($path);
    $obj_FCD->setExt($extension);
    $obj_FCD->setNivelAcceso($privado);
    return $obj_FCD->queryAddArchivosCoche();
}

//COnsulta todos los tipos de archivos disponibles
function consultaListaArchivos(){
    include_once "../model/TIPO_ARCHIVO.php";
    $objTiposFile = new TIPO_ARCHIVO();
    return $objTiposFile->consultaTiposArchivo();
}
/**************FUNCION PARA ACTUALIZAR NIVEL ACCESO FILE COCHE DOCUMENTOS******************/

function updateNivelAccesoFV($idFileVehiculo,$nivel_acceso){
    include_once  "../model/FILE_VEHICULO.php";
    //FCD = File Contrato Documento
    $obj_FCD = new FILE_VEHICULO();
    $obj_FCD->setIdFileV($idFileVehiculo);
    $obj_FCD->setNivelAcceso($nivel_acceso);
    return $obj_FCD->queryupdateNivelAcceso();
}
/**************FUNCION PARA ACTUALIZAR NIVEL ACCESO FILE CONTRATO DOCUMENTOS******************/

function updateNivelAccesoFC($idFileContrato,$nivel_acceso){
    include_once  "../model/FILE_CONTRATO.php";
    //FCD = File Contrato Documento
    $obj_FCD = new FILE_CONTRATO();
    $obj_FCD->setIdFileV($idFileContrato);
    $obj_FCD->setNivelAcceso($nivel_acceso);
    return $obj_FCD->queryupdateNivelAcceso();
}

function removeFileVehiculo($id_archivo_vehiculo){
    include_once "../model/FILE_VEHICULO.php";
    $objFileVehiculo= new FILE_VEHICULO();
    $objFileVehiculo->setIdFileV($id_archivo_vehiculo);
    $ruta= $objFileVehiculo->getRuta();
    $rutaFile = $ruta[0]['ruta'];
    $resultEliminaFileFisico = removeArchivoFisico($rutaFile);
    if($resultEliminaFileFisico)
        return $objFileVehiculo->queryDeleteFileVehiculo();
     else return false;
}
function removeFileContrato($idNoContrato){
    include_once "../model/FILE_CONTRATO.php";
    $objFileContrato= new FILE_CONTRATO();
    $objFileContrato->setIdFileC($idNoContrato);
    $ruta= $objFileContrato->getRuta();
    $rutaFile = $ruta[0]['ruta'];
    $resultEliminaFileFisico = removeArchivoFisico($rutaFile);
    if($resultEliminaFileFisico)
        return $objFileContrato->queryremoveFileContrato();
    else return false;
}

function removeArchivoFisico($ruta){
    return unlink($ruta);
}

function consultaArchivosContrato($noContrato){
    include_once  "../model/FILE_CONTRATO.php";
    //FCD = File Contrato Documento
    $obj_FCD = new FILE_CONTRATO();
    $obj_FCD->setNoContratoFk($noContrato);
    return $obj_FCD->queryConsultaDocumentosContrato();
}
