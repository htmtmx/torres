<?php


interface I_EMPLEADO
{
    function consultaEmpleado($no_empleado);
    function addEmpleado();
    function updateEmpleado();
    function updatePw($no_empleado, $pwd);
    function updateStatusEmpleado($no_empleado, $estatus);
}