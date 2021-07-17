<?php
function consultaCoches($show_detalles,$noVehiculo)
{
    include_once "../../model/COCHE.php";
    $objCoche = new COCHE();
    $result = $objCoche->consultaCoches($noVehiculo);
    var_dump($result);
}

function consultaCocheDetallesCompletos($show_detalles,$noVehiculo)
{
    include_once "../../model/COCHE.php";
    $objCoche = new COCHE();
    $arrayCoches = $objCoche->consultaCoches($noVehiculo);
    //obtengo la lista de coches en
    if ($show_detalles) {
        //recorrer el for
        foreach ($arrayCoches as $coche) {
            //busco los detalles para cada coche y consulto en la bd
            echo "_______________________COCHE NUEVO________________________";
            $arrayDetails = consultaDetallesCoche($noVehiculo);
            var_dump($arrayDetails);
            //array_push($arrayCoches,"")
        }
        var_dump($arrayCoches);
    }
}

function consultaDetallesCoche($noVehiculo)
{
    include_once "../../model/COCHE.php";
    $objCoche = new COCHE();
    $result = $objCoche->consultaDetallesCoche($noVehiculo);
    var_dump($result);
}

function addCoche(  $noVehiculo,$idModeloFk,$anio,$placa,$entidadPlaca,$color,
                    $kilometros,$transmision,$combustible,$noPuertas,$precioContado,
                    $precioCredito,$opcCredito,$observaciones)
{
    include_once "../../model/COCHE.php";
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
    echo $result = $objCoche->addCoche()?"Se registro correctamente el coche ".$objCoche->getNoVehiculo():"Error al intentar registrar";
}

function updateCoche($noVehiculo,$idModeloFk,$anio,$placa,$entidadPlaca,$color,
                     $kilometros,$transmision,$combustible,$noPuertas,$precioContado,
                     $precioCredito,$opcCredito,$observaciones)
{
    include_once "../../model/COCHE.php";
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
    echo $result = $objCoche->updateCoche() ? "Se actualizo correctamente el coche ".$objCoche->getNoVehiculo():"Error al intentar actualizar";
}

function updateEstatusCoche($noVehiculo,$estatus)
{
    include_once "../../model/COCHE.php";
    $objCoche = new COCHE();
    echo $result = $objCoche->updateEstatusCoche($noVehiculo,$estatus)? "Se actualizo correctamente el estado del coche":"Error al intentar actualizar el estado del coche";
}

function deleteCoche($noVehiculo)
{
    include_once "../../model/COCHE.php";
    $objCoche = new COCHE();
    echo $result = $objCoche->deleteCoche(666)?"Se elimino correctamente el coche":"Error al intentar eliminar";
}
