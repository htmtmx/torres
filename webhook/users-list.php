<?php
    $id = $_POST['id'];
    include_once "../control/controlEmpleado.php";
    echo consultaEmpleado($id);