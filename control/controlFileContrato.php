<?php
function addFileContrato($id_tipo_archivo, $no_contrato,$nombre,
                        $path,$ext,$nivel_acceso)
{
    include_once "../model/FILE_CONTRATO.php";
    $objFileContrato = new FILE_CONTRATO();
    $objFileContrato->setIdTipoArchivoFk($id_tipo_archivo);
    $objFileContrato->setNoContratoFk($no_contrato);
    $objFileContrato->setNombre($nombre);
    $objFileContrato->setPath($path);
    $objFileContrato->setExt($ext);
    $objFileContrato->setNivelAcceso($nivel_acceso);
    $objFileContrato->addFileContrato();
}

function removeFileContrato($idFileContrato)
{
    include_once "../model/FILE_CONTRATO.php";
    $objFileContrato = new FILE_CONTRATO();
    $objFileContrato->removeFileContrato($idFileContrato);
}

function updateNivelAcceso($idFileContrato,$nivel_acceso)
{
    include_once "../model/FILE_CONTRATO.php";
    $objFileContrato = new FILE_CONTRATO();
    $objFileContrato->updateNivelAcceso($idFileContrato,$nivel_acceso,);
}