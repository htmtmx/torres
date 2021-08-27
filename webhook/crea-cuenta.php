<?php
if (isset($_POST['nombre']) && isset($_POST['app']) && isset($_POST['apm'])
    && isset($_POST['user']) && isset($_POST['correo'])) {



        include_once "../control/controlRegistro.php";
        $empresapost = $_POST['empresa'];
        $nombre = $_POST['nombre'];
        $ap = $_POST['app'];
        $am = $_POST['apm'];
        $username = $_POST['user'];
        $correo = $_POST['correo'];
        $empresaName = $empresapost != "" ? $empresapost : "$nombre $ap $am";

        $result = registraCuenta($nombre, $ap, $am, $username, $correo, $empresaName);

        if ($result) {
            echo "Se ha creado tu cuenta de forma exitosa";
        } else echo "Fallo";

} else {
    echo "Los datos estan incompletos";
}

/*

*/
