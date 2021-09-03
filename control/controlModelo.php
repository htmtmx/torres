<?php
/********************************************************************
 *                  C O N S U L T A   M O D E L O S
 *******************************************************************/
function consultaModelos($idMarca)
{
    include_once "../model/MODELO.php";
    $obj_modelo = new MODELO();
    $result= $obj_modelo->queryconsultaModelos($idMarca);
    return json_encode($result);
}

function addModelo($marca,$nombre){
    include_once "../model/MODELO.php";
    $modelo = new MODELO();
    $modelo->setIdMarcaFk($marca);
    $modelo->setNombre($nombre);
    $result= $modelo->queryaddModelo();
    return $result;
}

function updateModelo($marca,$nombre,$id_modelo){
    include_once "../model/MODELO.php";
    $modelo = new MODELO();
    $modelo->setIdMarcaFk($marca);
    $modelo->setNombre($nombre);
    $modelo->setIdModelo($id_modelo);
    $result = $modelo->queryupdateModelo();
    return $result;
}

function updateEstatusModelo($id_modelo,$estatus){
    include_once "../model/MODELO.php";
    $modelo = new MODELO();
    $modelo->setIdModelo($id_modelo);
    $modelo->setEstatus($estatus);
    return $modelo->queryupdateEstatusModelo();
}

function deleteModelo($id_modelo)
{
    include_once "../model/MODELO.php";
    $modelo = new MODELO();
    $modelo->setIdModelo($id_modelo);
    return $modelo->queryDeleteModelo();
}