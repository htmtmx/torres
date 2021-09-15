<?php

function consultaAllCochesOneFoto($noVehiculo,$filter)
{
    include_once "../model/COCHE.php";
    $objCoche = new COCHE();
    include_once "../control/controlFileVehiculo.php";
    $arrayCoches = $objCoche->queryconsultaCoches($noVehiculo,$filter);
    $dataCochesFoto = array();
    foreach ($arrayCoches as $coche) {
        $arrayFotos = consultaFotoCoche($coche["no_vehiculo"]);
        array_push($coche,$arrayFotos);
        array_push($dataCochesFoto, $coche);
    }
    //var_dump($dataCochesFoto);
    return json_encode($dataCochesFoto);
}

function consultaCocheDetallesDocumentosFotos($no_vehiculo)
{
    include_once "../model/COCHE.php";
    $objCoche = new COCHE();
    include_once "../control/controlFileVehiculo.php";
    $arrayCoche = $objCoche->queryconsultaCoches($no_vehiculo,99);
    $dataCoche = array();
    foreach ($arrayCoche as $coche) {
        $arrayDetails = consultaDetallesCoche($coche["no_vehiculo"]);
        $arrayDocumentos = $objCoche->queryConsultaDocumentosCoche($coche["no_vehiculo"]);
        $arrayFotos = consultaFotosCoche($coche["no_vehiculo"]);
        array_push($coche,$arrayDetails);
        array_push($coche,$arrayDocumentos);
        array_push($coche,$arrayFotos);
        array_push($dataCoche,$coche);
    }
    //var_dump($dataCoche);
    return json_encode($dataCoche);
}

function consultaCocheDetallesCompletos($show_detalles,$noVehiculo,$estatus){
    include_once "../model/COCHE.php";
    $objCoche = new COCHE();
    $arrayCoches = $objCoche->queryconsultaCoches($noVehiculo,$estatus);
    $cochesData = array();
    //obtengo la lista de coches en
    if ($show_detalles) {
        //recorrer el for
        foreach ($arrayCoches as $coche) {
            $arrayDetails = consultaDetallesCoche($coche["no_vehiculo"]);
            $arrayDocumentos =consultaArchivos($coche["no_vehiculo"]);
            array_push($coche, $arrayDetails);
            array_push($coche, $arrayDocumentos);
            array_push($cochesData,$coche);
        }
    }
    return json_encode($cochesData);
}

function consultaCocheVenta($noVehiculo,$estatus){
    include_once "../model/COCHE.php";
    $objCoche = new COCHE();
    $arrayCoches = $objCoche->queryconsultaCoches($noVehiculo,$estatus);
    //obtengo la lista de coches en
    return $arrayCoches;
}

function consultaDetallesCoche($noVehiculo)
{
    include_once "../model/COCHE.php";
    $objCoche = new COCHE();
    $objCoche->setNoVehiculo($noVehiculo);
    $result = $objCoche->getLsDetalles();
    return  $result;
}

function consultaArchivos($noVehiculo)
{
    include_once "../model/COCHE.php";
    $objCoche = new COCHE();
    $objCoche->setNoVehiculo($noVehiculo);
    $result = $objCoche->getLsArchivos($noVehiculo);
    return  $result;
}

function addCoche(  $idModeloFk,$anio,$placa,$entidadPlaca,$color,
                    $kilometros,$transmision,$combustible,$noPuertas)
{
    include_once "../model/COCHE.php";
    include_once "./tool_ids_generate.php";
    $objCoche = new COCHE();
    $objCoche->setNoVehiculo(gen_no_vehiculo());
    $objCoche->setIdModeloFk($idModeloFk);
    $objCoche->setFechaRegistro(date('Y-m-d H:i:s'));
    $objCoche->setAnio($anio);
    $objCoche->setPlaca($placa);
    $objCoche->setEntidadPlaca($entidadPlaca);
    $objCoche->setColor($color);
    $objCoche->setKilometros($kilometros);
    $objCoche->setTransimision($transmision);
    $objCoche->setCombustible($combustible);
    $objCoche->setNoPuertas($noPuertas);
    echo $result = $objCoche->queryaddCoche()?"Se registro correctamente el coche ".$objCoche->getNoVehiculo():"Error al intentar registrar";
}

function updateCoche($params)
{
    include_once "../model/COCHE.php";
    $objCoche = new COCHE();
    $objCoche->setNoVehiculo($params['no_vehiculo']);
    $objCoche->setIdModeloFk($params['modelo']);
    $objCoche->setTipoCarro($params['tipoCarro']);
    $objCoche->setAnio($params['anio']);
    $objCoche->setPlaca($params['placa']);
    $objCoche->setEntidadPlaca($params['entidadPlaca']);
    $objCoche->setColor($params['color']);
    $objCoche->setKilometros($params['kilometraje']);
    $objCoche->setTransimision($params['transmision']);
    $objCoche->setCombustible($params['combustible']);
    $objCoche->setNoPuertas($params['nopuertas']);
    $objCoche->setNiv($params['niv']);
    $objCoche->setNoMotor($params['noMotor']);
    $objCoche->setNumeroSerieVehicular($params['noSerieV']);
    $objCoche->setCarroceria($params['carroceria']);
    $objCoche->setPintura($params['pintura']);
    $objCoche->setLlantas($params['llantas']);
    $objCoche->setObservaciones($params['observaciones']);
    $objCoche->setNoFactura($params['noFactura']);
    $objCoche->setFechaFactura($params['fechaExpedicion']);
    $objCoche->setEmpresaFactura($params['empresaExpide']);
    $objCoche->setDomicilioEmpresa($params['dirFactura']);
    $objCoche->setTarjeton($params['tarjeton']);
    $objCoche->setFolioTarjeton($params['folioTarjeton']);
    $objCoche->setTarjetaCirculacion($params['tarjectaCirc']);
    $objCoche->setFolioTarjeCircul($params['folioTarjCirc']);
    $objCoche->setUltimaTenencia($params['ultimaTenencia']);
    $objCoche->setVerificacionesCoche($params['verificaciones']);
    $objCoche->setPrecioContado($params['precioLista']);
    $objCoche->setPrecioCredito($params['precioCredito']);
    $objCoche->setOpcCredito($params['opc_credito']);
    return $objCoche->queryupdateCoche();
}

function updateEstatusCoche($noVehiculo,$estatus)
{
    include_once "../model/COCHE.php";
    $objCoche = new COCHE();
    return $objCoche->queryupdateEstatusCoche($noVehiculo,$estatus);
}

function deleteCoche($noVehiculo)
{
    include_once "../model/COCHE.php";
    $objCoche = new COCHE();
    echo $result = $objCoche->querydeleteCoche($noVehiculo)?"Se elimino correctamente el coche":"Error al intentar eliminar";
}

function montoCoches()
{
    include_once "../model/COCHE.php";
    $objCoche = new COCHE();
    $result = $objCoche->queryMontoVehiculosVendidos();
    return json_encode($result);
}

function noCochesVendidos()
{
    include_once "../model/COCHE.php";
    $objCoche = new COCHE();
    $result = $objCoche->queryNoVehiculosVendidos();
    return json_encode($result);
}

function noCochesEnVenta()
{
    include_once "../model/COCHE.php";
    $objCoche = new COCHE();
    $result = $objCoche->queryNoCochesEnVenta();
    return json_encode($result);
}

function consultaIdCochexPlaca($placa){
    include_once  "../model/COCHE.php";
    $coche= new COCHE();
    $coche->setPlaca($placa);
    return json_encode($coche->queryConsultaIdCochexPalaca());
}