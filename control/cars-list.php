<?php
if (isset($_POST['idCoche']) && isset($_POST['details'])){
    $id = $_POST['idCoche'];
    $details = $_POST['details'];
    include_once "./controlCoche.php";
    echo consultaCocheDetallesCompletos($details, $id);
//solicito a control la informacion

}