<?php

function consultaEmpleado($idEmpleado)
{
    include_once "../model/EMPLEADO.php";
    $objEmpleado = new EMPLEADO();
    $result = $objEmpleado->consultaEmpleado($idEmpleado);
    return json_encode($result);
}

function verificaCuentaUser($correo,$pw){
    include_once "../model/EMPLEADO.php";
    $obj_empleado = new EMPLEADO();
    $obj_empleado->setCorreoUser($correo);
    $obj_empleado->setPw(md5($pw));
    $obj_user = $obj_empleado->verificaCountUser();
    if(count($obj_user) > 0 ){
        //creamos la sesion
        session_start();
        $_SESSION['no_empleado']    = $obj_user[0]['no_empleado'];
        $_SESSION['usuario']        = $obj_user[0]['nombre'];
        $_SESSION['apaterno']       = $obj_user[0]['apaterno'];
        $_SESSION['amaterno']       = $obj_user[0]['amaterno'];
        $_SESSION['puesto']         = $obj_user[0]['puesto'];
        $_SESSION['nivel_acceso']   = $obj_user[0]['nivel_acceso'];
        $_SESSION['correo_user']    = $obj_user[0]['correo_user'];
        return true;
    }
    return false;
}

function addUpdateEmpleado($accion,$no_empleado,$nombre,$app,$apm,$tel,$cel,
                           $correo,$puesto,$sexo,$acceso,$estatus)
{

    include_once "../model/EMPLEADO.php";
    $objEmpleado = new EMPLEADO();
    $objEmpleado->setNoEmpleado($no_empleado);
    $objEmpleado->setIdEmpresaFk(1);
    $objEmpleado->setNombre($nombre);
    $objEmpleado->setApaterno($app);
    $objEmpleado->setAmaterno($apm);
    $objEmpleado->setTelefono($tel);
    $objEmpleado->setCelular($cel);
    $objEmpleado->setSexo($sexo);
    $objEmpleado->setCorreoUser($correo);
    $objEmpleado->setPuesto($puesto);
    $objEmpleado->setNivelAcceso($acceso);
    $objEmpleado->setEstatus($estatus);
    $actionMje = $accion == 0 ? " actualizó ": " registró ";

    if ($accion == 1 && $no_empleado ==0) {
        include_once "./tool_ids_generate.php";
        $objEmpleado->setNoEmpleado(gen_user_id());
        $objEmpleado->setPw(md5("0000"));
        $result = $objEmpleado->addEmpleado();
    }else {
        $result = $objEmpleado->updateEmpleado();
    }
    $msjReturn = $result? "Se ".$actionMje." correctamente al empleado ":"Error";
    echo $msjReturn;
}

/********************************************************************
 *                  U P D A T E    E M P L E A D O
 *******************************************************************/
/*include_once "../model/EMPLEADO.php";
$objEmpleado = new EMPLEADO();
$objEmpleado->setNoEmpleado(84196);
$objEmpleado->setIdEmpresaFk(2);
$objEmpleado->setNombre("Jorge");
$objEmpleado->setApaterno("Lopez");
$objEmpleado->setAmaterno("Abarca");
$objEmpleado->setTelefono("0005856");
$objEmpleado->setCelular("648821");
$objEmpleado->setSexo(0);
$objEmpleado->setCorreoUser("jorge@gmail.com");
$objEmpleado->setPuesto("Admin");
$objEmpleado->setNivelAcceso(2);
echo $result = $objEmpleado->updateEmpleado()?"Se actualizo correctamente al empleado ".$objEmpleado->getNoEmpleado():"Error al intentar actualizar";*/
/********************************************************************
 *                  U P D A T E    P W D    E M P L E A D O
 *******************************************************************/
/*include_once "../model/EMPLEADO.php";
$objEmpleado = new EMPLEADO();
echo $result = $objEmpleado->updatePw(84196,1111)?"Se actualizo correctamente la contraseña ":"Error al intentar actualizar";*/
/********************************************************************
 *           U P D A T E    E S T A T U S    E M P L E A D O
 *******************************************************************/
/*include_once "../model/EMPLEADO.php";
$objEmpleado = new EMPLEADO();
echo $result = $objEmpleado->updateStatusEmpleado(84196,1)?"Se actualizo correctamente el estado del empleado ":"Error al intentar actualizar";*/
/********************************************************************
 *                   D E L E T E    E M P L E A D O
 *******************************************************************/
function eliminarEmpleado($no_empleado)
{
    include_once "../model/EMPLEADO.php";
    $objEmpleado = new EMPLEADO();
    $objEmpleado->eliminarEmpleado($no_empleado);
}



