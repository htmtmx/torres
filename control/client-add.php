<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    date_default_timezone_set("America/Mexico_City");
    include('tool_ids_generate.php');

    $accion = $_POST['accion'];

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
    $estatus_cliente        = $_POST['estatus_cliente'];

    $query= "";
    $mje = "";
    if ($accion!="0") {
        # es insert
        $permitted_chars = '0123456789';
        $id = gen_user_id(12);
        $fecha = date('Y-m-d H:i:s');

        $query = "INSERT INTO `cliente` (`no_cliente`, `nombre`, `apaterno`, `amaterno`, `telefono`, `celular`, `correo`, `subscripcion`, 
        `empresa`, `rfc`, `fecha_registro`, `medio_identificación`, `folio`, `tipo_cliente`, `estatus`, `system_state`) VALUES 
        ('$id', '$nombre_cliente', '$apaterno_cliente', '$amaterno_cliente', '$telefono_cliente', '$celular_cliente', '$correo_cliente', 
        '$subscripcion_cliente', '$empresa_cliente', '$rfc_cliente', '$fecha', '$medio_identificación_cliente', '$folio_cliente', '$tipo_cliente', '$estatus_cliente','1')";
        $mje = "Gracias, se ha registrado a '.$nombre_cliente.' - '.$nombre_cliente.'. <br>Puede agregarle";
    }
    else{

        $id = $_POST['id'];
        $query = "UPDATE `cliente` SET 
            `nombre` = '$nombre_cliente', 
            `apaterno` = '$apaterno_cliente',
            `amaterno` = '$amaterno_cliente',
            `telefono` = '$telefono_cliente',
            `celular` = '$celular_cliente',
            `correo` = '$correo_cliente',
            `subscripcion` = '$subscripcion_cliente',
            `empresa` = '$empresa_cliente',
            `rfc` = '$rfc_cliente',
            `medio_identificación` = '$medio_identificación_cliente',
            `folio` = '$folio_cliente',
            `tipo_cliente` = '$tipo_cliente', 
            `estatus` = '$estatus_cliente' 
            WHERE `cliente`.`no_cliente` = $id  ";
        $mje = "Se ha actualizado correctamente al usuario";
    }

    include('ejecute-query.php');
    echo $mje;
    //codigo para enviar el email...
?>