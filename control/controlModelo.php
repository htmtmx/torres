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

