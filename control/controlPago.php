<?php
/********************************************************************
 *         U P D A T E     E S T A T U S     P A G O
 *******************************************************************/
function updateEstatusPago($folio,$estatus_pago)
{
    include_once "../model/PAGO.php";
    $objPago = new PAGO();
    $result = $objPago->updateEstatusPago($folio,$estatus_pago);
    return $result;
}
/********************************************************************
 *         D E L E T E     P A G O
 *******************************************************************/
function deletePago($folio)
{
    include_once "../model/PAGO.php";
    $objPago = new PAGO();
    $result = $objPago->eliminaPago($folio);
    return $result;
}
/********************************************************************
 *         A D D     P A G O
 *******************************************************************/
function addPago($no_contrato_fk,$no_transaccion,$concepto,$tipo,
                    $total,$no_pago,$detalles)
{
    include_once "../model/PAGO.php";
    $objPago = new PAGO();
    $objPago->setNoContratoFk($no_contrato_fk);
    $objPago->setNoTransaccion($no_transaccion);
    $objPago->setConcepto($concepto);
    $objPago->setTipo($tipo);
    $objPago->setTotal($total);
    $objPago->setNoPago($no_pago);
    $objPago->setDetalles($detalles);
    $result = $objPago->addPago();
    return  $result;
}
/********************************************************************
 * C O N S U L T A     P A G O S     P O R     N O      C O N T R A T O
 *******************************************************************/
function consultaPago($no_contrato_fk)
{
    include_once "../model/PAGO.php";
    $objPago = new PAGO();
    $result = $objPago->consultaPago($no_contrato_fk);
    return json_encode($result);
}