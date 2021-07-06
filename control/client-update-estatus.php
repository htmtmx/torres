<?php
    if (isset($_POST['id']) && isset($_POST['estatus_val'])) 
    {
        $status = $_POST['estatus_val'];
        $id = $_POST['id'];
        $val = $status == '0' ? '1':'0';
        $query = "UPDATE `cliente` SET `estatus` = '$val' WHERE `cliente`.`no_cliente` = $id";
        include('ejecute-query.php');
        echo "Se ha cambiado el estado del cliente";
    }
?>