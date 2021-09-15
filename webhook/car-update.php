<?php
if (isset($_POST['idCoche']) && isset($_POST['niv'])
    && isset($_POST['anio']) && isset($_POST['placa'])
    && isset($_POST['color']) && isset($_POST['kilometraje'])
    && isset($_POST['nopuertas']) && isset($_POST['precioLista']) && isset($_POST['precioCredito'])) {
    $params = [
        "no_vehiculo"   =>  $_POST['idCoche'],
        "modelo"        =>  $_POST['modelo'],
        "tipoCarro"    =>  $_POST['tipoVehiculo'],
        "anio"          =>  $_POST['anio'],
        "placa"         =>  $_POST['placa'],
        "entidadPlaca"  => $_POST['estado'],
        "color"         =>  $_POST['color'],
        "kilometraje"   =>  $_POST['kilometraje'],
        "transmision"   =>  $_POST['transmision'],
        "combustible"   =>  $_POST['combustible'],
        "nopuertas"     =>  $_POST['nopuertas'],
        "niv"           =>  $_POST['niv'],
        "noMotor"       =>  $_POST['noMotor'],
        "noSerieV"      =>  $_POST['noSerieV'],
        "carroceria"    =>  $_POST['carroceria'],
        "pintura"       =>  $_POST['pintura'],
        "llantas"       =>  $_POST['llantas'],
        "observaciones" =>  $_POST['observaciones'],
        "noFactura"     =>  $_POST['noFactura'],
        "fechaExpedicion"    =>  $_POST['fecha_expedicion'],
        "empresaExpide" =>  $_POST['empresaExpide'],
        "dirFactura"    =>  $_POST['dirFactura'],
        "tarjeton"    =>  $_POST['tarjeton'],
        "folioTarjeton"    =>  $_POST['folioTarjeton'],
        "tarjectaCirc"    =>  $_POST['tarjectaCirc'],
        "folioTarjCirc"    =>  $_POST['folioTarjCirc'],
        "ultimaTenencia"    =>  $_POST['ultimaTenencia'],
        "verificaciones"    =>  $_POST['verificaciones'],
        "precioLista"   =>  $_POST['precioLista'],
        "precioCredito" =>  $_POST['precioCredito'],
        "opc_credito"   => "",
    ];


    if (isset($_POST['ckeckCredito'])){
        $params['opc_credito'] = 1;
    }else{
        $params['opc_credito'] = 0;
    }
    include_once "../control/controlCoche.php";
    if(updateCoche($params)){
        echo "¡Se han actualizado los datos del vehiculo con exito!";
    } else echo "No se ha podido actualizar el vehiculo";

} else echo "Los datos estan incompletos";