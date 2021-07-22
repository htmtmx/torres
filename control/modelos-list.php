<?php
if (isset($_POST['idMarca'])){
    $idMarca = $_POST['idMarca'];
    include_once('./controlModelo.php');
    echo consultaModelos($idMarca);
}else{

}
