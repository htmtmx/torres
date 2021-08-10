<?php
include_once "./enviaMail.php";
if (enviaCorreo("Cesar","cesar.hpp96@gmail.com")) {
    echo "Se envio el correo correctamente";
} else {
    echo "Error al intentar enviar el correo";
}
