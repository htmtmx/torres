<?php
if (isset($_POST['id'])&& isset(_POST['nombre_cliente'])
    && isset(_POST['apaterno_cliente']) && isset($_POST['amaterno_cliente'])
    && isset($_POST['telefono_cliente'])&& isset($_POST['celular_cliente'])
    && isset($_POST['correo_cliente']) && isset($_POST['subscripcion_cliente'])
    && isset($_POST['empresa_cliente'])&& isset($_POST['medio_identificación_cliente'])
    && isset($_POST['folio_cliente']) && isset($_POST['tipo_cliente'])
    && isset($_POST['rfc_cliente']) && isset($_POST['estatus_cliente'])
    && isset($_POST['accion'])) {
    $noCliente = $_POST['id'];
    $nombreCliente=$_POST['nombre_cliente'];
    $apaternoCliente=$_POST['apaterno_cliente'];
    $amaternoCliente=$_POST['amaterno_cliente'];
    $telefonoCliente=$_POST['telefono_cliente'];
    $celularCliente=$_POST['celular_cliente'];
    $correoCliente=$_POST['correo_cliente'];
    $suscripcionCliente=$_POST['subscripcion_cliente'];
    $empresaCliente=$_POST['empresa_cliente'];
    $medioIdentificacion=$_POST['medio_identificación_cliente'];
    $folioCliente=$_POST['folio_cliente'];
    $tipoCliente=$_POST['tipo_cliente'];
    $rfcCliente=$_POST['rfc_cliente'];
    $statuscliente=$_POST['estatus_cliente'];
    $accion=$_POST['accion'];
    include_once "./ctrl/controlCliente.php";
    updateCliente($noCliente,$nombreCliente,$apaternoCliente,$amaternoCliente,
        $telefonoCliente,$celularCliente,$correoCliente,$suscripcionCliente,
        $empresaCliente,$medioIdentificacion,$folioCliente,$tipoCliente,$rfcCliente,
        $statuscliente);
}