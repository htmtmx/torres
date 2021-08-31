<?php
//include_once "../webhook/consulta-placa-id-coche.php";

//include_once "../webhook/addContratoVenta.php";
/*include_once "./controlContrato.php";
echo "<br>***************************************************************";
echo "<br>**            CONSULTA CONTRATO CON PAGOS Y ABONOS           **";
echo "<br>***************************************************************";
echo consultaContrato(3724786545073591);*/
/*echo "<br>***************************************************************";
echo "<br>**           CONSULTA TODOS LOS COCHES CON UNA FOTO          **";
echo "<br>***************************************************************";*/
/*include_once "../model/ABONOS.php";
consultaAbonos();*/
/*include_once "../control/controlCoche.php";
consultaAllCochesOneFoto();*/
/*echo "<br>***************************************************************";
echo "<br>** CONSULTA COCHE CON TODOS LOS DETALLES, DOCUMENTOS Y FOTOS **";
echo "<br>***************************************************************";
consultaCocheDetallesDocumentosFotos(1);*/
//include_once "../webhook/consulta-direccion.php";
//include_once "../webhook/remove-file-vehiculo.php";
/*
/**
 * Reigstro de Abonos
 *
include_once "../control/controlAbonos.php";
$no_contrato = 8452254501589255;
$monto= 17000;
verificaAbono($no_contrato,$monto);*/
/*include_once "../control/controlAbonos.php";
echo sumatoriaDeAbonos(20210817576779);*/
//include_once "../webhook/consulta-contratos-nocoche.php";
/*
include_once "../control/controlContrato.php";
$no_contrato = 3724786545073591;
consultaAvancePago($no_contrato);
*/
/*
include_once "../control/controlContrato.php";
consultaAvancePagoGeneralDeAllContratos();
*/
/*$no_contrato = 3724786545073591;
consultaAvanceDeCadaPagoDeContrato($no_contrato);*/
$no_contrato = 6389312005195666;

include_once "../control/controlAbonos.php";
//checaSiUpdateContrato($no_contrato);

include_once "../control/controlPago.php";
include_once "../control/controlContrato.php";
$arrayContrato = consultaContrato($no_contrato);
var_dump($arrayContrato);
$totalContrato = $arrayContrato[0]['total'];
//console.log($totalContrato);
$sumaPagos =montoPagosContrato($no_contrato);
$totalPagos = $sumaPagos[0]['total_pagos'];
var_dump($sumaPagos);
echo ($totalPagos);
echo($totalContrato);

if ($totalPagos==$totalContrato) {
    echo("<br>Actualizo el estado del contrato a terminado ***1***<br>");
    updateEstatusContrato($no_contrato,1);
}
//console.log($totalPagos);
