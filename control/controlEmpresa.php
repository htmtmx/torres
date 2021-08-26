<?php
function consultaEmpresa($id_empresa)
{
    include_once "../model/EMPRESA.php";
    $objEmpresa = new EMPRESA();
    $result = $objEmpresa->queryconsultaEmpresa($id_empresa);
    return json_encode($result);
}

function updateEmpresa($id_empresa,$rfc,$nombre,$calle,$no_ext,$no_int,
                       $colonia,$cp,$municipio,$estado,$telefono,
                       $correo,$sitio_web)
{
    include_once "../model/EMPRESA.php";
    $objEmpresa = new EMPRESA();
    $objEmpresa->setIdEmpresa($id_empresa);
    $objEmpresa->setRfc($rfc);
    $objEmpresa->setNombre($nombre);
    $objEmpresa->setCalle($calle);
    $objEmpresa->setNoExt($no_ext);
    $objEmpresa->setNoInt($no_int);
    $objEmpresa->setColonia($colonia);
    $objEmpresa->setCp($cp);
    $objEmpresa->setDeMun($municipio);
    $objEmpresa->setEstado($estado);
    $objEmpresa->setTelefono($telefono);
    $objEmpresa->setCorreo($correo);
    $objEmpresa->setSitioWeb($sitio_web);
    $result = $objEmpresa->queryupdateEmpresa();
    return $result;
}