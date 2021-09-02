<?php

function queryCliente($nombreCliente,$apaternoCliente,$amaternoCliente,
                    $telefonoCliente,$celularCliente,$correoCliente,$suscripcionCliente,
                    $empresaCliente,$medioIdentificacion,$folioCliente,$tipoCliente,
                    $rfcCliente)
{
    include_once "../model/CLIENTES.php";
    include_once "../control/tool_ids_generate.php";
    $objCliente = new CLIENTES();
    $objCliente-> setNoCliente(gen_client_id());
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
    $objCliente->setFechaRegistro(date('Y-m-d H:i:s'));
    if($objCliente->queryaddCliente()){
        return $objCliente;
    }
    return false;


}
/*****************************
Trae consulta de clientes 1 o N
 */
function consultaCliente($idCliente)
{
    include_once "../model/CLIENTES.php";
    $objCliente = new CLIENTES();
    $personas = $objCliente->queryconsultaCliente($idCliente);
    $dataPersonas=array();
    foreach ($personas as $persona){
        $arrayDireccion = listDireccionesCliente($persona['no_cliente']);
        array_push($persona,$arrayDireccion);
        array_push($dataPersonas,$persona);
    }
    return json_encode($dataPersonas);
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
function updateCliente($params)
{
    include_once "../model/CLIENTES.php";
    $objCliente = new CLIENTES();
    $objCliente->setNoCliente($params['noCliente']);
    $objCliente->setNombre($params['nombreCliente']);
    $objCliente->setApaterno($params['apaternoCliente']);
    $objCliente->setAmaterno($params['amaternoCliente']);
    $objCliente->setTelefono($params['telefonoCliente']);
    $objCliente->setCelular($params['celularCliente']);
    $objCliente->setCorreo($params['correoCliente']);
    $objCliente->setSubscripcion(1);
    $objCliente->setEmpresa($params['empresaCliente']);
    $objCliente->setRfc($params['rfcCliente']);
    $objCliente->setMedioIdentificación($params['medioIdentificacion']);
    $objCliente->setFolio($params['folioCliente']);
    $objCliente->setTipoCliente($params['tipoCliente']);
    $objCliente->setEstatus(1);
    if($objCliente->queryupdateCliente()){
        include_once "controlContrato.php";
        include_once "../model/DIRECCIONES.php";
        $DIRECCION = constructObjDireccion($params,$objCliente->getNoCliente());
        $resultDireccion = $params['id_dir']>0? $DIRECCION->queryupdateDireccion():$DIRECCION->queryaddDireccion();
        return $resultDireccion;
    }
    return false;
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
    return $result;
}
