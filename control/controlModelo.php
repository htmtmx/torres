<?php
/********************************************************************
 *                  C O N S U L T A   M O D E L O S
 *******************************************************************/
function consultaModelos($idMarca)
{
    include_once "../model/MODELO.php";
    $obj_modelo = new MODELO();
    $obj_modelo->setIdMarcaFk($idMarca);
    $result= $obj_modelo->consultaModelos($obj_modelo->getIdMarcaFk());
    return json_encode($result);
}

