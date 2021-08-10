<?php
    $id = $_POST['id'];
    include_once "../control/controlCliente.php";
    echo consultaCliente($id);