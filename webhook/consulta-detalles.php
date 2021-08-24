<?php
if(isset($_POST['idDetalle'])){
    $id_detalle=$_POST['idDetalle'];
    include_once "../control/controlDetalles.php";
    echo consultaDetalle($id_detalle);
}
