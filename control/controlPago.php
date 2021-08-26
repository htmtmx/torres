<?php
/********************************************************************
 *         U P D A T E     E S T A T U S     P A G O
 *******************************************************************/
function updateEstatusPago($id_pago,$estatus_pago)
{
    include_once "../model/PAGO.php";
    $objPago = new PAGO();
    $result = $objPago->queryupdateEstatusPago($id_pago,$estatus_pago);
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
 * C O N S U L T A     P A G O S     P O R     N O      C O N T R A T O
 *******************************************************************/
function consultaPagos($no_contrato_fk)
{
    include_once "../model/PAGO.php";
    $objPago = new PAGO();
    $result = $objPago->queryconsultaPago($no_contrato_fk);
    return $result;
}

/********************************************************************
 * C O N S U L T A     A B O N O S    D E     U N      P A G O
 *******************************************************************/
function consultaAbonosDePago($id_pago)
{
    include_once "../model/ABONOS.php";
    $obj_Abono = new ABONOS();
    return $obj_Abono->queryconsultaAbonos($id_pago);
}

/********************************************************************
 * U P D A T E     S A L D O    D E     U N      P A G O
 *******************************************************************/

function updateSaldoDePago($id_pago,$saldo)
{
    include_once "../model/PAGO.php";
    $objPago = new PAGO();
    $result = $objPago->queryUpdateSaldo($id_pago,$saldo);
    return $result;
}

function montoPagos()
{
    include_once "../model/PAGO.php";
    $objPago = new PAGO();
    $result = $objPago->queryMontoPagosPendientes();
    return json_encode($result);
}

function noPagosPendientes()
{
    include_once "../model/PAGO.php";
    $objPago = new PAGO();
    $result = $objPago->queryNoPagosPendientes();
    return json_encode($result);
}

function consultaPagosPendientesDeTodosContratos()
{
    include_once "../model/PAGO.php";
    $objPago = new PAGO();
    $result = $objPago->queryAllPagosPendintes();
    return json_encode($result);
}

