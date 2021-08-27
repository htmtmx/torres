<?php
if (isset($_POST['idCoche']) && isset($_POST['details'])){
    $id = $_POST['idCoche'];
    $details = $_POST['details'] == "1" ? true : false;
    $estatus=$_POST['estatus'];
    include_once "../control/controlCoche.php";
    $result = consultaCocheDetallesCompletos($details, $id,$estatus);
    echo $result;
//solicito a webhook la informacion

}