<?php
if( isset($_POST['modelo']) && isset($_POST['anio'])
    && isset($_POST['placa']) && isset($_POST['entidad_placa'])
    && isset($_POST['color']) && isset($_POST['kilometros'])
    && isset($_POST['transmision']) && isset($_POST['combustible'])
    && isset($_POST['nopuertas'])){
    $modelo         = $_POST['modelo'];
    $anio           = $_POST['anio'];
    $placa          = $_POST['placa'];
    $entidad_placa  = $_POST['entidad_placa'];
    $color          = $_POST['color'];
    $kilometros     = $_POST['kilometros'];
    $transmision    = $_POST['transmision'];
    $combustible    = $_POST['combustible'];
    $nopuertas      = $_POST['nopuertas'];

    include_once "../control/controlCoche.php";
    return addCoche($modelo, $anio, $placa, $entidad_placa, $color,$kilometros,
    $transmision,$combustible,$nopuertas);
} else echo "Los datos estan incompletos";