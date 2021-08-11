<?php
$id_empresa = 3;
$rfc = 'MAOV970707HMCNS';
$nombre = 'Valeria';
$calle = 'Hidalgo';
$no_ext = 5;
$no_int = 6;
$colonia = 'Acocalco';
$cp = 54666;
$municipio = 'Coyotepec';
$estado = 'Mexico';
$telefono = '5588441122';
$correo = 'correoVal@gmail.com';
$sitio_web = 'www.sitio.com';
$path_logo = 'pathlogoUpdate';
$version = '0.958.5';
$licencia = 'Update de licencia';

include_once "../control/controlEmpresa.php";
if(updateEmpresa($id_empresa,$rfc,$nombre,$calle,$no_ext,$no_int,$colonia,$cp,$municipio,$estado,$telefono,$correo,$sitio_web,$path_logo,
    $version,$licencia)){
    echo "Se ha actualizado con exito";
} else echo "Ha falaldo";
?>