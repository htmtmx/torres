<?php


function agregaDocumentoContrato($nombreIMG1,$archivo1,$idContrado,$tipoArchivo,$privado){
    $carpeta = '../contratos/'.$idContrado; // URL COMPLETA
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

    return true;
}

function agregaDocumentoCoche(){

}

function agregaImagenCoche(){

}

//COnsulta todos los tipos de archivos disponibles
function consultaListaArchivos(){
    include_once "../model/TIPO_ARCHIVO.php";
    $objTiposFile = new TIPO_ARCHIVO();
    return $objTiposFile->consultaTiposArchivo();
}