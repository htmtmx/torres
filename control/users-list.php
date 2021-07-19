<?php
    include('./db.php');
    $id = $_POST['id'];
    include_once "./controlEmpleado.php";
    echo consultaEmpleado($id);