<?php


interface I_DIRECCIONES
{
    function queryconsultaDireccion ($no_cliente);
    function addDireccion();
    function updateDireccion ();
    function deleteDireccion($id_direccion);
}