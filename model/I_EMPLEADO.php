<?php


interface I_EMPLEADO
{
    function consultaEmpleado($no_empleado);
    function addEmpleado();
    function updateEmpleado();
    function deleteEmpleado($no_empleado);
}