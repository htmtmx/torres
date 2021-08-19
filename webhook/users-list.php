<?php
if(isset($_POST['id'])){
    $id = $_POST['id'];
    include_once "../control/controlEmpleado.php";
    echo consultaEmpleado($id);
}else echo "Datos incompletos";
