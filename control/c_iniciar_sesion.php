<?php
    sleep(1);

    $no_empleado = $_POST['no_empleado'];
    $rfc_fk = $_POST['rfc_fk'];
    $nombre_user = $_POST['nombre'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];
    $puesto = $_POST['puesto'];
    $nivel_acceso = $_POST['nivel_acceso'];
    $correo_user = $_POST['correo_user'];
    $pw = $_POST['pw'];
    
    session_start();
    $_SESSION['no_empleado'] = $no_empleado;
    $_SESSION['usuario'] = $nombre_user;
    $_SESSION['rfc'] = $rfc_fk;
    $_SESSION['apaterno'] = $apaterno;
    $_SESSION['amaterno'] = $amaterno;
    $_SESSION['puesto'] = $puesto;
    $_SESSION['nivel_acceso'] = $nivel_acceso;
    $_SESSION['correo_user'] = $correo_user;
    $_SESSION['pw'] = $pw;
?>
