<?php
    include('./db.php');
    $id = $_POST['id'];
    $concat = "";
    if ($id!='0') {
            $concat = " AND `empleado`.`no_empleado` = '$id' ";
    }
    $sql = "SELECT 
            `no_empleado`, 
            `rfc_fk`, 
            `nombre`, 
            `apaterno`, 
            `amaterno`, 
            `telefono`, 
            `celular`, 
            `sexo`, 
            `fecha_registro`, 
            `correo_user`, 
            `pw`, 
            `puesto`, 
            `nivel_acceso`, 
            `estatus` 
            FROM `empleado` WHERE system_state = 1 $concat";
    mysqli_set_charset($conn,"utf8");
    $result = mysqli_query($conn, $sql);
    if(!$result) {
        die('Query Failed'. mysqli_error($conn));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'no_empleado' => $row['no_empleado'],
            'nombre' => $row['nombre'],
            'apaterno' => $row['apaterno'],
            'amaterno' => $row['amaterno'],
            'telefono' => $row['telefono'],
            'celular' => $row['celular'],
            'sexo' => $row['sexo'],
            'fecha_registro' => $row['fecha_registro'],
            'correo_user' => $row['correo_user'],
            'pw' => $row['pw'],
            'puesto' => $row['puesto'],
            'nivel_acceso' => $row['nivel_acceso'],
            'estatus' => $row['estatus']
    );
  }
        #convertimos el JSON para poder enviarlo /codificarlo
        $jsonstring = json_encode($json);
        //var_dump($jsonstring);
        echo $jsonstring;
?>