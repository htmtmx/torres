<?php

function queryCliente($noCliente,$nombreCliente,$apaternoCliente,$amaternoCliente,
                    $telefonoCliente,$celularCliente,$correoCliente,$suscripcionCliente,
                    $empresaCliente,$medioIdentificacion,$folioCliente,$tipoCliente,
                    $rfcCliente, $estatus, $actionToRealize)
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
        $objCliente->setFechaRegistro(date('Y-m-d H:i:s'));
        $result = $objCliente-> queryaddCliente();
    }
    else{
        //voy a solo actualizar los datos del cliente
        $objCliente->setEstatus($estatus);
        $result = $objCliente-> queryupdateCliente();
    }

    $mjeReturn = $result ? "Se ".$actionMje." correctamente al cliente " :"Error al intentar registrar";
    echo  $mjeReturn;
}
/*****************************
Trae consulta de clientes 1 o N
 */
function consultaCliente($idCliente)
{
    include_once "../model/CLIENTES.php";
    $objCliente = new CLIENTES();
    $result = $objCliente->queryconsultaCliente($idCliente);
    return json_encode($result);
}

/********************************************************************
 *                 U P D A T E    S T A T U S     C L I E N T E
 *******************************************************************/

function updateStatus($idCliente){
    include_once "../model/CLIENTES.php";
    $objCliente = new CLIENTES();
    return $objCliente->queryUpdateStatus($idCliente);
}

/********************************************************************
 *                 U P D A T E    C L I E N T E
 *******************************************************************/
function updateCliente($noCliente,$nombreCliente,$apaternoCliente,$amaternoCliente,
                       $telefonoCliente,$celularCliente,$correoCliente,
                       $empresaCliente,$medioIdentificacion,$folioCliente,$tipoCliente,
                       $rfcCliente)
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
    $objCliente->setSubscripcion(1);
    $objCliente->setEmpresa($empresaCliente);
    $objCliente->setRfc($rfcCliente);
    $objCliente->setMedioIdentificación($medioIdentificacion);
    $objCliente->setFolio($folioCliente);
    $objCliente->setTipoCliente($tipoCliente);
    $objCliente->setEstatus(1);
    return $objCliente->queryupdateCliente();
}

/********************************************************************
 *                 D E L E T E    C L I E N T E
 *******************************************************************/
function deleteCliente($idCliente){
    include_once "../model/CLIENTES.php";
    $objCliente = new CLIENTES();
    return $objCliente->querydeleteCliente($idCliente);
}
/********************************************************************
 *              D I R E C C I O N    C L I E N T E
 *******************************************************************/
function listDireccionesCliente($noCliente){
    include_once "../model/CLIENTES.php";
    $objCliente = new CLIENTES();
    $objCliente->setNoCliente($noCliente);
    $result = $objCliente->getListDirecciones();
    return json_encode($result);
}
