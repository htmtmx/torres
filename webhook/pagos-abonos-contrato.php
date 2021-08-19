<?php
$no_contrato = $_POST['id'];
include_once "../control/controlContrato.php";
//echo "Datos desde  Servidor ".$no_contrato;
echo consultaPagosAbonosDeContrato($no_contrato);
