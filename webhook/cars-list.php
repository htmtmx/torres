<?php
if (isset($_POST['idCoche']) && isset($_POST['details'])){
    $id = $_POST['idCoche'];
    if(isset($_POST['archivado'])){
        $archivado = $_POST['archivado'];
    }else {
        $archivado=false;
    }
    $details = $_POST['details'] == "1" ? true : false;
    $estatus=$_POST['estatus'];
    include_once "../control/controlCoche.php";
    $archivados = $archivado=="true"?true:false;
    $result = consultaCocheDetallesCompletos($details, $id,$estatus,$archivados);
    echo $result;
//solicito a webhook la informacion

}