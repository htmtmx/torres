<?php


interface I_EMPRESA
{
    function listEmpleados();
    function consultaEmpresa($id_empresa_fk);
    function addEmpresa();
    function updateEmpresa();
    function deleteEmpresa($id_empresa_fk);
}