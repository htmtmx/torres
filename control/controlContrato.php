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
/********************************************************************
 *                  CREAR CONTRATO DE ADQUISICION
 *******************************************************************/
function creaContratoCompra($params)
{
    //Ya registre un coche nuevo
    $COCHE = constructObjCoche($params);
    $resultCoche = $COCHE->queryaddCoche();
    $VENDEDOR = construcObjtCliente($params);
    $resultVendedor = $params['no_cliente']>0 ? $VENDEDOR->queryupdateCliente(): $VENDEDOR->queryaddCliente();

    if($resultVendedor && $resultCoche){
        // 1 - C_COMPRA 0-Contrato_Vta
        $tipoContrato = 1; // Compra de vehiculo
        $plazos = 1; // Porque defino que ya lo pago TORRES
        $fechaPrimerPago = date('Y-m-d');
        $totalCoche = $params['total'];
        $enganche = $totalCoche;
        $estatusContrato = 1; // va  a ser terminado
        $formaPago = $params['forma_pago'];
        $CONTRATO = constructObjContrato($formaPago,$VENDEDOR->getNoCliente(),$COCHE->getNoVehiculo(),
            $tipoContrato,$plazos,$fechaPrimerPago, $totalCoche, $enganche,$estatusContrato);

        $resultContrato = $CONTRATO->addContrato();

        if($resultContrato){
            include_once "./controlPago.php";
            $noDePago = 1;
            $concepto="Pago de Adquisición de Vehiculo";
            $tipo="CARGO";
            $fechaLimiTePago = date('Y-m-d H:i:s');
            $StatusPago = 1; //Liquidado de forma automatica
            $detalles = "Se compró un vehiculo con placa ".$COCHE->getPlaca()." año ".$COCHE->getAnio();
            //Funcion para Insertar y crear un objeto PAGO
            include_once "tool_ids_generate.php";
            $idPago = gen_noPago();
            $resultPago = insertaObjPago($idPago,$CONTRATO->getNoContrato(),$concepto,$tipo,$CONTRATO->getTotal(),$noDePago,$detalles,$StatusPago,$fechaLimiTePago);
            //SI YA SE CREO EL PAGO CREO EL ABONO
            if ($resultPago){
                //Crerar el OBJ de abono
                $resutlAbono = insertaAbono($idPago,$CONTRATO->getTotal(),"Este abono es por la compra de la nueva adquisicion");
                return $resutlAbono;
            }

        } else return  false;
    } else return false;

}
/********************************************************************
 *                  CREAR CONTRATO VENTA
 *******************************************************************/
function creaContratoVenta($params)
{
    $COMPRADOR = construcObjtCliente($params);
    $resultComprador = $params['no_cliente']>0 ? $COMPRADOR->queryupdateCliente() : $COMPRADOR->queryaddCliente();

    if ($resultComprador) {
        $CONTRATO = constructObjContrato($params,$COMPRADOR->getNoCliente(),$params['no_vehiculo']);
        //OK
        $resultContrato = $CONTRATO->addContrato();
        if ($resultContrato) {

            include_once "./controlPago.php";
            //$noContrato,$concepto,$tipo,$total,$noPago,$detalles,$StatusPago
            $PAGO = insertaObjPago($params,$CONTRATO->getNoContrato());
            $resultPago = tipoPagoPlazo($PAGO);

            include_once  "./controlCoche.php";
            updateEstatusCoche($params['no_vehiculo'],0);
            return $resultPago;
        }else return  false;
    }else return  false;
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
    //REGRESAMOS EL OBJETO COMPLETO
    return $obj_user;
}


//Construimos el objeto contrato
function constructObjContrato($formaPago,$noCliente,$noVehiculo, $tipoContrato,
                              $plazo,$fechaPrimerPago, $totalCoche, $enganche, $estatusContrato){
    session_start();
    include_once "../model/CONTRATO.php";
    include_once  "./tool_ids_generate.php";
    $obj_cont = new CONTRATO();
    $claveContrato=gen_no_contrato();
    $obj_cont->setNoContrato($claveContrato);
    //Cuando se implemente el JS se cambiara el id empleado por el $_SESSION[no_empleado]
    $idEmpleado=58655210;
    $obj_cont->setNoEmpleadoFk($idEmpleado);
    $obj_cont->setNoClienteFk($noCliente);
    $obj_cont->setNoVehiculoFk($noVehiculo);
    $obj_cont->setHoraFechaCreacion(date('Y-m-d H:i:s'));
    $obj_cont->setTipoContrato($tipoContrato);
    $obj_cont->setPlazo($plazo);
    $obj_cont->setFechaPrimerPago($fechaPrimerPago);
    $obj_cont->setEnganche($enganche);
    //Lo que falta pagar del carro
    $saldo =  $totalCoche-$enganche;
    $obj_cont->setSaldo($saldo);
    $obj_cont->setFormaPago($formaPago);
    /*
     * SUBTOTAL $: 84,000
     * + IVA $: 16,000  +
     * COSTO TOTAL DEL COCHE: $100,000
     *
     *
     * TOTAL DEL COCHE: $100,000
     * PAGO ENGANCHE: $ 35,000
     * SALDO: $65,000
     * */
    $IVA = $totalCoche * .16;
    $subTotal = $totalCoche - $IVA;
    $obj_cont->setSubtotal($subTotal);
    $obj_cont->setIva($IVA);
    $obj_cont->setTotal($totalCoche);
    $obj_cont->setEstatus($estatusContrato);
    return $obj_cont;
}

//FUNCION PARA CONSTRUIR UN OBJETO COCHE

function constructObjCoche($params){
    //CREA EL COCHE PARA EL CONTRATO
    include_once "../model/COCHE.php";
    include_once  "./tool_ids_generate.php";
    $obj_coche = new COCHE();
    $no_vehiculo = gen_no_vehiculo();
    $obj_coche -> setNoVehiculo($no_vehiculo);
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
    $obj_coche->setEstatus(0); // automaticamente lo pongo en venta
    return $obj_coche;
}

function insertaObjPago($idPago,$noContrato,$concepto,$tipo,$total,$noPago,$detalles,$StatusPago, $fechaParaHacerPago)
{
    include_once "../model/PAGO.php";
    $objPago = new PAGO();
    $objPago->setIdPago($idPago);
    $objPago->setNoContratoFk($noContrato);
    $objPago->setConcepto($concepto);
    $objPago->setTipo($tipo);
    $objPago->setTotal($total);
    $objPago->setFechaHoraCreacion($fechaParaHacerPago);
    $objPago->setNoPago($noPago);
    $objPago->setDetalles($detalles);
    $objPago->setEstatusPago($StatusPago);
    return $objPago->queryaddPago();
}

function insertaAbono($idPago,$monto,$notas){
    include_once "../model/ABONOS.php";
    $obj_Abono = new ABONOS();
    $obj_Abono-> setIdPagoFk($idPago);
    $obj_Abono->setMonto($monto);
    $obj_Abono->setFechaRegistro(date('Y-m-d H:i:s'));
    $obj_Abono->setNotas($notas);
    return $obj_Abono->addAbono();
}