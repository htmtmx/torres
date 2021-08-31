<?php
/**********************************************************
 * Registro de Abonos
 * ********************************************************/
function verificaAbono($no_contrato,$monto)
{
    $montoAbono = $monto;
    include_once "../control/controlPago.php";
    $arrayPagos = consultaPagos($no_contrato);
    foreach ($arrayPagos as $pago) {
        $arraySumaAbonos = sumatoriaDeAbonos($pago['id_pago']);
            if ($pago['estatus_pago']== 0) {
                $totalPago = $pago['total'];
                $sumaAbonos= $arraySumaAbonos[0]['suma_abonos'];
                $faltantePorAbonar = $totalPago - $sumaAbonos;
                if ($montoAbono>$faltantePorAbonar) {
                    addAbono($pago['id_pago'],$faltantePorAbonar,"Abono al ".$pago['detalles']);
                    updateEstatusPago($pago['id_pago'],1);
                    updateSaldoDePago($pago['id_pago'],0);
                    $montoRestanteParaAbonar = $montoAbono-$faltantePorAbonar;
                    $montoAbono= $montoRestanteParaAbonar;
                }else if ($montoAbono<=$faltantePorAbonar && $montoAbono>0) {
                    addAbono($pago['id_pago'],$montoAbono,"Abono al ".$pago['detalles']);
                    $saldo = $faltantePorAbonar - $montoAbono;
                    updateSaldoDePago($pago['id_pago'],$saldo);
                    $finalAbono = $montoAbono;
                    $montoAbono =0;
                    if ($faltantePorAbonar==$finalAbono) {
                        updateEstatusPago($pago['id_pago'],1);
                        updateSaldoDePago($pago['id_pago'],0);
                        $montoAbono =0;
                    }
                }
                /*echo "<br>S U M A      D E      A B O N O S";
                echo "Total del pago ".$totalPago.", Suma de abonos ".$sumaAbonos.", Resta por pagar ".$faltantePorAbonar. " Al pago ".$pago['id_pago'];
                echo "<br>S U M A      D E      A B O N O S";*/
            }
        checaSiUpdateContrato($no_contrato);

    }
    return true;
}

function checaSiUpdateContrato($no_contrato){
    include_once "../control/controlContrato.php";
    $arrayContrato = consultaContrato($no_contrato);
    $totalContrato = $arrayContrato[0]['total'];
    $sumaPagos =montoPagosContrato($no_contrato);
    $totalPagos = $sumaPagos[0]['total_pagos'];
    //$sumaAbonosComparaTotalContrato = $arraySumaAbonos[0]['suma_abonos'];
    $saldo = $totalContrato - $totalPagos;
    updateSaldoContrato($no_contrato,$saldo);
    if ($totalContrato==$totalPagos) {
        updateEstatusContrato($no_contrato,1);
        updateSaldoContrato($no_contrato,0);
    }
}

function sumatoriaDeAbonos($id_pago)
{
    include_once "../model/ABONOS.php";
    $objAbono = new ABONOS();
    $result = $objAbono->querySumaAbonosPago($id_pago);
    return $result;
}

function addAbono($id_pago,$monto,$notas)
{
    include_once "../model/ABONOS.php";
    $objAbono = new ABONOS();
    $objAbono->setIdPagoFk($id_pago);
    $objAbono->setMonto($monto);
    $objAbono->setFechaRegistro(date('Y-m-d H:i:s'));
    $objAbono->setNotas($notas);
    echo $objAbono->queryaddAbono() ? "Se registro correctamente el abono": "Error";
}

function sumaAbonosHoy()
{
    include_once "../model/ABONOS.php";
    $objAbono = new ABONOS();
    $result = $objAbono->querySumaAbonosHoy();
    return json_encode($result);
}