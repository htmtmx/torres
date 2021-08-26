<?php


interface I_CONTRATO
{
    function consultaDetallesContrato();
    function consultaPagosAbonosDeContrato($no_contrato);
    function queryaddContrato();
    function queryupdateEstatusContrato($no_contrato, $estatus);
    function querydeleteContrato($no_contrato);

}