<?php
if (isset($_POST['folio_cliente'])&& isset(_POST['nombre_cliente'])
    && isset(_POST['apaterno_cliente']) && isset($_POST['amaterno_cliente'])
    && isset($_POST['telefono_cliente'])&& isset($_POST['celular_cliente'])
    && isset($_POST['correo_cliente']) && isset($_POST['subscripcion_cliente'])
    && isset($_POST['empresa_cliente'])&& isset($_POST['medio_identificación_cliente'])
    && isset($_POST['tipo_cliente']) && isset($_POST['rfc_cliente'])
    && isset($_POST['estatus_cliente']) && isset($_POST['accion'])) {
    $no_cliente = $_POST['folio_cliente'];

}