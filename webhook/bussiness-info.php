<?php
    //regresa el valor especifico dependiendo el id
    $rfc = $_POST['rfc'];
    $query = "SELECT `rfc`, `nombre`, `calle`, `no_ext`, `no_int`, `colonia`, `cp`, `de_mun`, `estado`, 
        `telefono`, `correo`, `sitio_web`, `path_logo`, `version`, `licencia` FROM `empresa` ";
    mysqli_set_charset($conn,"utf8");
    #ejecumatos el Query y almacenamos resultado
    $result = mysqli_query($conn,$query);
    
    if (!$result) {
        # erro en la consulta
        die.('Error query '. mysqli_error($conn));
    }
    #Hay resultado y convertimos a JSON PARA TRATAR CON AJAX
    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        # creamos el JSON
        $json[] = array(
            'rfc' => $row['rfc'],
            'nombre' => $row['nombre'],
            'calle' => $row['calle'],
            'no_ext' => $row['no_ext'],
            'no_int' => $row['no_int'],
            'colonia' => $row['colonia'],
            'cp' => $row['cp'],
            'de_mun' => $row['de_mun'],
            'estado' => $row['estado'],
            'telefono' => $row['telefono'],
            'correo' => $row['correo'],
            'sitio_web' => $row['sitio_web'],
            'version' => $row['version'],
            'licencia' => $row['licencia']
        );
    }
    #convertimos el JSON para poder enviarlo /codificarlo
    #Solo codifico el primer elemento para aasegurar un elemento
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>