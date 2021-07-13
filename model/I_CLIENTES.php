<?php


interface I_CLIENTES
{
    function consultaCliente($no_cliente);
    function addCliente();
    function updateCliente();
    function deleteCliente($no_cliente);
    function direccionCliente($no_cliente);
}