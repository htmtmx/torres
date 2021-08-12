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
 *                       A D D     C O N T R A T O
 *******************************************************************/
function addContrato($no_contrato,$no_empleado,$no_cliente,
                    $no_vehiculo,$tipo_contrato,$plazo,$enganche,
                    $saldo,$forma_pago)
{
    include_once "../model/CONTRATO.php";
    $objContrato = new CONTRATO();
    $objContrato->setNoContrato($no_contrato);
    $objContrato->setNoEmpleadoFk($no_empleado);
    $objContrato->setNoClienteFk($no_cliente);
    $objContrato->setNoVehiculoFk($no_vehiculo);
    $objContrato->setTipoContrato($tipo_contrato);
    $objContrato->setPlazo($plazo);
    $objContrato->setEnganche($enganche);
    $objContrato->setSaldo($saldo);
    $objContrato->setFormaPago($forma_pago);
    $objContrato->setSubtotal($objContrato->getSaldo());
    $objContrato->setIva($objContrato->getSubtotal()*0.16);
    $objContrato->setTotal($objContrato->getSubtotal()+$objContrato->getIva());
    echo $result = $objContrato->addContrato()? "Se registro correctamente el contrato ".$objContrato->getNoContrato():"Error al intentar registrar";
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
    //CREA EL COCHE PARA EL CONTRATO
    include_once "../model/COCHE.php";
    $obj_coche = new COCHE();
    $claveGeneradas = 5435;
    $obj_coche -> setNoVehiculo($claveGeneradas);
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
    $addCoche = $obj_coche->queryaddCoche();

    $VENDEDOR = construcObjtCliente($params);
    $resultVendedor = $params['no_cliente']>0 ? $VENDEDOR->queryupdateCliente(): $VENDEDOR->queryaddCliente();

    if($resultVendedor && $addCoche){
        $CONTRATO = constructObjContrato($params,$VENDEDOR->getNoCliente(),$obj_coche->getNoVehiculo());
        return $CONTRATO->addContrato();
    } else return false;

}

//FUNCION PARA CONSTRUIR UN OBJETO CLIENTE

function construcObjtCliente($params){
    include_once "../model/CLIENTES.php";
    $obj_user = new CLIENTES();
    $claveGen = 555;
    $idCliente=$params['no_cliente']>0 ? $params['no_cliente'] : $claveGen;
    $obj_user->setNoCliente($idCliente);
    $obj_user->setNombre($params['nombre']);

    //Todos los demas atributos

    return $obj_user;
}

function constructObjContrato($params,$noCliente,$noVehiculo){
    session_start();
    include_once "../model/CONTRATO.php";
    $obj_cont = new CONTRATO();
    $claveContrato=545436;
    $obj_cont->setNoContrato($claveContrato);

    //Cuando se implemente el JS se cambiara el id empleado por el $_SESSION[no_empleado]

    $idEmpleado=7056282536482632;
    $obj_cont->setNoEmpleadoFk($idEmpleado);
    $obj_cont->setNoClienteFk($noCliente);
    $obj_cont->setNoVehiculoFk($noVehiculo);
    $obj_cont->setHoraFechaCreacion(date('Y-m-d H:i:s'));
    $obj_cont->setTipoContrato(1);

    //Todos los demas atributos

    return $obj_cont;
}