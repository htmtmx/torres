<?php

function verificaCuentaUser($correo,$pw){
    include_once "../model/EMPLEADO.php";
    $obj_empleado = new EMPLEADO();
    $obj_empleado->setCorreoUser($correo);
    $obj_empleado->setPw(md5($pw));

    $obj_user = $obj_empleado->verificaCountUser();
    if(count($obj_user) > 0 ){
        //creamos la sesion
        session_start();
        $_SESSION['no_empleado']    = $obj_user[0]['no_empleado'];
        $_SESSION['usuario']        = $obj_user[0]['nombre'];
        $_SESSION['apaterno']       = $obj_user[0]['apaterno'];
        $_SESSION['amaterno']       = $obj_user[0]['amaterno'];
        $_SESSION['puesto']         = $obj_user[0]['puesto'];
        $_SESSION['nivel_acceso']   = $obj_user[0]['nivel_acceso'];
        $_SESSION['correo_user']    = $obj_user[0]['correo_user'];
        return true;
    }
    return false;
}

