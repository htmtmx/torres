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
function addPago($pago)
{
    include_once "../model/PAGO.php";
    $result = $pago->queryaddPago();
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

function tipoPagoPlazo($pago)
{
    switch ($pago->getTipo()){
        //Contado
        case 0:

            $pago->setTipo(0);
            $pago->setNoPago(1);
            $pago->setNoTransaccion(date('YmdHis'));
            $result = addPago($pago);
            return $result;
            break;
        //Apartado
        case 1:

            break;
        //Credito
        case 2:

            break;

    }
}