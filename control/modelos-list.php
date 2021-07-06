<?php
    include('./db.php');
    $id = $_POST['id'];
    $concat = "";
    if ($id!='0') {
            $concat = " AND `id_marca_fk` = '$id' ";
    }
    $sql = "SELECT `id_modelo`, `id_marca_fk`, `nombre`, `estatus` FROM `modelo` WHERE `estatus` = 1 $concat ";
    mysqli_set_charset($conn,"utf8");
    $result = mysqli_query($conn, $sql);
    if(!$result) {
        die('Query Failed'. mysqli_error($conn));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id_modelo' => $row['id_modelo'],
            'id_marca_fk' => $row['id_marca_fk'],
            'nombre' => $row['nombre'],
            'estatus' => $row['estatus']
    );
  }
        #convertimos el JSON para poder enviarlo /codificarlo
        $jsonstring = json_encode($json);
        //var_dump($jsonstring);
        echo $jsonstring;
?>