<?php
if (isset($_POST['idMarca'])){
    $idMarca = $_POST['idMarca'];
    include_once('../control/controlModelo.php');
    echo consultaModelos($idMarca);
}else{
echo"Error interno";
}
