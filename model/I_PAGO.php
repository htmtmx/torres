<?php


interface I_PAGO
{
    function consultaPago($folio);
    function addPAgo();
    function updatePago();
    function updateEstatusPago($folio);
}