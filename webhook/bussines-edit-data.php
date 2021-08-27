<?php
if (isset($_POST['idEmpresa']) && isset($_POST['nombreEmpresa'])
    && isset($_POST['rfcEmpresa']) && isset($_POST['calleEmpresa'])
    && isset($_POST['coloniaEmpr']) && isset($_POST['cpEmpr'])
    && isset($_POST['telEmpr']) && isset($_POST['correoEmp'])
    && isset($_POST['webEmpr'])) {
    $idEmpresa          =  $_POST['idEmpresa'];
    $nombreEmpresa          =  $_POST['nombreEmpresa'];
    $rfcEmpresa             =  $_POST['rfcEmpresa'];
    $calleEmpresa           = $_POST['calleEmpresa'];
    $noExt                  =  $_POST['noExtEmp'];
    $noInt                  =  $_POST['noIntEmp'];
    $colonia                =  $_POST['coloniaEmpr'];
    $cp                     =  $_POST['cpEmpr'];
    $municipio              =  $_POST['municipio'];
    $estado                 =  $_POST['estadoEmp'];
    $tel                    =  $_POST['telEmpr'];
    $correo                 =  $_POST['correoEmp'];
    $sitio_web              =  $_POST['webEmpr'];

    include_once "../control/controlEmpresa.php";
    if(updateEmpresa($idEmpresa,$rfcEmpresa,$nombreEmpresa,$calleEmpresa,$noExt,
                $noInt,$colonia,$cp,$municipio,$estado,$tel,$correo,$sitio_web)){
        echo "¡Se han actualizado los datos de la empresa con exito!";
    } else echo "No se ha podido actualizar la empresa";

} else echo "Los datos estan incompletos";