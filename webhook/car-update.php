<?php
if (isset($_POST['idCoche']) && isset($_POST['niv'])
    && isset($_POST['año']) && isset($_POST['placa'])
    && isset($_POST['color']) && isset($_POST['kilometraje'])
    && isset($_POST['nopuertas']) && isset($_POST['precioLista']) && isset($_POST['precioCredito'])) {
    $no_vehiculo            =  $_POST['idCoche'];
    $niv                    =  $_POST['niv'];
    $modelo                 =  $_POST['modelo'];
    $anio                   =  $_POST['año'];
    $placa                  =  $_POST['placa'];
    $estado                 =  $_POST['estado'];
    $color                  =  $_POST['color'];
    $kilometraje            =  $_POST['kilometraje'];
    $transmision            =  $_POST['transmision'];
    $combustible            =  $_POST['combustible'];
    $nopuertas              =  $_POST['nopuertas'];
    $observaciones          =  $_POST['observaciones'];
  //  $valorOpcCredito = $_POST['ckeckCredito']== "checked"? "1":"";
   // $opcCredit              = $valorOpcCredito;
    $precioLista            =  $_POST['precioLista'];
    $precioCredito          =  $_POST['precioCredito'];

    if (isset($_POST['ckeckCredito'])){
        $opcCredit = 1;
    }else{
        $opcCredit = 0;
    }
    include_once "../control/controlCoche.php";
    if(updateCoche($no_vehiculo,$niv,$modelo,$anio,$placa,$estado,$color,$kilometraje,$transmision,
                    $combustible,$nopuertas,$precioLista,$precioCredito,$opcCredit,$observaciones)){
        echo "¡Se han actualizado los datos del vehiculo con exito!";
    } else echo "No se ha podido actualizar el vehiculo";

} else echo "Los datos estan incompletos";