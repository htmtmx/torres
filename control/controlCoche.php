<?php
function consultaCoches($show_detalles,$noVehiculo)
{
    include_once "../model/COCHE.php";
    $objCoche = new COCHE();
    $result = $objCoche->queryconsultaCoches($noVehiculo);
    var_dump($result);
}

function consultaCocheDetallesCompletos($show_detalles,$noVehiculo){
    include_once "../model/COCHE.php";
    $objCoche = new COCHE();
    $arrayCoches = $objCoche->queryconsultaCoches($noVehiculo);
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

function updateCoche($noVehiculo,$idModeloFk,$anio,$placa,$entidadPlaca,$color,
                     $kilometros,$transmision,$combustible,$noPuertas,$precioContado,
                     $precioCredito,$opcCredito,$observaciones)
{
    include_once "../model/COCHE.php";
    $objCoche = new COCHE();
    $objCoche->setNoVehiculo($noVehiculo);
    $objCoche->setIdModeloFk($idModeloFk);
    $objCoche->setAnio($anio);
    $objCoche->setPlaca($placa);
    $objCoche->setEntidadPlaca($entidadPlaca);
    $objCoche->setColor($color);
    $objCoche->setKilometros($kilometros);
    $objCoche->setTransimision($transmision);
    $objCoche->setCombustible($combustible);
    $objCoche->setNoPuertas($noPuertas);
    $objCoche->setPrecioContado($precioContado);
    $objCoche->setPrecioCredito($precioCredito);
    $objCoche->setOpcCredito($opcCredito);
    $objCoche->setObservaciones($observaciones);
    echo $result = $objCoche->queryupdateCoche() ? "Se actualizo correctamente el coche ".$objCoche->getNoVehiculo():"Error al intentar actualizar";
}

function updateEstatusCoche($noVehiculo,$estatus)
{
    include_once "../model/COCHE.php";
    $objCoche = new COCHE();
    echo $result = $objCoche->queryupdateEstatusCoche($noVehiculo,$estatus)? "Se actualizo correctamente el estado del coche":"Error al intentar actualizar el estado del coche";
}

function deleteCoche($noVehiculo)
{
    include_once "../model/COCHE.php";
    $objCoche = new COCHE();
    echo $result = $objCoche->querydeleteCoche($noVehiculo)?"Se elimino correctamente el coche":"Error al intentar eliminar";
}
