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
    $amaternoCliente=$_POST[''];
    $telefonoCliente=$_POST[''];
    $celularCliente=$_POST[''];
    $correoCliente=$_POST[''];
    $suscripcionCliente=$_POST[''];
    $empresaCliente=$_POST[''];
    $medioIdentificacion=$_POST[''];
    $folioCliente=$_POST[''];
    $tipoCliente=$_POST[''];
    $rfcCliente=$_POST[''];
    $statuscliente=$_POST[''];
    $accion=$_POST[''];
}