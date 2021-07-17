<?php
if (isset($_POST['pw']) && isset($_POST['user'])) {
    $pw = ($_POST['pw']);
    $user = $_POST['user'];

    include_once "./controlEmpleado.php";
    if(verificaCuentaUser($user,$pw)){
        $mje = array(
            "mjeType" => "1",
            "Mensaje" => "Cuenta verificcada"
        );
    }
    else{
        $mje = array(
            "mjeType" => "0",
            "Mensaje" => "No existe la cuenta o el correo es incorrecto"
        );
    }

    echo json_encode($mje);
}
else{
    $mje = array(
        "mjeType" => "-1",
        "Mensaje" => "Error interno de PHP",
    );
    echo json_encode($mje);
}