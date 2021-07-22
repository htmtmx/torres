<?php
/*******************************************************************
 *  C O N S U L T A   L I S T A   M O D E L O S   P O R   M A R C A
 ****************************************************************/
/*include_once "../model/MARCA.php";
$obj_marca = new MARCA();
$obj_marca->setIdMarca(4);
$result= $obj_marca->getListModelos();
var_dump($result);*/
function listaMarcas()
{
    include_once "../model/MARCA.php";
    $obj_listmarca = new MARCA();
    $result = $obj_listmarca->listMarcas();
    return json_encode($result);
}

/********************************************************************
 *                C O N S U L T A   M A R C A
 *******************************************************************/
/*include_once "../model/MARCA.php";
$obj_listmarca = new MARCA();
$result = $obj_listmarca->consultaMarca(47);
var_dump($result);*/