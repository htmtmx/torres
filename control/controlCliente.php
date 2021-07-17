<?php
function updateCliente($noCliente,$nombreCliente,$apaternoCliente,$amaternoCliente,
                    $telefonoCliente,$celularCliente,$correoCliente,$suscripcionCliente,
                    $empresaCliente,$medioIdentificacion,$folioCliente,$tipoCliente,
                    $rfcCliente,$statuscliente)
{
    include_once "../model/CLIENTES.php";
    $objCliente = new CLIENTES();
    $objCliente->setNoCliente($noCliente);
    $objCliente->setNombre($nombreCliente);
    $objCliente->setApaterno($apaternoCliente);
    $objCliente->setAmaterno($amaternoCliente);
    $objCliente->setTelefono($telefonoCliente);
    $objCliente->setCelular($celularCliente);
    $objCliente->setCorreo($correoCliente);
    $objCliente->setSubscripcion($suscripcionCliente);
    $objCliente->setEmpresa($empresaCliente);
    $objCliente->setRfc($rfcCliente);
    $objCliente->setMedioIdentificación($medioIdentificacion);
    $objCliente->setFolio($folioCliente);
    $objCliente->setTipoCliente($tipoCliente);
    $objCliente->setEstatus($statuscliente);
    echo $result = $objCliente->updateCliente() ? "Se actualizo correctamente al cliente ".$objCliente->getNoCliente():"Error al intentar actualizar";
}

function addCliente($noCliente,$nombreCliente,$apaternoCliente,$amaternoCliente,
                    $telefonoCliente,$celularCliente,$correoCliente,$suscripcionCliente,
                    $empresaCliente,$medioIdentificacion,$folioCliente,$tipoCliente,
                    $rfcCliente)
{
    include_once "../model/CLIENTES.php";
    $objCliente = new CLIENTES();
    $objCliente->setNoCliente($noCliente);
    $objCliente->setNombre("$nombreCliente");
    $objCliente->setApaterno("$apaternoCliente");
    $objCliente->setAmaterno("$amaternoCliente");
    $objCliente->setTelefono("$telefonoCliente");
    $objCliente->setCelular("$celularCliente");
    $objCliente->setCorreo($correoCliente);
    $objCliente->setSubscripcion($suscripcionCliente);
    $objCliente->setEmpresa("$empresaCliente");
    $objCliente->setRfc("$rfcCliente");
    $objCliente->setMedioIdentificación("$medioIdentificacion");
    $objCliente->setFolio("$folioCliente");
    $objCliente->setTipoCliente($tipoCliente);
    echo $result = $objCliente->addCliente() ? "Se registro correctamente al cliente ".$objCliente->getNoCliente():"Error al intentar registrar";
}

/********************************************************************
 *              C O N S U L T A    C L I E N T E S
 *******************************************************************/
/*include_once "../model/CLIENTES.php";
$objCliente = new CLIENTES();
$result = $objCliente->consultaCliente(666);
var_dump($result);*/
/********************************************************************
 *                 U P D A T E    C L I E N T E
 *******************************************************************/

/********************************************************************
 *                 D E L E T E    C L I E N T E
 *******************************************************************/
/*include_once "../model/CLIENTES.php";
$objCliente = new CLIENTES();
echo $result = $objCliente->deleteCliente(666)?"Se elimino correctamente el cliente":"Error al intentar eliminar";*/
/********************************************************************
 *              D I R E C C I O N    C L I E N T E
 *******************************************************************/
/*include_once "../model/CLIENTES.php";
$objCliente = new CLIENTES();
$objCliente->setNoCliente(297659297675);
$result = $objCliente->direccionCliente($objCliente->getNoCliente());
var_dump($result);*/