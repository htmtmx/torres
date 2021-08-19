<?php
if (isset($_POST['nombre'])&& isset($_POST['apaterno'])
    && isset($_POST['amaterno'])&& isset($_POST['telefono'])
    && isset($_POST['celular'])&& isset($_POST['correo'])
    && isset($_POST['sexo'])) {

    //Varibales generales
    $nombre_user =  $_POST['nombre'];
    $apaterno_user=  $_POST['apaterno'];
    $amaterno_user=  $_POST['amaterno'];
    $telefono_user=  $_POST['telefono'];
    $celular_user=  $_POST['celular'];
    $correo_user=  $_POST['correo'];
    $sexo_user=  $_POST['sexo'];

    include_once "../control/controlEmpleado.php";
    if (updateEmpleado($nombre_user,$apaterno_user,$amaterno_user,$telefono_user,$celular_user,
        $correo_user,$sexo_user)){
        echo "Se ha actualizado con exito";
    } else echo "Ha falaldo";

}