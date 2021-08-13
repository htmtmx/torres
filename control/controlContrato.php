<?php
/********************************************************************
 *               C O N S U L T A     C O N T R A T O
 *******************************************************************/
function consultaContrato($no_contrato)
{
    include_once "../model/CONTRATO.php";
    $objContrato = new CONTRATO();
    $objContrato->setNoContrato(0);
    $result = $objContrato->consultaContrato($objContrato->getNoContrato());
    //var_dump($result);
    return json_encode($result);
}

/********************************************************************
 *         U P D A T E     E S T A T U S     C O N T R A T O
 *******************************************************************/
function updateEstatusContrato ($no_contrato,$estatus)
{
    include_once "../model/CONTRATO.php";
    $objContrato = new CONTRATO();
    echo $result = $objContrato->updateEstatusContrato($no_contrato,$estatus)? "Se actualizo correctamente el estatus": "Error al intentar actualizar estatus";
}
/********************************************************************
 *                   D E L E T E     C O N T R A T O
 *******************************************************************/
function deleteContrato($no_contrato)
{
    include_once "../model/CONTRATO.php";
    $objContrato = new CONTRATO();
    $objContrato->deleteContrato($no_contrato);
}

/********************************************************************
 *                  FUNCIONES DE CONTRATO ADD DESDE WEB HOOK
 *******************************************************************/
function creaContratoCompra($params)
{
    $COCHE = constructObjCoche($params);

    $resultCoche = $COCHE->getNoVehiculo()>0 ? $COCHE->queryaddCoche() : false;

    $VENDEDOR = construcObjtCliente($params);
    $resultVendedor = $params['no_cliente']>0 ? $VENDEDOR->queryupdateCliente(): $VENDEDOR->queryaddCliente();

    if($resultVendedor && $resultCoche){
        $CONTRATO = constructObjContrato($params,$VENDEDOR->getNoCliente(),$COCHE->getNoVehiculo());

        $resultContrato = $CONTRATO->addContrato();
        if($resultContrato){
            include_once "./controlPago.php";
            $numGen = 62376723;
            $concepto="Pago de Compra";
            $tipo="CARGO";
            $detalles = "Se compró un vehiculo con placa ".$COCHE->getPlaca()." año ".$COCHE->getAnio();
            $resultPago = addPago($CONTRATO->getNoContrato(),$numGen,$concepto,$tipo,$CONTRATO->getTotal(),
                1,$detalles,1);

            return $resultPago;
        } else return  false;
    } else return false;

}

//FUNCION PARA CONSTRUIR UN OBJETO CLIENTE

function construcObjtCliente($params){
    include_once "../model/CLIENTES.php";
    include_once  "./tool_ids_generate.php";
    $obj_user = new CLIENTES();
    $claveGen = gen_user_id();
    $idCliente=$params['no_cliente']>0 ? $params['no_cliente'] : $claveGen;
    $obj_user->setNoCliente($idCliente);
    $obj_user->setNombre($params['nombre']);
    $obj_user->setApaterno($params['apaterno']);
    $obj_user->setAmaterno($params['amaterno']);
    $obj_user->setTelefono($params['telefono']);
    $obj_user->setCelular($params['celular']);
    $obj_user->setCorreo($params['correo']);
    $obj_user->setSubscripcion($params['subscripcion']);
    $obj_user->setEmpresa($params['empresa']);
    $obj_user->setFechaRegistro(date('Y-m-d H:i:s'));
    $obj_user->setMedioIdentificación($params['medio_identificacion']);
    $obj_user->setFolio($params['folio']);
    $obj_user->setTipoCliente($params['tipo_cliente']);
    $obj_user->setEstatus($params['estatusUs']);
    //REGRESAMOS EL OBJETO COMPLETO
    return $obj_user;
}


//Construimos el objeto contrato
function constructObjContrato($params,$noCliente,$noVehiculo){
    session_start();
    include_once "../model/CONTRATO.php";
    include_once  "./tool_ids_generate.php";
    $obj_cont = new CONTRATO();
    $claveContrato=gen_no_contrato();
    $obj_cont->setNoContrato($claveContrato);

    //Cuando se implemente el JS se cambiara el id empleado por el $_SESSION[no_empleado]

    $idEmpleado=7056282536482632;
    $obj_cont->setNoEmpleadoFk($idEmpleado);
    $obj_cont->setNoClienteFk($noCliente);
    $obj_cont->setNoVehiculoFk($noVehiculo);
    $obj_cont->setHoraFechaCreacion(date('Y-m-d H:i:s'));
    $obj_cont->setTipoContrato(1);
    $obj_cont->setPlazo($params['plazo']);
    $obj_cont->setFechaPrimerPago($params['fecha_primer_pago']);
    $obj_cont->setEnganche($params['enganche']);
    $obj_cont->setSaldo($params['saldo']);
    $obj_cont->setFormaPago($params['forma_pago']);
    $obj_cont->setSubtotal($params['subtotal']);
    $obj_cont->setIva(16);
    $obj_cont->setTotal($params['total']);
    $obj_cont->setEstatus($params['estatusCon']);
    return $obj_cont;
}

//FUNCION PARA CONSTRUIR UN OBJETO COCHE

function constructObjCoche($params){
    //CREA EL COCHE PARA EL CONTRATO
    include_once "../model/COCHE.php";
    include_once  "./tool_ids_generate.php";
    $obj_coche = new COCHE();
    $claveGeneradas = gen_no_vehiculo();
    $obj_coche -> setNoVehiculo($claveGeneradas);
    $obj_coche->setIdModeloFk($params['id_modelo_fk']);
    $obj_coche->setFechaRegistro(date('Y-m-d H:i:s'));
    $obj_coche -> setAnio($params['anio']);
    $obj_coche->setPlaca($params['placa']);
    $obj_coche->setEntidadPlaca($params['entidad_placa']);
    $obj_coche->setColor($params['color']);
    $obj_coche->setKilometros($params['kilometros']);
    $obj_coche->setTransimision($params['transmision']);
    $obj_coche->setCombustible($params['combustible']);
    $obj_coche->setNoPuertas($params['no_puertas']);
    $obj_coche->setPrecioContado($params['precio_contado']);
    $obj_coche->setPrecioCredito($params['precio_credito']);
    $obj_coche->setOpcCredito($params['opc_credito']);
    $obj_coche->setObservaciones($params['observaciones']);
    $obj_coche->setEstatus($params['estatusC']);
    return $obj_coche;
}