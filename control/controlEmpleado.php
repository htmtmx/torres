<?php

function consultaEmpleado($idEmpleado)
{
    session_start();
    $idEmpleado= $idEmpleado<0 ? $_SESSION['no_empleado']: $idEmpleado;
    include_once "../model/EMPLEADO.php";
    $objEmpleado = new EMPLEADO();
    $result = $objEmpleado->queryconsultaEmpleado($idEmpleado);
    return json_encode($result);
}

function verificaCuentaUser($correo,$pw)
{
    include_once "../model/EMPLEADO.php";
    $obj_empleado = new EMPLEADO();
    $obj_empleado->setCorreoUser($correo);
    $obj_empleado->setPw(md5($pw));
    $obj_user = $obj_empleado->queryverificaCountUser();
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
        $_SESSION['rfc_empresa']    = $obj_user[0]['id_empresa_fk'];
        $_SESSION['nombre_empresa'] = $obj_user[0]['nombre_empresa'];
        return true;
    }
    return false;
}

function addEmpleado($nombre,$app,$apm,$tel,$cel,$correo,$puesto,$sexo,$acceso)
{
    session_start();
    include_once "../model/EMPLEADO.php";
    include_once "tool_ids_generate.php";
    $pw= gen_PW_user();
    $objEmpleado = new EMPLEADO();
    $objEmpleado->setNoEmpleado(gen_user_id());
    $objEmpleado->setIdEmpresaFk($_SESSION['rfc_empresa']);
    $objEmpleado->setNombre($nombre);
    $objEmpleado->setApaterno($app);
    $objEmpleado->setAmaterno($apm);
    $objEmpleado->setTelefono($tel);
    $objEmpleado->setCelular($cel);
    $objEmpleado->setSexo($sexo);
    $objEmpleado->setCorreoUser($correo);
    $objEmpleado->setPuesto($puesto);
    $objEmpleado->setNivelAcceso($acceso);
    $objEmpleado->setFechaRegistro(date('Y-m-d H:i:s'));
    $objEmpleado->setPw(md5($pw));
    $empresa = $_SESSION['nombre_empresa'];
    if($objEmpleado->queryaddEmpleado()){
        include_once "controlCorreos.php";
        //$correoSend,  $pwtmp, $nombre, $empresaName
        return enviaCorreoAddUser($objEmpleado->getCorreoUser(),$pw,$objEmpleado->getNombreCompleto(),$empresa);
    }
    return false;
}

/********************************************************************
 *           U P D A T E    E S T A T U S    E M P L E A D O
 *******************************************************************/
function updateStatusE($idUser,$estatus){
    include_once "../model/EMPLEADO.php";
    $estatusNuevo= $estatus == "0" ? "1": "0";
    $objEmpleado = new EMPLEADO();
    $objEmpleado->setNoEmpleado($idUser);
    $objEmpleado->setEstatus($estatusNuevo);
    return $objEmpleado->queryUpdateStatusE();
}
/********************************************************************
 *                   D E L E T E    E M P L E A D O
 *******************************************************************/
function deleteEmpleado($no_empleado)
{
    include_once "../model/EMPLEADO.php";
    $objEmpleado = new EMPLEADO();
    return $objEmpleado->queryeliminarEmpleado($no_empleado);
}

function updateEmpleado($nombre,$apaterno_user,$amaterno_user,$telefono_user,$celular_user,
                        $correo_user,$sexo_user){
    include_once "../model/EMPLEADO.php";
    session_start();
    $objEmpleado = new EMPLEADO();
    $objEmpleado->setNoEmpleado($_SESSION['no_empleado']);
    $objEmpleado->setNombre($nombre);
    $objEmpleado->setApaterno($apaterno_user);
    $objEmpleado->setAmaterno($amaterno_user);
    $objEmpleado->setTelefono($telefono_user);
    $objEmpleado->setCelular($celular_user);
    $objEmpleado->setSexo($sexo_user);
    $objEmpleado->setCorreoUser($correo_user);

    if($objEmpleado->queryupdateEmpleado()){
        $_SESSION['usuario']        = $objEmpleado->getNombre();
        $_SESSION['apaterno']       = $objEmpleado->getApaterno();
        $_SESSION['amaterno']       = $objEmpleado->getAmaterno();
        $_SESSION['correo_user']    = $objEmpleado->getCorreoUser();
        return true;
    }
}

function verficaUsuarioPw($pwa,$pwn,$pwc){
    include_once "../model/EMPLEADO.php";
    session_start();
    $obj_empleado = new EMPLEADO();
    $obj_empleado->setCorreoUser($_SESSION['correo_user']);
    $obj_empleado->setNoEmpleado($_SESSION['no_empleado']);
    $md5PwActual = md5($pwa);
    $obj_empleado->setPw($md5PwActual);
    if($obj_empleado->queryverificaCountUser()){
        if($pwa!=$pwn){
            $md5PwNew = md5($pwn);
            $obj_empleado->setPw($md5PwNew);
            return $obj_empleado->modifyPw();
        } else return false;
    }
    return false;
}

/**** FUNCION ACTUALIZA NIV ACCESO Y PUESTO ***/
function updateNivelAccesoPuesto($nivelAcceso,$puesto,$no_empleado){
    include_once "../model/EMPLEADO.php";
    $empleado = new EMPLEADO();
    $empleado->setNoEmpleado($no_empleado);
    $empleado->setPuesto($puesto);
    $empleado->setNivelAcceso($nivelAcceso);
    return $empleado->queryupdateNivelAccesoPuesto();
}