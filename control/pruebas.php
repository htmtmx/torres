
<?php


/********************************************************************
 *                     A D D    M O D E L O
 *******************************************************************/
/*include_once "../model/MODELO.php";
$objModel = new MODELO();
$objModel->setIdMarcaFk(41);
$objModel->setNombre("Modelo ".$objModel->getIdMarcaFk());
echo $result = $objModel->addModelo($objModel->getIdMarcaFk(),$objModel->getNombre())?"Se registro correctamente el modelo ".$objModel->getNombre():"";*/
/********************************************************************
 *                     A D D    M O D E L O
 *******************************************************************/
/*include_once "../model/MODELO.php";
$objModel = new MODELO();
$objModel->setIdModelo(409);
$objModel->setIdMarcaFk(16);
$objModel->setNombre("Modelo ".$objModel->getIdMarcaFk());
$objModel->setEstatus(3);
echo $result = $objModel->updateModelo() ? "Se actualizo correctamente el modelo ".$objModel->getIdModelo():"Error al intentar actualizar";*/
/********************************************************************
 *                  D E L E T E    M O D E L O
 *******************************************************************/
/*include_once "../model/MODELO.php";
$objModel = new MODELO();
echo $result = $objModel->deleteModelo(407)?"Se elimino correctamente el modelo ":"Error al intentar eliminar";*/
/********************************************************************
 *                C O N S U L T A    M O D E L O
 *******************************************************************/
/*include_once "../model/MODELO.php";
$objModel = new MODELO();
$result = $objModel->consultaModelo(406);
var_dump($result);*/


/********************************************************************
 *                   A D D    D I R E C C I O N
 *******************************************************************/
/*include_once "../model/DIRECCIONES.php";
$objDireccion = new DIRECCIONES();
$objDireccion->setNoClienteFk(297659297675);
$objDireccion->setCalle("Mariano Pantaleon");
$objDireccion->setNoExt("48");
$objDireccion->setNoInt("58");
$objDireccion->setColonia("Roma");
$objDireccion->setMunicipio("Cuautitlan");
$objDireccion->setEstadoRepublica("Aguascalientes");
$objDireccion->setCP(81685);
$objDireccion->setReferencias("Referencias del domicilio del cliente");
echo $result = $objDireccion->addDireccion()?"Se registro correctamente la direccion":"Error al intentar registrar";*/
/********************************************************************
 *                 U P D A T E    D I R E C C I O N
 *******************************************************************/
/*include_once "../model/DIRECCIONES.php";
$objDireccion = new DIRECCIONES();
$objDireccion->setIdDireccion(3);
$objDireccion->setNoClienteFk(2572742);
$objDireccion->setCalle("Puebla");
$objDireccion->setNoExt("6");
$objDireccion->setNoInt("6");
$objDireccion->setColonia("Iztapalcalco");
$objDireccion->setMunicipio("Teoloyucan");
$objDireccion->setEstadoRepublica("Guadalajara");
$objDireccion->setCP(66666);
$objDireccion->setReferencias("Referencias del domicilio");
$objDireccion->setEstado(1);
echo $result = $objDireccion->updateDireccion()?"Se actualizo correctamente la direccion ".$objDireccion->getIdDireccion():"Error el intentar actualizar";*/
/********************************************************************
 *                 D E L E T E    D I R E C C I O N
 *******************************************************************/
/*include_once "../model/DIRECCIONES.php";
$objDireccion = new DIRECCIONES();
echo $result = $objDireccion->deleteDireccion(2)?"Se elimino correctamente la direccion":"Error al intentar eliminar";*/

/********************************************************************
 *    C O N S U L T A    E M P L E A D O S    E M P R E S A
 *******************************************************************/
/*include_once "../model/EMPLEADO.php";
$objEmpleado = new EMPLEADO();
$objEmpleado->setIdEmpresaFk(1);
$result = $objEmpleado->consultaEmpleados($objEmpleado->getIdEmpresaFk());
var_dump($result);*/
/********************************************************************
 *C O N S U L T A    L I S T A    E M P L E A D O S    E M P R E S A
 *******************************************************************/
/*include_once "../model/EMPRESA.php";
$objEmpresa = new EMPRESA();
$objEmpresa->setIdEmpresa(2);
$result = $objEmpresa->listEmpleados();
var_dump($result);*/

/********************************************************************
 *                  C O N S U L T A    E M P R E S A
 *******************************************************************/
/*include_once "../model/EMPRESA.php";
$objEmpresa = new EMPRESA();
$result = $objEmpresa->consultaEmpresa(0);
var_dump($result);*/
/********************************************************************
 *                   A D D    E M P R E S A
 *******************************************************************/
/*include_once "../model/EMPRESA.php";
$objEmpresa = new EMPRESA();
    $objEmpresa->setIdEmpresa(3);

    $objEmpresa->setRfc("RFC9496846FGFDF");
    $objEmpresa->setNombre("NombreEmpresa");
    $objEmpresa->setCalle("Calle Empresa");
    $objEmpresa->setNoExt("58");
    $objEmpresa->setNoInt("15");
    $objEmpresa->setColonia("Colonia Empresa");
    $objEmpresa->setCp(58468);
    $objEmpresa->setDeMun("Naucalpan");
    $objEmpresa->setEstado("Mexico");
    $objEmpresa->setTelefono("8495468165");
    $objEmpresa->setCorreo("empresa@gmail.com");
    $objEmpresa->setSitioWeb("empresa.com");
    $objEmpresa->setPathLogo("path84654cfcLogo");
    $objEmpresa->setVersion("0.1.1");
    $objEmpresa->setLicencia("Licencia empresa s. a. de c. v.");
    echo $result = $objEmpresa->addEmpresa() ? "Se rergistro correctamente a la empresa ".$objEmpresa->getNombre():"Error al intentar registrar";*/
/********************************************************************
 *                 U P D A T E    E M P R E S A
 *******************************************************************/
/*include_once "../model/EMPRESA.php";
$objEmpresa = new EMPRESA();
$objEmpresa->setIdEmpresa(3);
$objEmpresa->setRfc("RFC");
$objEmpresa->setNombre("Nombre");
$objEmpresa->setCalle("Calle");
$objEmpresa->setNoExt("09");
$objEmpresa->setNoInt("056");
$objEmpresa->setColonia("Colonia");
$objEmpresa->setCp(51111);
$objEmpresa->setDeMun("Municipio");
$objEmpresa->setEstado("MexicoCDMX");
$objEmpresa->setTelefono("5468165");
$objEmpresa->setCorreo("correo@empresa@gmail.com");
$objEmpresa->setSitioWeb("sitio.empresa.com");
$objEmpresa->setPathLogo("empresa_path84654cfcLogo");
$objEmpresa->setVersion("0.1.9");
$objEmpresa->setLicencia("Licencia s. a. de c. v.");
echo $result = $objEmpresa->updateEmpresa() ? "Se actualizo correctamente la empresa ".$objEmpresa->getIdEmpresa():"Error al intentar actualizar";*/
/********************************************************************
 *                 D E L E T E    E M P R E S A
 *******************************************************************/
/*include_once "../model/EMPRESA.php";
$objEmpresa = new EMPRESA();
echo $result = $objEmpresa->deleteEmpresa(2)? "Se elimino correctamente la empresa":"Error al intentar eliminar";*/
/********************************************************************
 *               C O N S U L T A     C O N T R A T O
 *******************************************************************/
/*include_once "../model/CONTRATO.php";
$objContrato = new CONTRATO();
$objContrato->setNoContrato(0);
$result = $objContrato->consultaContrato($objContrato->getNoContrato());
var_dump($result);*/
/********************************************************************
 *                       A D D     C O N T R A T O
 *******************************************************************/
/*include_once "../model/CONTRATO.php";
$objContrato = new CONTRATO();
$objContrato->setNoContrato(2);
$objContrato->setNoEmpleadoFk(58655210);
$objContrato->setNoClienteFk(2572742);
$objContrato->setNoVehiculoFk(1234);
$objContrato->setTipoContrato(1);
$objContrato->setPlazo(12);
$objContrato->setEnganche(45000);
$objContrato->setSaldo(100000);
$objContrato->setFormaPago("Efectivo");
$objContrato->setSubtotal($objContrato->getSaldo());
$objContrato->setIva($objContrato->getSubtotal()*0.16);
$objContrato->setTotal($objContrato->getSubtotal()+$objContrato->getIva());
echo $result = $objContrato->addContrato()? "Se registro correctamente el contrato ".$objContrato->getNoContrato():"Error al intentar registrar";*/
/********************************************************************
 *         U P D A T E     E S T A T U S     C O N T R A T O
 *******************************************************************/
/*include_once "../model/CONTRATO.php";
$objContrato = new CONTRATO();
echo $result = $objContrato->updateEstatusContrato(2,0)? "Se actualizo correctamente el estatus": "Error al intentar actualizar estatus";*/
/********************************************************************
 *                   D E L E T E     C O N T R A T O
 *******************************************************************/
/*include_once "../model/CONTRATO.php";
$objContrato = new CONTRATO();
echo $result = $objContrato->deleteContrato(2)?"Se elimino correctamente el contrato": "Error al intentar eliminar el contrato";*/


include "./controlCoche.php";
echo consultaCocheDetallesCompletos(true,0);

