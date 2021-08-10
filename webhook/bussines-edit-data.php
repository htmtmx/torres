<?php   
    $seccion = $_POST['seccion'];
    $query = "";
    if ($seccion == '1') {
        $rfc = $_POST['rfc'];
        $nombre = $_POST['nombre'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $web = $_POST['web'];

        $query = "UPDATE `empresa` SET 
        `rfc` = '$rfc',
        `nombre` = '$nombre', 
        `telefono` = '$tel', 
        `correo` = '$email', 
        `sitio_web` = '$web'";
    }
    else{
        $calle = $_POST['calle'];
        $no_ext = $_POST['no_ext'];
        $no_int = $_POST['no_int'];
        $colonia = $_POST['colonia'];
        $cp = $_POST['cp'];
        $de_mun = $_POST['de_mun'];
        $estado = $_POST['estado'];

        $query = "UPDATE `empresa` SET 
        `calle` = '$calle', 
        `no_ext` = '$no_ext', 
        `no_int` = '$no_int', 
        `colonia` = '$colonia', 
        `cp` = '$cp', 
        `de_mun` = '$de_mun', 
        `estado` = '$estado' ";
    }
    include('ejecute-query.php');
    echo "Cambios efectuados correctamente";
?>