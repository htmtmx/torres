<?php
if (isset($_POST['idCliente']) && isset($_POST['nombre'])
    && isset($_POST['apaterno']) && isset($_POST['amaterno'])
    && isset($_POST['telefono']) && isset($_POST['tipo_cliente'])){
    $params =[
        "noCliente" => $_POST['idCliente'],
        "nombreCliente"=>$_POST['nombre'],
        "apaternoCliente"=>$_POST['apaterno'],
        "amaternoCliente"=>$_POST['amaterno'],
        "telefonoCliente"=>$_POST['telefono'],
        "celularCliente"=>$_POST['celular'],
        "correoCliente"=>$_POST['correo'],
        "empresaCliente"=>$_POST['empresa'],
        "medioIdentificacion"=>$_POST['medio_identificación_cliente'],
        "folioCliente"=>$_POST['folio'],
        "tipoCliente"=>$_POST['tipo_cliente'],
        "rfcCliente"=>$_POST['rfc'],

    //Datos para DIRECCION
        "id_dir"=>$_POST['id_dir'],
        "calle"=>$_POST['calle'],
        "noInt"=>$_POST['noIntEmp'],
        "noExt"=>$_POST['noExtEmp'],
        "cp"=> $_POST['cpEmpr'],
        "colonia"=>$_POST['coloniaEmpr'],
        "municipio"=>$_POST['municipio'],
        "estado"=> $_POST['estadoEmp'],
        "referencias"=>$_POST['referencias']
    ];
    include_once "../control/controlCliente.php";
    if(updateCliente($params)){
        echo "Se ha actualizado el usuario con éxito";
    } else "Hubo un error";
} else echo "Falntan Datos";