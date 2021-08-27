<?php
function registraCuenta($nombre,$ap,$am,$telefono,$celular,$sexo,$correo_user,$puesto,$nivelAcceso){
    session_start();
    // agregar el modelo crear empleado
    include_once "../model/EMPLEADO.php";
    include_once "tool_ids_generate.php";
    //creo a la empresa que voy a ingresar
    $obj_Emp = new EMPLEADO();
    $Object = new DateTime();
    $DateAndTime = $Object->format("dmhis");
    $id = $DateAndTime/2;
    $pw=gen_PW_user();
    //Encapsulamos el objeto para empleado en su modelo
    $obj_Emp->setNoEmpleado($id);
    $obj_Emp->setIdEmpresaFk($_SESSION['rfc_empresa']);
    $obj_Emp->setNombre($nombre);
    $obj_Emp->setApaterno($ap);
    $obj_Emp->setAmaterno($am);
    $obj_Emp->setTelefono($telefono);
    $obj_Emp->setCelular($celular);
    $obj_Emp->setSexo($sexo);
    $obj_Emp->setCorreoUser($correo_user);
    $obj_Emp->setPw(md5($pw));
    $obj_Emp->setPuesto($puesto);
    $obj_Emp->setNivelAcceso($nivelAcceso);
    $obj_Emp->setEstatus(1);
    //ejecutto la funcion de crear empresa
    if($obj_Emp->queryaddEmpleado()){
        include_once "controlCorreos.php";
        return enviaCorreo($pw);
    }
    return false;
}