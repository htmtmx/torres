<?php
/********************************************************************
 *                  C O N S U L T A   M O D E L O S
 *******************************************************************/
function consultaModelos()
{
    include_once "../../model/MODELO.php";
    $obj_modelo = new MODELO();
    $obj_modelo->setIdMarcaFk(3);
    $result= $obj_modelo->consultaModelos($obj_modelo->getIdMarcaFk());
    var_dump($result);
}

