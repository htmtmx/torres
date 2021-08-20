<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("America/Mexico_City");
if (isset($_POST['nombre_cliente']) && isset($_POST['apaterno_cliente'])
    && isset($_POST['amaterno_cliente']) && isset($_POST['telefono_cliente'])
    ) {
    $nombre_cliente         =  $_POST['nombre_cliente'];
    $apaterno_cliente       =  $_POST['apaterno_cliente'];
    $amaterno_cliente       =  $_POST['amaterno_cliente'];
    $telefono_cliente       =  $_POST['telefono_cliente'];
    $celular_cliente        =  $_POST['celular_cliente'];
    $correo_cliente         =  $_POST['correo_cliente'];
    $subscripcion_cliente   =  $_POST['subscripcion_cliente'];
    $empresa_cliente        =  $_POST['empresa_cliente'];
    $medio_identificación_cliente   =  $_POST['medio_identificación_cliente'];
    $folio_cliente          =  $_POST['folio_cliente'];
    $tipo_cliente           =  $_POST['tipo_cliente'];
    $rfc_cliente            =  $_POST['rfc_cliente'];

    include_once "../control/controlCliente.php";
    if(queryCliente($nombre_cliente,$apaterno_cliente,$amaterno_cliente,
        $telefono_cliente,$celular_cliente,$correo_cliente,$subscripcion_cliente,
        $empresa_cliente,$medio_identificación_cliente,$folio_cliente,
        $tipo_cliente,$rfc_cliente)){
        echo "Se ha agregado con exito";
    } else echo "No se ha podido agregar el cliente";

} else echo "Los datos estan incompletos";
