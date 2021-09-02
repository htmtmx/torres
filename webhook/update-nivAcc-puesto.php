<?php
$nivelAcceso=$_POST['nivAcce'];
$puesto= $_POST['puesto'];
$no_empleado= $_POST['noEmpleado'];
include_once "../control/controlEmpleado.php";
echo updateNivelAccesoPuesto($nivelAcceso,$puesto,$no_empleado);
