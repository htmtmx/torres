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

    $path = $carpeta.'/'.$tipoArchivo.'.'.$extension;
    $FC= constructObjFC($nombre,$tipoArchivo,$idContrato,$path,$extension,$privado);
    return $FC;
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

    echo $privado == 1 ? "PUBLICO": "PRIVADO";
    $nombre =str_replace(' ', '', $nombre);
    $ruta1 = $carpeta.'/'.$nombreIMG1; // RUTA1 EXAMPLE: "/24072019.24/e-r.jpg"
    $extension = pathinfo($ruta1, PATHINFO_EXTENSION);
    move_uploaded_file($archivo1, $ruta1);
    rename ($ruta1, $carpeta.'/'.$nombre.'.'.$extension); // RUTA1 EXAMPLE: "/24072019.24/tarjetaCirc.jpg"
    //Guardar en el modelo de arhcivo

    $path = $carpeta.'/'.$tipoArchivo.'.'.$extension;
    $result = insertObjDocCoch($tipoArchivo,$noVehiculo,$nombre,$path,$extension,$privado);
    return $result;
}

function agregaImagenCoche($noVehiculo, $nombreIMG1, $archivo1){
    $carpeta = '../contratos/'.$noVehiculo.'/image'; // URL COMPLETA
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
    include "../model/SINGLETON_TIPOS_ARCHIVOS.php";
    $listaArchivostmp = SINGLETON_TIPOS_ARCHIVOS::getInst()->consultaTiposDocumento();
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
    $result = insertObjDocCoch($tipoArchivo,$noVehiculo,$nombre,$path,$extension,$privado);
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

function insertObjDocCoch($tipoArchivo,$noVehiculo,$nombre,$path,$extension,$privado){
     include_once "../model/FILE_VEHICULO.php";
    $obj_FCD= new FILE_VEHICULO();
    $obj_FCD->setIdTipoArchivoFk($tipoArchivo);
    $obj_FCD->setNoVehiculoFk($noVehiculo);
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
    $obj_FCD = new FILE_VEHICULO();
    $obj_FCD->setIdFileV($idFileVehiculo);
    $obj_FCD->setNivelAcceso($nivel_acceso);
    return $obj_FCD->queryupdateNivelAcceso();
}
/**************FUNCION PARA ACTUALIZAR NIVEL ACCESO FILE CONTRATO DOCUMENTOS******************/

function updateNivelAccesoFC($idFileContrato,$nivel_acceso){
    include_once  "../model/FILE_CONTRATO.php";
    $obj_FCD = new FILE_CONTRATO();
    $obj_FCD->setIdFileV($idFileContrato);
    $obj_FCD->setNivelAcceso($nivel_acceso);
    return $obj_FCD->queryupdateNivelAcceso();
}