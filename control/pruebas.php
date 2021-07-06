<?php
/*include_once "../model/MODELO.php";
$obj_modelo = new MODELO();
$obj_modelo->setIdMarcaFk(3);
$result= $obj_modelo->consultaModelos();
var_dump($result);*/

/*include_once "../model/MARCA.php";
$obj_marca = new MARCA();
$obj_marca->setIdMarca(4);
$result= $obj_marca->getListModelos();
var_dump($result);*/
/*
include_once "../model/MARCA.php";
$obj_listmarca = new MARCA();
$result = $obj_listmarca->listMarcas();
var_dump($result);*/
/*
include_once "../model/MODELO.php";
$objModel = new MODELO();
$objModel->setIdMarcaFk(27);
$objModel->setNombre("Modelo ".$objModel->getIdMarcaFk());
$result = $objModel->addModelo($objModel->getIdMarcaFk(),$objModel->getNombre())?"Se registro correctamente el modelo ".$objModel->getNombre():"";
var_dump($result);*/

include_once "../model/MODELO.php";
$objModel = new MODELO();
$objModel->setIdMarcaFk(16);
$objModel->setNombre("Modelo ".$objModel->getIdMarcaFk());
$objModel->setEstatus(3);
$objModel->setIdModelo(408);
$result = $objModel->updateModelo()?"Se actualizo correctamente el modelo ".$this->getIdModelo():"";
var_dump($result);

