<?php
echo "FUNCIONO";
/*
    include('./db.php');
    session_start();
    $pw = md5($_POST['pw']);
    $user = $_POST['user'];
    if (!empty($pw)&&!empty($user)) {
        $query = "SELECT `no_empleado`, `rfc_fk`, `nombre`, `apaterno`, `amaterno`, `telefono`, `celular`, `sexo`, `fecha_registro`, `correo_user`, `pw`, `puesto`, `nivel_acceso`, `estatus` 
            FROM `empleado` WHERE `correo_user` = '$user' AND `pw` = '$pw' AND `estatus` = 1";

        $arreglo = array();
        mysqli_set_charset($conn,"utf8");
        #ejecumatos el Query y almacenamos resultado
        $result = mysqli_query($conn,$query);
        mysqli_close($conn);
        if (!$result) {
            # erro en la consulta
            die.('Error query '. mysqli_error($conn));
        }
        #Hay resultado y convertimos a JSON PARA TRATAR CON AJAX
        $json = array();
        while ($row = mysqli_fetch_array($result)) {
            # creamos el JSON
            $json[] = array(
                'no_empleado' => $row['no_empleado'],
                'rfc_fk' => $row['rfc_fk'],
                'apaterno' => $row['apaterno'],
                'amaterno' => $row['amaterno'],
                'puesto' => $row['puesto'],
                'nivel_acceso' => $row['nivel_acceso'],
                'correo' => $row['correo_user'],
                'pw' => $row['pw'],
                'nombre' => $row['nombre']
            );
        }

        $data = json_encode($json);
        echo $data;
    }
    else{
        return "vacio";
    }
*/