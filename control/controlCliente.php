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

function queryCliente($noCliente,$nombreCliente,$apaternoCliente,$amaternoCliente,
                    $telefonoCliente,$celularCliente,$correoCliente,$suscripcionCliente,
                    $empresaCliente,$medioIdentificacion,$folioCliente,$tipoCliente,
                    $rfcCliente, $actionToRealize)
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

    $actionMje = $actionToRealize == 0 ? " actualizó ": " registró ";

    if ($actionToRealize== 1 && $noCliente == 0){
        //voy a agregar un registro
        //genero la  clave del cliente
        include_once "./tool_ids_generate.php";
        $objCliente-> setNoCliente(gen_client_id());
        $result = $objCliente-> addCliente();
    }
    else{
        //voy a solo actualizar los datos del cliente
        $result = $objCliente-> updateCliente();
    }

    $mjeReturn = $result ? "Se ".$actionMje." correctamente al cliente " :"Error al intentar registrar";
    echo  $mjeReturn;
}

function consultaCliente($idCliente)
{
    include_once "../model/CLIENTES.php";
    $objCliente = new CLIENTES();
    $result = $objCliente->consultaCliente($idCliente);
    return json_encode($result);;
}

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