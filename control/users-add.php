<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    date_default_timezone_set("America/Mexico_City");
    include('tool_ids_generate.php');

    $accion = $_POST['accion'];
    //Varibales generales
    $nombre_user =  $_POST['nombre_user'];
    $apaterno_user=  $_POST['apaterno_user'];
    $amaterno_user=  $_POST['amaterno_user'];
    $telefono_user=  $_POST['telefono_user'];
    $celular_user=  $_POST['celular_user'];
    $correo_user=  $_POST['correo_user'];
    $puesto_user=  $_POST['puesto_user'];
    $sexo_user=  $_POST['sexo_user'];
    $acceso_user =  $_POST['acceso_user'];
    $estatus_user = $_POST['estatus_user'];

    $query= "";
    $mje = "";
    if ($accion!="0") {
        # es insert
        $permitted_chars = '0123456789';
        $id = gen_user_id(8);
        $rfc_fk = $_SESSION['rfc'];
        $fecha = date('Y-m-d H:i:s');
        $pw = md5('0000');

        $query = "INSERT INTO `empleado` (`no_empleado`, `rfc_fk`, `nombre`, `apaterno`, `amaterno`, `telefono`, `celular`, `sexo`, 
        `fecha_registro`, `correo_user`, `pw`, `puesto`, `nivel_acceso`, `estatus`) 
        VALUES ('$id', '$rfc_fk', '$nombre_user', '$apaterno_user', '$amaterno_user', '$telefono_user', '$celular_user', '$sexo_user', 
        '$fecha', '$correo_user', '$pw', '$puesto_user', '$acceso_user', '$estatus_user')";
        $mje = "Gracias, se ha registrado a '.$nombre_user.' - '.$apaterno_user.'. <br>Recuerde que la contraseña por default es 0000";
    }
    else{

        $id = $_POST['id'];
        #es update
        $query = "UPDATE `empleado` SET 
            `nombre` = '$nombre_user', 
            `apaterno` = '$apaterno_user', 
            `amaterno` = '$amaterno_user', 
            `telefono` = '$telefono_user', 
            `celular` = '$celular_user', 
            `sexo` = '$sexo_user', 
            `correo_user` = '$puesto_user', 
            `puesto` = '$puesto_user', 
            `nivel_acceso` = '$acceso_user', 
            `estatus` = '$estatus_user' 
            WHERE `empleado`.`no_empleado` = $id  ";
        $mje = "Se ha actualizado correctamente al usuario";
    }

    include('ejecute-query.php');
    echo $mje;
    //codigo para enviar el email...
?>