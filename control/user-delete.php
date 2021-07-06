<?php
        if (isset($_POST['id'])) 
        {
            $id = $_POST['id'];
            $query = "UPDATE `empleado` SET `estatus` = '0', `system_state` = '0' WHERE `empleado`.`no_empleado` = $id";
            include('ejecute-query.php');
            echo "Se ha eliminado al empleado";
        }
?>