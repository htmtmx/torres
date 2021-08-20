<?php

interface I_COCHE
{
    function queryconsultaCoches($no_vehiculo,$filter);
    function queryaddCoche();
    function queryupdateCoche();
    function queryupdateEstatusCoche($no_vehiculo,$estatus);
    function querydeleteCoche($no_vehiculo);
    function queryconsultaDetallesCoche($no_vehiculo);
}