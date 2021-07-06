<?php
    include('./db.php');
    $sql = "SELECT `id_marca`, `nombre`, `estatus` FROM `marca` WHERE `estatus` = 1 ";
    mysqli_set_charset($conn,"utf8");
    $result = mysqli_query($conn, $sql);
    if(!$result) {
        die('Query Failed'. mysqli_error($conn));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id_marca' => $row['id_marca'],
            'nombre' => $row['nombre'],
            'estatus' => $row['estatus']
    );
  }
        #convertimos el JSON para poder enviarlo /codificarlo
        $jsonstring = json_encode($json);
        //var_dump($jsonstring);
        echo $jsonstring;
?>