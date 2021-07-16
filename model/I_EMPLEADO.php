<?php


interface I_EMPLEADO
{
    function consultaEmpleado($no_empleado);
    function consultaEmpleados($id_empresa_fk);
    function addEmpleado();
    function updateEmpleado();
    function updatePw($no_empleado, $pwd);
    function updateStatusEmpleado($no_empleado, $estatus);
    function deleteEmpleado($no_empleado);
}