<?php

interface I_COCHE
{
    function consultaCoches($no_vehiculo);
    function addCoche();
    function updateCoche();
    function updateEstatusCoche($no_vehiculo,$estatus);
    function deleteCoche($no_vehiculo);
    function consultaDetallesCoche($no_vehiculo);
}