<?php
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

/**
 * Reigstro de Abonos
 * */
include_once "../control/controlContrato.php";
$no_contrato = 3724786545073591;
$monto = 35000;
echo consultaPagosAbonosDeContratoCompleto($no_contrato);

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
$no_contrato = 3724786545073591;
*/

/*$no_contrato = 3724786545073591;
consultaAvanceDeCadaPagoDeContrato($no_contrato);*/