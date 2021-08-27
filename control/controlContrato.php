<?php
/********************************************************************
 *               C O N S U L T A    D E T A L L E S    C O N T R A T O
 *******************************************************************/
function consultaDetallesContrato($no_contrato)
{
    include_once "../model/CONTRATO.php";
    $objContrato = new CONTRATO();
    $objContrato->setNoContrato($no_contrato);
    $arrayContrato = $objContrato->consultaDetallesContrato();
    return json_encode($arrayContrato);
}
/********************************************************************
 *               C O N S U L T A    C O N T R A T O
 *******************************************************************/
function consultaContrato($no_contrato)
{
    include_once "../model/CONTRATO.php";
    $objContrato = new CONTRATO();
    $objContrato->setNoContrato($no_contrato);
    $arrayContrato = $objContrato->consultaContrato($objContrato->getNoContrato());
    return $arrayContrato;
}

function consultaAllContratos()
{
    include_once "../model/CONTRATO.php";
    $objContrato = new CONTRATO();
    $arrayContrato = $objContrato->consultaAllContratos();
    return $arrayContrato;
}
/********************************************************************
 *        C O N S U L T A   C O N T R A T O    P O R    N O   D E  V E H I C U L O
 *******************************************************************/
function consultaContratosCoche($no_vehiculo)
{
    include_once "../model/CONTRATO.php";
    $objContrato = new CONTRATO();
    $arrayContratos = $objContrato->queryconsultaContratosPorCoche($no_vehiculo);
    $contratos = array();
    foreach ($arrayContratos as $contrato){
        $detalleContrato = consultaPagosAbonosDeContratoCompleto($contrato['no_contrato']);
        $archivosContrato = consultaDocumentosContrato($contrato['no_contrato']);
        array_push($contrato,$detalleContrato);
        array_push($contrato,$archivosContrato);
        array_push($contratos,$contrato);
    }
    return json_encode($contratos);
}


function consultaDocumentosContrato($noContrato){
    include_once "controlArchivos.php";
    $archivocContrato = consultaArchivosContrato($noContrato);
    return $archivocContrato;
}

function consultaAvancePagoGeneralDeContrato($no_contrato)
{
    include_once "../control/controlPago.php";
    include_once "../control/controlAbonos.php";
    $arrayContrato = consultaContrato($no_contrato);
    $arrayPagos = consultaPagos($no_contrato);
    $totalAbonos = 0;
    foreach ($arrayPagos as $pago) {
        $arraySumaAbonos = sumatoriaDeAbonos($pago['id_pago']);
        $sumaDeAbonos = $arraySumaAbonos[0]['suma_abonos'];
        $totalAbonos = $totalAbonos+$sumaDeAbonos;
    }
    $totalContrato = $arrayContrato[0]['total'];
    $avance = ($totalAbonos*100)/$totalContrato;
    array_push($arrayContrato[0],$avance);
    //var_dump($arrayContrato);
    return $avance;
}

function consultaAvancePagoGeneralDeAllContratos()
{
    include_once "../control/controlPago.php";
    include_once "../control/controlAbonos.php";
    $arrayContratos = consultaAllContratos();
    $arrayFinalContrato = array();
    //echo"<br>***** A R R A Y     C O N T R A T O S *****<br>";
    //var_dump($arrayContratos);
    foreach ($arrayContratos as $contrato) {
        $cont = 0;
        $arrayPagos = consultaPagos($contrato['no_contrato']);
        foreach ($arrayPagos as $pago) {
            $fecha_pago = $pago['fecha_pago'];
            $status_pago = $pago['estatus_pago'];
            if ($fecha_pago<date('Y-m-d') && $status_pago==0) {
                $cont++;
            }
        }
        if ($cont>0) {
            $estado = 0;
            array_push($contrato,$estado);
        }else {
            $estado = 1;
            array_push($contrato, $estado);
        }
        $avance = consultaAvancePagoGeneralDeContrato($contrato['no_contrato']);
        array_push($contrato, $avance);
        array_push($arrayFinalContrato,$contrato);
    }
    /*echo"<br>***** A R R A Y     F I N A L     C O N T R A T O S *****<br>";
    var_dump($arrayPagos);*/
    //echo"<br>***** A R R A Y     F I N A L     C O N T R A T O S *****<br>";
    //var_dump($arrayFinalContrato);
    return json_encode($arrayFinalContrato);
}

function consultaAvanceDeCadaPagoDeContrato($no_contrato)
{
    include_once "../control/controlPago.php";
    include_once "../control/controlAbonos.php";
    $arrayPagos = consultaPagos($no_contrato);
    $arrayAvance = array();
    foreach ($arrayPagos as $pago) {
        $totalAbonos = 0;
        $arraySumaAbonos = sumatoriaDeAbonos($pago['id_pago']);
        $sumaDeAbonos = $arraySumaAbonos[0]['suma_abonos'];
        $totalAbonos = $totalAbonos+$sumaDeAbonos;

        $totalPago = $pago['total'];
        $avance = ($totalAbonos*100)/$totalPago;
        array_push($pago,$arraySumaAbonos);
        array_push($pago,$avance);
        array_push($arrayAvance,$pago);
    }
    var_dump($arrayAvance);
}

function consultaPagosAbonosDocsDeContratoCompleto($no_vehiculo)
{
    include_once "../control/controlPago.php";
    $arrayContrato = consultaContratosCoche($no_vehiculo);
    $arrayPagosContratoFinal = array();
    $arrayDocsContrato = array();
    $arrayPagosContrato = array();
    foreach ($arrayContrato as $contrato) {
        $listaPagos = consultaPagos($contrato['no_contrato']);
        $listaDocs = consultaDocsContrato($contrato['no_contrato']);
        foreach ($listaPagos as $pago) {
            $listaAbonos = consultaAbonosDePago($pago['id_pago']);
            array_push($pago, $listaAbonos);
            array_push($arrayPagosContrato,$pago);
        }
        array_push($contrato,$arrayPagosContrato);
        foreach ($listaDocs as $doc) {
            array_push($arrayDocsContrato,$doc);
        }
        array_push($contrato,$arrayDocsContrato);
        foreach ($arrayPagosContrato as $clave=>$valor) {
            $newArray = array();
            $arrayPagosContrato = $newArray;
            $arrayDocsContrato = $newArray;
            //unset($arrayPagosContrato[$clave]);
        }
        array_push($arrayPagosContratoFinal,$contrato);
    }
    return json_encode($arrayPagosContratoFinal);
}

function consultaPagosAbonosDeContratoCompleto($no_contrato)
{
    include_once "../control/controlPago.php";
    $listaPagos = consultaPagos($no_contrato);
    $arrayPagosContrato = array();
    foreach ($listaPagos as $pago) {
        $listaAbonos = consultaAbonosDePago($pago['id_pago']);
        array_push($pago, $listaAbonos);
        array_push($arrayPagosContrato,$pago);
    }
    return $arrayPagosContrato;
}
/********************************************************************
 * C O N S U L T A   P A G O S    A B O N O S  C O N T R A T O
 *******************************************************************/
function consultaPagosAbonosDeContrato($no_contrato)
{
    include_once "../control/controlPago.php";
    $listaPagos = consultaPagos($no_contrato);
    $arrayPagosContrato = array();
    foreach ($listaPagos as $pago) {
        $listaAbonos = consultaAbonosDePago($pago['id_pago']);
        array_push($pago, $listaAbonos);
        array_push($arrayPagosContrato,$pago);
    }
    //var_dump($arrayPagosContrato);
    return json_encode($arrayPagosContrato);
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

        $resultContrato = $CONTRATO->queryaddContrato();

        if($resultContrato){
            include_once "controlPago.php";
            $noDePago = 1;
            $concepto="Pago de Adquisición de Vehiculo";
            $tipo="CARGO";
            $fechaLimiTePago = date('Y-m-d H:i:s');
            $StatusPago = 1; //Liquidado de forma automatica
            $detalles = "Se compró un vehiculo con placa ".$COCHE->getPlaca()." año ".$COCHE->getAnio();
            $saldo = 0;
            //Funcion para Insertar y crear un objeto PAGO
            include_once "tool_ids_generate.php";
            $idPago = gen_noPago();
            $resultPago = insertaObjPago($idPago,$CONTRATO->getNoContrato(),$concepto,$tipo,$CONTRATO->getTotal(),$noDePago,$detalles,$StatusPago,$saldo,$fechaLimiTePago);
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
        //Variables ´poara copnstruir obj Contrato
        /*$formaPago,$noCliente,$noVehiculo, ,
                              $plazo,$fechaPrimerPago, $totalCoche, $enganche, $estatusContrato*/
        $formaPago = $params['forma_pago'];
        $noVehiculo= $params['no_vehiculo'];
        $tipoContrato = 0; // Es una venta
        $plazo = $params['plazo'];
        $enganche = $params['enganche'];
        $totalCoche=$params['total'];
        //Definir si es contado (contado, apartado), credito
        //Los plazos son los meses.
        $forma_pago = "";
        $estatusContrato="";
        if ($plazo == 0 && $enganche==$totalCoche){
            //Presiono el boiton apartar y se despliega un modal de ¿Con cuanto
            //deseas apartarlo?
            // esto es un apartado Apartado con $10,000 y el total es de $100,000
            $forma_pago = 0;
            $estatusContrato = 1;
            $fechaPrimerPago = date('Y-m-d');
        }else if($plazo==0 && $enganche<$totalCoche){
            //Este es un  pago de contado
            //Enganche de 100,000 y el carro cuesta $100,000
            $forma_pago = -1;
            $estatusContrato = 0;
            $fechaPrimerPago = date('Y-m-d');
            //Si estatus de contrato es 0 y la forma de pago es cfontado significa que es APARTADO
        }else{
            //Es un pago a credito
            //Meses: 3,6,9,12
            $fechaPrimerPago = $params['fecha_primer_pago'];
            $forma_pago = 1;
            $estatusContrato = 0;
        }

        $CONTRATO = constructObjContrato($forma_pago,$COMPRADOR->getNoCliente(),$noVehiculo,
        $tipoContrato,$plazo,$fechaPrimerPago, $totalCoche, $enganche,$estatusContrato);

        $resultContrato = $CONTRATO->queryaddContrato();
        if ($resultContrato) {

            include_once "controlPago.php";
            //$noContrato,$concepto,$tipo,$total,$noPago,$detalles,$StatusPago
            //¿Cuantos pagos voy a hacer?
            //Contado 1 pago  CREDITO n pagos

            // en cualquiera de los dos casos voy a crear el pago 0
            $noDePago = 0;
            $concepto="";
            $detalles = "";
            $tipo="ABONO"; //DINERO QUE ENTRA A LA EMPRESA

            if ($plazo == 0 && $enganche==$totalCoche){
                $concepto="PAGO COMPLETO";
                $noDePago = 1;
                $detalles = "PAGO 1/1";
                $fechaLimiTePago = date('Y-m-d H:i:s');
                $StatusPago = 1; //Liquidado de forma automatica
                $saldo1=0;  //Saldo
            }else if($plazo==0 && $enganche<$totalCoche){
                $concepto="PAGO POR APARTADO";
                $noDePago = 1;
                $detalles = "PAGO 1/1";

                $fecha = date('Y-m-d');
                $nuevafecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
                $fechaLimiTePago = date ( 'Y-m-d' , $nuevafecha );
                $saldo1=$totalCoche-$enganche;
                $StatusPago = 0; //Pendiente por liquidar
            }else{
                $concepto="PAGO DE ENGANCHE";
                $noDePago = 0; //EL el pago 0, despues vienen los plazos
                $detalles = "PAGO 0/".$plazo;
                $fechaLimiTePago = date('Y-m-d');
                $StatusPago = 1; //Liquidado de forma automatica
                $saldo1=0;
            }

            include_once  "controlCoche.php";
            updateEstatusCoche($params['no_vehiculo'],($plazo == 0 && $enganche==$totalCoche)||($plazo > 0) ? 1:0);

            //Funcion para Insertar y crear un objeto PAGO

            include_once "tool_ids_generate.php";
            $idPago = gen_noPago();
            $resultPago = insertaObjPago($idPago,$CONTRATO->getNoContrato(),$concepto,$tipo,
                $CONTRATO->getEnganche(),$noDePago,$detalles,$StatusPago,$saldo1,$fechaLimiTePago);
            //SI YA SE CREO EL PAGO CREO EL ABONO

            if ($resultPago){
                //Crerar el OBJ de abono
                $resutlAbono = insertaAbono($idPago,$enganche,$concepto);
                $fechaLimiTePago= $params['fecha_primer_pago'];

                //Crear los demas pagos para credito *
                if ($plazo>0){
                    //voy a crear n cantidad de pagos para el caso del credito
                    for ($i = 0; $i<$plazo;$i++){
                        $concepto="PAGO MENSUAL  ".($i+1)." de ". $plazo;
                        $detalles = "PAGO ".($i+1)."/".$plazo;
                        $StatusPago = 0;
                        $MontoACubrir = ($CONTRATO->getTotal()-$enganche)/$plazo;
                        $saldo=$MontoACubrir;
                        $idPago = gen_noPago();
                        insertaObjPago($idPago,$CONTRATO->getNoContrato(),$concepto,$tipo,
                            $MontoACubrir,($i+1),$detalles,$StatusPago,$saldo,$fechaLimiTePago);

                        $nuevafecha = strtotime ( '+1 month' , strtotime ( $fechaLimiTePago ) ) ;
                        $fechaLimiTePago = date ( 'Y-m-d' , $nuevafecha );

                    }
                }
                return $resutlAbono;
            }

            return $resultPago;
        }else return  false;
    }else return  false;
}
//FUNCION PARA CONSTRUIR UN OBJETO CLIENTE

function construcObjtCliente($params){
    include_once "../model/CLIENTES.php";
    include_once  "tool_ids_generate.php";
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
    $obj_user->setRfc($params['rfc']);
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
    include_once  "tool_ids_generate.php";
    $obj_cont = new CONTRATO();
    $claveContrato=gen_no_contrato();
    $obj_cont->setNoContrato($claveContrato);
    //Cuando se implemente el JS se cambiara el id empleado por el $_SESSION[no_empleado]
    $idEmpleado=$_SESSION["no_empleado"];
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
    include_once  "tool_ids_generate.php";
    $obj_coche = new COCHE();
    $no_vehiculo = gen_no_vehiculo();
    $obj_coche -> setNoVehiculo($no_vehiculo);
    $obj_coche->setIdModeloFk($params['id_modelo_fk']);
    $obj_coche->setNiv($params['nivCoche']);
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

function insertaObjPago($idPago,$noContrato,$concepto,$tipo,$total,$noPago,$detalles,$StatusPago,$saldo, $fechaParaHacerPago)
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
    $objPago->setSaldo($saldo);
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
    return $obj_Abono->queryaddAbono();
}


function revisaContratoVenta($params){
    include_once "controlCoche.php";
    $coches = consultaCocheVenta($params['no_vehiculo'],0);
    if($coches!=null){
        try {
            $coche= $coches[0];
            if(isset($coche)|| isset($coches)){
                if($params['forma_pago']==1){
                    $total= $coche['precio_credito'];
                    $plazo=$params['plazo'];
                } else {
                    $total = $coche['precio_contado'];
                    $plazo=1;
                }
                $params['plazo']= $plazo;
                $params['total']=$total;
                return creaContratoVenta($params);
            }else return false;
        }
        catch (Exception $e){
            return false;
        }
    } else return false;


}