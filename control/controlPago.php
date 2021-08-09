<?php
/********************************************************************
 *         U P D A T E     E S T A T U S     P A G O
 *******************************************************************/
function ($folio,$estatus_pago)
{
    include_once "../model/PAGO.php";
    $objPago = new PAGO();
    echo $result = $objPago->updateEstatusPago($folio,$estatus_pago) ? "Se actualizo correctamente el estatus": "Error al intentar actualizar el estatus";
}
/********************************************************************
 *         D E L E T E     P A G O
 *******************************************************************/
function ($folio)
{
    include_once "../model/PAGO.php";
    $objPago = new PAGO();
    $objPago->eliminaPago($folio);
}