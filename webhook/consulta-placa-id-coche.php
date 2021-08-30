<?php

$placa= $_POST['busquedaplaca'];

include_once "../control/controlCoche.php";

echo consultaIdCochexPlaca($placa);
