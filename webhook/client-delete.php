<?php
if(isset($_POST['idCliente'])){
    $idCliente= $_POST['idCliente'];
    include_once "../control/controlCliente.php";
    deleteCliente($idCliente);
}
