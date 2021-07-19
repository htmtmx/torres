<?php
    include('./db.php');
    $id = $_POST['id'];
    include_once "./controlCliente.php";
    echo consultaCliente($id);