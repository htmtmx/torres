<?php
/*include_once "../model/MODELO.php";
$obj_modelo = new MODELO();
$obj_modelo->setIdMarcaFk(3);
$result= $obj_modelo->consultaModelos();
var_dump($result);*/

/*include_once "../model/MARCA.php";
$obj_marca = new MARCA();
$obj_marca->setIdMarca(4);
$result= $obj_marca->getListModelos();
var_dump($result);*/

/*include_once "../model/MARCA.php";
$obj_listmarca = new MARCA();
$result = $obj_listmarca->listMarcas();
var_dump($result);*/

/*include_once "../model/MODELO.php";
$objModel = new MODELO();
$objModel->setIdMarcaFk(27);
$objModel->setNombre("Modelo ".$objModel->getIdMarcaFk());
$result = $objModel->addModelo($objModel->getIdMarcaFk(),$objModel->getNombre())?"Se registro correctamente el modelo ".$objModel->getNombre():"";
var_dump($result);*/

/*include_once "../model/MODELO.php";
$objModel = new MODELO();
$objModel->setIdModelo(408);
$objModel->setIdMarcaFk(16);
$objModel->setNombre("Modelo ".$objModel->getIdMarcaFk());
$objModel->setEstatus(3);
$result = $objModel->updateModelo() ? "Se actualizo correctamente":"";*/

/*include_once "../model/MODELO.php";
$objModel = new MODELO();
echo $objModel->deleteModelo(408)?"Se elimino correctamente":"";*/

/*include_once "../model/MODELO.php";
$objModel = new MODELO();
$result = $objModel->consultaModelo(407);
var_dump($result);*/

/*include_once "../model/COCHE.php";
$objCoche = new COCHE();
$result = $objCoche->consultaCoches(0);
var_dump($result);*/

/*include_once "../model/COCHE.php";
$objCoche = new COCHE();
$objCoche->setNoVehiculo(666);
$objCoche->setIdModeloFk(407);
$objCoche->setAnio(2021);
$objCoche->setPlaca("480-546");
$objCoche->setEntidadPlaca("GUERRERO");
$objCoche->setColor("NEGRO");
$objCoche->setKilometros(0);
$objCoche->setTransimision("ST");
$objCoche->setCombustible("Gas");
$objCoche->setNoPuertas(2);
$objCoche->setPrecioContado(345000);
$objCoche->setPrecioCredito(395000);
$objCoche->setOpcCredito(2);
$objCoche->setObservaciones("Ningun detalle, impecable");
$objCoche->setEstatus(0);
$result = $objCoche->addCoche()?"Se registro correctamente el coche ".$objCoche->getNoVehiculo():"";
var_dump($result);*/

/*include_once "../model/COCHE.php";
$objCoche = new COCHE();
$objCoche->setNoVehiculo(666);
$objCoche->setIdModeloFk(400);
$objCoche->setAnio(2020);
$objCoche->setPlaca("666-666");
$objCoche->setEntidadPlaca("CDMX");
$objCoche->setColor("BLANCO");
$objCoche->setKilometros(1);
$objCoche->setTransimision("AU");
$objCoche->setCombustible("DIESEL");
$objCoche->setNoPuertas(3);
$objCoche->setPrecioContado(300000);
$objCoche->setPrecioCredito(350000);
$objCoche->setOpcCredito(2);
$objCoche->setObservaciones("Muchos detalles");
$objCoche->setEstatus(0);
$result = $objCoche->updateCoche() ? "Se actualizo correctamente":"";*/

/*include_once "../model/COCHE.php";
$objCoche = new COCHE();
$result = $objCoche->deleteCoche(666)?"Se elimino correctamente el coche":"";
return $result;*/

/*include_once "../model/CLIENTES.php";
$objCliente = new CLIENTES();
$objCliente->setNoCliente(666);
$objCliente->setNombre("Inocencio");
$objCliente->setApaterno("Rodriguez");
$objCliente->setAmaterno("Melendez");
$objCliente->setTelefono("5939150205");
$objCliente->setCelular("5587794613");
$objCliente->setCorreo("correo@gmail.com");
$objCliente->setSubscripcion(1);
$objCliente->setEmpresa("Reckrea");
$objCliente->setRfc("SRPOc6846989");
$objCliente->setMedioIdentificación("INE");
$objCliente->setFolio("688798798");
$objCliente->setTipoCliente(1);
$result = $objCliente->addCliente()? "Se registro correctamente al cliente":"";
var_dump($result);*/

/*include_once "../model/CLIENTES.php";
$objCliente = new CLIENTES();
$result = $objCliente->consultaCliente(666);
var_dump($result);*/

/*include_once "../model/CLIENTES.php";
$objCliente = new CLIENTES();
$objCliente->setNoCliente(666);
$objCliente->setNombre("Patricio");
$objCliente->setApaterno("Murrieta");
$objCliente->setAmaterno("Godinez");
$objCliente->setTelefono("55");
$objCliente->setCelular("593");
$objCliente->setCorreo("n@gmail.com");
$objCliente->setSubscripcion(3);
$objCliente->setEmpresa(" S.A. de C.V.");
$objCliente->setRfc("R687496HGRTD");
$objCliente->setMedioIdentificación("Acta ");
$objCliente->setFolio("2185");
$objCliente->setTipoCliente(3);
$objCliente->setEstatus(1);
$objCliente->setSystemState(1);
$result = $objCliente->updateCliente();*/

/*
 * H A S T A      U P D A T E      C L I E N T E S
 * */
