<?php
if(isset($_POST['id'])){
    $id = $_POST['id'];
    include_once "../control/controlCliente.php";
    echo consultaCliente($id);

} else echo "Faltan datos";
