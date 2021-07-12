<?php

interface I_COCHE
{
    function consultaCoches($no_vehiculo);
    function addCoche();
    function updateCoche();
    function deleteCoche($no_vehiculo);
}