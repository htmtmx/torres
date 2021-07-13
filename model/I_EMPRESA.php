<?php


interface I_EMPRESA
{
    function consultaEmpresa($rfc);
    function consultaEmpleados($rfc);
    function addEmpresa();
    function updateEmpresa();
    function deleteEmpresa($rfc);
}