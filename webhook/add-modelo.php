<?php
if(isset($_POST['marcasCoche']) && isset($_POST['modeloname'])){
    $marca= $_POST['marcasCoche'];
    $nombre= $_POST['modeloname'];
    include_once "../control/controlModelo.php";
    echo addModelo($marca,$nombre);
} else echo "Faltan datos";
