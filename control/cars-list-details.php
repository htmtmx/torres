<?php
echo "List details";
include('./db.php');
$id = $_POST['id'];

$sql = "SELECT 
    d.id_detalle,
    d.nombre,
    d.categoria,
    d.visible,
    d.oblogatorio,
    d.estatus 
    FROM detalle d WHERE d.estatus = 1 ";

mysqli_set_charset($conn,"utf8");
$result = mysqli_query($conn, $sql);
if(!$result) {
    die('Query Failed'. mysqli_error($conn));
}
    
$json = array();
while($row = mysqli_fetch_array($result)) 
{
    $json[] = array(
        'id_detalle' => $row['id_detalle'],
        'nombre' => $row['nombre'],
        'categoria' => $row['categoria'],
        'visible' => $row['visible'],
        'oblogatorio' => $row['oblogatorio']
    );
}
#convertimos el JSON para poder enviarlo /codificarlo
$jsonstring = json_encode($json);
//var_dump($jsonstring);
echo $jsonstring;

?>