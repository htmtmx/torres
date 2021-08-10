<?php


interface I_CLIENTES
{
    function queryconsultaCliente($no_cliente);
    function queryaddCliente();
    function queryupdateCliente();
    function querydeleteCliente($no_cliente);
    function querydireccionCliente($no_cliente);
}