<?php
/********************************************************************
 *                C O N S U L T A   M A R C A
 *******************************************************************/
function listaMarcas()
{
    include_once "../model/MARCA.php";
    $obj_listmarca = new MARCA();
    $result = $obj_listmarca->querylistMarcas();
    return json_encode($result);
}