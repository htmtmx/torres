<?php
if(isset($_POST['id'])){
    $noCliente=$_POST['id'];
    include_once "../control/controlCliente.php";
    echo consultaCliente($noCliente);
} else echo "Faltan datos";
