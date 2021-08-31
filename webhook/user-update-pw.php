<?php
if(isset($_POST['pwa'])&& isset($_POST['pwn']) && isset($_POST['pwc'])){

    $pwn = $_POST['pwn'];
    $pwc= $_POST['pwc'];
    $pwa = $_POST['pwa'];

    if($pwn== $pwc){
        include_once "../control/controlEmpleado.php";
        $result = verficaUsuarioPw($pwa,$pwn,$pwc) ? "Se ha cambiado la contraseña correctamente" : "Tu contraseña actual es incorrecta";
        echo $result;
    }else  echo "Hubo un error";

} else echo "Datos incompletos";
