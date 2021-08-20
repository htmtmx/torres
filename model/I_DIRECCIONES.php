<?php


interface I_DIRECCIONES
{
    function queryconsultaDireccion ($no_cliente);
    function queryaddDireccion();
    function queryupdateDireccion ();
    function querydeleteDireccion();
}