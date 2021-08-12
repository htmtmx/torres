<?php
/********************************************************************
 *         U P D A T E     E S T A T U S     P A G O
 *******************************************************************/
function updateEstatusPago($folio,$estatus_pago)
{
    include_once "../model/PAGO.php";
    $objPago = new PAGO();
    $result = $objPago->queryupdateEstatusPago($folio,$estatus_pago);
    return $result;
}
/********************************************************************
 *         D E L E T E     P A G O
 *******************************************************************/
function deletePago($folio)
{
    include_once "../model/PAGO.php";
    $objPago = new PAGO();
    $result = $objPago->queryeliminaPago($folio);
    return $result;
}
/********************************************************************
 *         A D D     P A G O
 *******************************************************************/
function addPago($no_contrato_fk,$no_transaccion,$concepto,$tipo,
                    $total,$no_pago,$detalles,$estatus_pago)
{
    include_once "../model/PAGO.php";
    $objPago = new PAGO();
    $objPago->setNoContratoFk($no_contrato_fk);
    $objPago->setNoTransaccion($no_transaccion);
    $objPago->setConcepto($concepto);
    $objPago->setTipo($tipo);
    $objPago->setTotal($total);
    $objPago->setFechaHoraCreacion(date('Y-m-d H:i:s'));
    $objPago->setNoPago($no_pago);
    $objPago->setDetalles($detalles);
    $objPago->setEstatusPago($estatus_pago);
    $result = $objPago->queryaddPago();
    return  $result;
}
/********************************************************************
 * C O N S U L T A     P A G O S     P O R     N O      C O N T R A T O
 *******************************************************************/
function consultaPago($no_contrato_fk)
{
    include_once "../model/PAGO.php";
    $objPago = new PAGO();
    $result = $objPago->queryconsultaPago($no_contrato_fk);
    return json_encode($result);
}