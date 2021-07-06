<?php
        if (isset($_POST['id'])) 
        {
            $id = $_POST['id'];
            $query = "DELETE FROM `cliente` WHERE `cliente`.`no_cliente` = $id";
            include('ejecute-query.php');
            echo "Se ha eliminado al cliente";
        }
?>