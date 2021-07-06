<?php
    include('./db.php');
    $id = $_POST['id'];
    $concat = "";
    if ($id!='0') {
            $concat = " AND `cliente`.`no_cliente` = '$id' ";
    }
    $sql = "SELECT 
            `no_cliente`,
            `nombre`,
            `apaterno`,
            `amaterno`,
            `telefono`,
            `celular`,
            `correo`,
            `subscripcion`,
            `empresa`,
            `rfc`,
            `fecha_registro`,
            `medio_identificación`,
            `folio`,
            `tipo_cliente`,
            `estatus`
            FROM `cliente` WHERE system_state = 1 $concat";

    mysqli_set_charset($conn,"utf8");
    $result = mysqli_query($conn, $sql);
    if(!$result) {
        die('Query Failed'. mysqli_error($conn));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'no_cliente' => $row['no_cliente'],
            'nombre' => $row['nombre'],
            'apaterno' => $row['apaterno'],
            'amaterno' => $row['amaterno'],
            'telefono' => $row['telefono'],
            'celular' => $row['celular'],
            'correo' => $row['correo'],
            'subscripcion' => $row['subscripcion'],
            'empresa' => $row['empresa'],
            'rfc' => $row['rfc'],
            'fecha_registro' => $row['fecha_registro'],
            'medio_identificación' => $row['medio_identificación'],
            'folio' => $row['folio'],
            'tipo_cliente' => $row['tipo_cliente'],
            'estatus' => $row['estatus']
    );
  }
        #convertimos el JSON para poder enviarlo /codificarlo
        $jsonstring = json_encode($json);
        //var_dump($jsonstring);
        echo $jsonstring;
?>