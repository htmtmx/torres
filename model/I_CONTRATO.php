<?php


interface I_CONTRATO
{
    function consultaContrato($no_contrato);
    function consultaArchivosContrato($no_contrato);
    function addContrato();
    function updateEstatusContrato($no_contrato, $estatus);
    function deleteContrato($no_contrato);
}