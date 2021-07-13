<?php


interface I_DIRECCIONES
{
    function consultaDireccion ($no_cliente);
    function addDireccion();
    function updateDireccion ();
    function deleteDireccion($id_direccion);
}