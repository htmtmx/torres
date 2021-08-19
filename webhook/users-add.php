<?php
    header('Content-Type: text/html; charset=UTF-8');
    date_default_timezone_set("America/Mexico_City");
    if (isset($_POST['nombre_user'])&& isset($_POST['apaterno_user'])
        && isset($_POST['amaterno_user'])&& isset($_POST['telefono_user'])
        && isset($_POST['celular_user'])&& isset($_POST['correo_user'])
        && isset($_POST['puesto_user'])&& isset($_POST['sexo_user'])
        && isset($_POST['acceso_user'])) {

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

        include_once "../control/controlEmpleado.php";
        if (addEmpleado($nombre_user,$apaterno_user,$amaterno_user,$telefono_user,$celular_user,
            $correo_user,$puesto_user,$sexo_user,$acceso_user)){
            echo "Se ha guardado con exito";
        } else echo "Ha falaldo";

    }