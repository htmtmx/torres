<?php


interface I_PAGO
{
    function consultaPago($folio);
    function addPago();
    function updateEstatusPago($folio,$estatus_pago);
    function eliminaPago($folio);
}