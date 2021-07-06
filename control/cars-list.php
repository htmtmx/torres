<?php
include('./db.php');
$id = $_POST['id'];
$details = $_POST['details'] !='true'? false:true;
$concat = "";
if ($id!='0')
    $concat = " AND coche.no_vehiculo = '$id' ";

$sql = "SELECT 
    coche.no_vehiculo,
    coche.id_modelo_fk,
    coche.fecha_registro,
    coche.anio,
    coche.placa,
    coche.entidad_placa,
    coche.color,
    coche.kilometros,
    coche.transimision,
    coche.combustible,
    coche.no_puertas,
    coche.precio_contado,
    coche.precio_credito,
    coche.opc_credito,
    coche.observaciones,
    coche.estatus,
    modelo.id_modelo,
    modelo.id_marca_fk,
    modelo.nombre AS modelo_coche,
    marca.id_marca,
    marca.nombre AS marca_coche
    FROM coche,modelo,marca 
    WHERE coche.id_modelo_fk = modelo.id_modelo 
    AND marca.id_marca = modelo.id_marca_fk 
    AND coche.estatus = '1' $concat ";
    

mysqli_set_charset($conn,"utf8");
$result = mysqli_query($conn, $sql);
if(!$result) {
    die('Query Failed'. mysqli_error($conn));
}
    
$json = array();
while($row = mysqli_fetch_array($result)) 
{
    $json[] = array(
        'no_vehiculo' => $row['no_vehiculo'],
        'fecha_registro' => $row['fecha_registro'],
        'anio' => $row['anio'],
        'placa' => $row['placa'],
        'entidad_placa' => $row['entidad_placa'],
        'color' => $row['color'],
        'kilometros' => $row['kilometros'],
        'transimision' => $row['transimision'],
        'combustible' => $row['combustible'],
        'no_puertas' => $row['no_puertas'],
        'precio_contado' => $row['precio_contado'],
        'precio_credito' => $row['precio_credito'],
        'opc_credito' => $row['opc_credito'],
        'estatus' => $row['estatus'],
        'observaciones' => $row['observaciones'],
        'id_modelo' => $row['id_modelo'],
        'modelo_coche' => $row['modelo_coche'],
        'id_marca_fk' => $row['id_marca_fk'],
        'id_marca' => $row['id_marca'],
        'marca_coche' => $row['marca_coche'],
        'urls' =>  getUrl($row['no_vehiculo']),
        'detalles' => getDetails($row['no_vehiculo'],$details)
    );
}
#convertimos el JSON para poder enviarlo /codificarlo
$jsonstring = json_encode($json);
//var_dump($jsonstring);
echo $jsonstring;

    function getUrl($no_vehiculo){
        $sql = "SELECT  
        f.`id_file_v`, 
        f.`id_tipo_archivo_fk`, 
        f.`no_vehiculo_fk`, 
        f.`nombre`, 
        f.`path`, 
        f.`ext`, 
        f.`nivel_acceso`, 
        f.`estatus`  
        FROM `file_vechiculo` f, `coche` c 
        WHERE f.`no_vehiculo_fk` =  c.`no_vehiculo` 
        AND c.`no_vehiculo` = '$no_vehiculo' 
        AND f.`id_tipo_archivo_fk` = 1   ";
        include('./db.php');
        mysqli_set_charset($conn,"utf8");
        $result = mysqli_query($conn, $sql);
        if(!$result) {
            die('Query Failed'. mysqli_error($conn));
        }

        $imgs = array();
        while($row = mysqli_fetch_array($result)) 
        {
            $imgs[] = array(
                'id_file_v' => $row['id_file_v'],
                'id_tipo_archivo_fk' => $row['id_tipo_archivo_fk'],
                'no_vehiculo_fk' => $row['no_vehiculo_fk'],
                'nombre' => $row['nombre'],
                'path' => $row['path'],
                'path' => $row['path'],
                'ext' => $row['ext'],
                'nivel_acceso' => $row['nivel_acceso'],
                'estatus' => $row['estatus']
            );

        }
        return $imgs;
    }

function getDetails($no_vehiculo, $details){
    if ($details) {
        $sql = "SELECT `no_vehiculo_fk`, `id_detalle_fk`, `nombre`, `valor`, `estatus` 
        FROM `uso_detalle` WHERE `no_vehiculo_fk` = $no_vehiculo ";
        include('./db.php');
        mysqli_set_charset($conn,"utf8");
        $result = mysqli_query($conn, $sql);
        if(!$result) {
            die('Query Failed'. mysqli_error($conn));
        }
        $detalles = array();
        while($row = mysqli_fetch_array($result)) 
        {
            $detalles[] = array(
                'no_vehiculo_fk' => $row['no_vehiculo_fk'],
                'nombre' => $row['nombre'],
                'id_detalle_fk' => $row['id_detalle_fk'],
                'valor' => $row['valor'],
                'estatus' => $row['estatus']
            );

        }
        return $detalles;
    }
    else {
        return null;
    }
        
}
?>