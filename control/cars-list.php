<?php
if (isset($_POST['idCoche']) && isset($_POST['details'])){
    $id = $_POST['idCoche'];
    $details = $_POST['details'];
    include_once "./ctrl/controlCoche.php";
    echo consultaCoches($id,$details);
//solicito a control la informacion

}