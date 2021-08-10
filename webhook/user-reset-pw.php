<?php
        if (isset($_POST['id'])) 
        {
            $id = $_POST['id'];
            $pw = md5('0000');
            $query = "UPDATE `empleado` SET `pw` = '$pw' WHERE `empleado`.`no_empleado` =  $id";
            include('ejecute-query.php');
            echo "Se restablecido la contraseña del Usuario";
        }
?>