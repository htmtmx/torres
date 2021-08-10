<?php
if (isset($_POST['idCoche']) && isset($_POST['details'])){
    $id = $_POST['idCoche'];
    $details = $_POST['details'];
    include_once "../control/controlCoche.php";
    $result = consultaCocheDetallesCompletos($details, $id);
    echo $result;
//solicito a webhook la informacion

}