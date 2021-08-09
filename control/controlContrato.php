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
function addContrato($no_contrato,$no_empleado,$no_cliente,
                    $no_vehiculo,$tipo_contrato,$plazo,$enganche,
                    $saldo,$forma_pago)
{
    include_once "../model/CONTRATO.php";
    $objContrato = new CONTRATO();
    $objContrato->setNoContrato($no_contrato);
    $objContrato->setNoEmpleadoFk($no_empleado);
    $objContrato->setNoClienteFk($no_cliente);
    $objContrato->setNoVehiculoFk($no_vehiculo);
    $objContrato->setTipoContrato($tipo_contrato);
    $objContrato->setPlazo($plazo);
    $objContrato->setEnganche($enganche);
    $objContrato->setSaldo($saldo);
    $objContrato->setFormaPago($forma_pago);
    $objContrato->setSubtotal($objContrato->getSaldo());
    $objContrato->setIva($objContrato->getSubtotal()*0.16);
    $objContrato->setTotal($objContrato->getSubtotal()+$objContrato->getIva());
    echo $result = $objContrato->addContrato()? "Se registro correctamente el contrato ".$objContrato->getNoContrato():"Error al intentar registrar";
}

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