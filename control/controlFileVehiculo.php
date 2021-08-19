<?php
function consultaFotoCoche($no_vehiculo)
{
    include_once "../model/FILE_VEHICULO.php";
    $objFoto = new FILE_VEHICULO();
    $result = $objFoto->queryConsultaImagenCoche($no_vehiculo);
    return $result;
}

function consultaFotosCoche($no_vehiculo)
{
    include_once "../model/FILE_VEHICULO.php";
    $objFotos = new FILE_VEHICULO();
    $result = $objFotos->queryConsultaImagenesCoche($no_vehiculo);
    return $result;
}
