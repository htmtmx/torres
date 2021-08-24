<?php
if (isset($_POST['id'])){
    $idMarca = $_POST['id'];
    include_once('../control/controlModelo.php');
    echo consultaModelos($idMarca);
}else{
echo"Faltan datos";
}
