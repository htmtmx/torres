<?php
/********************************************************************
 *               C O N S U L T A     C O N T R A T O
 *******************************************************************/
function consultaContrato($no_contrato)
{
    include_once "../model/CONTRATO.php";
    $objContrato = new CONTRATO();
    $objContrato->setNoContrato(0);
    $result = $objContrato->consultaContrato($objContrato->getNoContrato());
    //var_dump($result);
    return json_encode($result);
}

/********************************************************************
 *                       A D D     C O N T R A T O
 *******************************************************************/
include_once "../model/CONTRATO.php";
$objContrato = new CONTRATO();
$objContrato->setNoContrato(2);
$objContrato->setNoEmpleadoFk(58655210);
$objContrato->setNoClienteFk(2572742);
$objContrato->setNoVehiculoFk(1234);
$objContrato->setTipoContrato(1);
$objContrato->setPlazo(12);
$objContrato->setEnganche(45000);
$objContrato->setSaldo(100000);
$objContrato->setFormaPago("Efectivo");
$objContrato->setSubtotal($objContrato->getSaldo());
$objContrato->setIva($objContrato->getSubtotal()*0.16);
$objContrato->setTotal($objContrato->getSubtotal()+$objContrato->getIva());
echo $result = $objContrato->addContrato()? "Se registro correctamente el contrato ".$objContrato->getNoContrato():"Error al intentar registrar";
/********************************************************************
 *         U P D A T E     E S T A T U S     C O N T R A T O
 *******************************************************************/
function ($no_contrato,$estatus)
{
    include_once "../model/CONTRATO.php";
    $objContrato = new CONTRATO();
    echo $result = $objContrato->updateEstatusContrato($no_contrato,$estatus)? "Se actualizo correctamente el estatus": "Error al intentar actualizar estatus";
}
/********************************************************************
 *                   D E L E T E     C O N T R A T O
 *******************************************************************/
function deleteContrato($no_contrato)
{
    include_once "../model/CONTRATO.php";
    $objContrato = new CONTRATO();
    $objContrato->deleteContrato($no_contrato);
}