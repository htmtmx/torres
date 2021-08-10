<?php


interface I_EMPLEADO
{
    function queryconsultaEmpleado($no_empleado);
    function queryaddEmpleado();
    function queryupdateEmpleado();
    function queryupdatePw($no_empleado, $pwd);
    function queryupdateStatusE($no_empleado, $estatus);
}