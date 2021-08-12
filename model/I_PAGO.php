<?php


interface I_PAGO
{
    function queryconsultaPago($folio);
    function queryaddPago();
    function queryupdateEstatusPago($folio,$estatus_pago);
    function queryeliminaPago($folio);
}