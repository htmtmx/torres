<?php
if (isset($_POST['idCliente']) && isset($_POST['nombre'])
    && isset($_POST['apaterno']) && isset($_POST['amaterno'])
    && isset($_POST['telefono']) && isset($_POST['tipo_cliente'])){
    $noCliente = $_POST['idCliente'];
    $nombreCliente=$_POST['nombre'];
    $apaternoCliente=$_POST['apaterno'];
    $amaternoCliente=$_POST['amaterno'];
    $telefonoCliente=$_POST['telefono'];
    $celularCliente=$_POST['celular'];
    $correoCliente=$_POST['correo'];
    $empresaCliente=$_POST['empresa'];
    $medioIdentificacion=$_POST['medio_identificación_cliente'];
    $folioCliente=$_POST['folio'];
    $tipoCliente=$_POST['tipo_cliente'];
    $rfcCliente=$_POST['rfc'];
    include_once "../control/controlCliente.php";
    if(updateCliente($noCliente,$nombreCliente,$apaternoCliente,$amaternoCliente,
        $telefonoCliente,$celularCliente,$correoCliente,
        $empresaCliente,$medioIdentificacion,$folioCliente,$tipoCliente,$rfcCliente,
        )){
        echo "Se ha actualizado el usuario con éxito";
    } else "Hubo un error";
} else echo "Falntan Datos";