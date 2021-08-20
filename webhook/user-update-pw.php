<?php
if(isset($_POST['pwo'])&& isset($_POST['pw']) && isset($_POST['cpw'])){

    $pwn = $_POST['pw'];
    $pwc= $_POST['cpw'];
    $pwa = $_POST['pwo'];

    if($pwn== $pwc){
        include_once "../control/controlEmpleado.php";
        $result = verficaUsuarioPw($pwa,$pwn,$pwc) ? "Se ha cambiado la contraseña correctamente" : "Tu contraseña actual es incorrecta";
        echo $result;
    }else  echo "Hubo un error";

} else echo "Datos incompletos";
