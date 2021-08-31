<?php include_once "./include/session.php"?>
<?php $titulo = "Ingresar Vehiculo " ?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once "./include/header.php"?>
</head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
<link rel="stylesheet" href="../assets/css/compra-venta.css">
<body>
<?php include_once "./include/sidebar.php"?>

<!-- Main content -->
<div class="main-content" id="panel">
    <?php include_once "./include/nav.php"?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-auto">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="./">Inicio</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Nueva Adquisición</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Ingreso de Vehiculo - Compra</h3>
                            </div>
                        </div>
                    </div>
                    <!-- MultiStep Form -->
                    <div class="container-fluid" id="grad1">
                        <div class="row justify-content-center mt-0">
                            <div class="col-11 col-sm-9 col-md-7 col-lg-12 text-center p-0 mt-3 mb-2">
                                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                    <h2><strong>Ingrese la informacioón de compra de vehiculo</strong></h2>
                                    <p>Llene toda la información que se requiere.</p>
                                    <div class="row">
                                        <div class="col-md-12 mx-0">
                                            <form id="msform">
                                                <!-- progressbar -->
                                                <ul id="progressbar">
                                                    <li class="active" id="account"><strong>Datos del Vehiculo</strong></li>
                                                    <li id="personal"><strong>Datos del Vendedor</strong></li>
                                                    <li id="payment"><strong>Contrato ded Adquisición</strong></li>
                                                    <li id="confirm"><strong>Terminar</strong></li>
                                                </ul> <!-- fieldsets -->
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-12">
                                                                            <h3 class="mb-0">Datos del vehiculo</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <input type="hidden" name="noCoche" id="noCoche" value="0">
                                                                    <div class="pl-lg-4">
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <label class="form-control-label" for="marcaCoche">Marca</label>
                                                                                <select id="marcaCoche" name="marcaCoche" class="form-control">
                                                                                    <!-- AJAX RESPONSE GENERAR MARCAS Y MODELOS -->
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label class="form-control-label" for="id_modelo_fk">Modelo</label>
                                                                                <select id="id_modelo_fk" name="id_modelo_fk" class="form-control">
                                                                                    <!-- AJAX RESPONSE GENERAR MODELOS ON CHANGE MARCAS-->
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="anio">Año</label>
                                                                                    <input type="numeric" name="anio" id="anio" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="placa">Placa</label>
                                                                                    <input type="text" name="placa" id="placa" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="entidad_placa">Entidad Federativa</label>
                                                                                    <select name="entidad_placa" id="entidad_placa" class="form-control">
                                                                                        <option value="AGU">Aguascalientes</option>
                                                                                        <option value="BCN">Baja California</option>
                                                                                        <option value="BCS">Baja California Sur</option>
                                                                                        <option value="CAM">Campeche</option>
                                                                                        <option value="CHP">Chiapas</option>
                                                                                        <option value="CHH">Chihuahua</option>
                                                                                        <option value="CDMX">Ciudad de México</option>
                                                                                        <option value="COA">Coahuila</option>
                                                                                        <option value="COL">Colima</option>
                                                                                        <option value="DUR">Durango</option>
                                                                                        <option value="MEX">Estado de México</option>
                                                                                        <option value="GUA">Guanajuato</option>
                                                                                        <option value="GRO">Guerrero</option>
                                                                                        <option value="HID">Hidalgo</option>
                                                                                        <option value="JAL">Jalisco</option>
                                                                                        <option value="MIC">Michoacán</option>
                                                                                        <option value="MOR">Morelos</option>
                                                                                        <option value="NAY">Nayarit</option>
                                                                                        <option value="NLE">Nuevo León</option>
                                                                                        <option value="OAX">Oaxaca</option>
                                                                                        <option value="PUE">Puebla</option>
                                                                                        <option value="QUE">Querétaro</option>
                                                                                        <option value="ROO">Quintana Roo</option>
                                                                                        <option value="SLP">San Luis Potosí</option>
                                                                                        <option value="SIN">Sinaloa</option>
                                                                                        <option value="SON">Sonora</option>
                                                                                        <option value="TAB">Tabasco</option>
                                                                                        <option value="TAM">Tamaulipas</option>
                                                                                        <option value="TLA">Tlaxcala</option>
                                                                                        <option value="VER">Veracruz</option>
                                                                                        <option value="YUC">Yucatán</option>
                                                                                        <option value="ZAC">Zacatecas</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="my-4">
                                                                    <!-- Address -->
                                                                    <h6 class="heading-small text-muted mb-4">Caracteristicas</h6>
                                                                    <div class="pl-lg-4">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="color">Color</label>
                                                                                    <input id="color" name="color" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="kilometros">Kilometraje</label>
                                                                                    <input class="form-control" type="number" id="kilometros" name="kilometros" min="0" max="1000000">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <label class="form-control-label" for="transmision">Trasmision</label>
                                                                                <select id="transmision" name="transmision" class="form-control">
                                                                                    <option value="AU">AUTOMATICA</option>
                                                                                    <option value="MA">MANUAL</option>
                                                                                    <option value="DU">DUAL</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <label class="form-control-label" for="combustible">Combustible</label>
                                                                                <select id="combustible" name="combustible" class="form-control">
                                                                                    <option value="GAS">Gasolina</option>
                                                                                    <option value="DIE">Diesel</option>
                                                                                    <option value="ELE">Electrico</option>
                                                                                    <option value="HIB">Hibrido</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <label class="form-control-label" for="no_puertas">No de Puertas</label>
                                                                                <input class="form-control" type="number" id="no_puertas" name="no_puertas" min="0" max="6">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="nivCoche">NIV</label>
                                                                                    <input type="text" id="nivCoche" name="nivCoche" class="form-control" placeholder="Numero de Identificacion Vehicular" >
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="observaciones">Observaciones</label>
                                                                                    <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="button" name="next" class="btn btn-primary next action-button" value="Siguiente" />
                                                </fieldset>

                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-auto">
                                                                            <h3 class="mb-0">DATOS DEL VENDEDOR</h3>
                                                                        </div>
                                                                        <div class="col text-right">
                                                                            <!-- Button trigger modal -->
                                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buscaClienteModal">
                                                                                <i class="fas fa-search"></i> Buscar Cliente
                                                                            </button>
                                                                            <button type="button" class="btn btn-primary" onclick="limpiarCliente();">Nuevo</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <input type="hidden" name="no_cliente" id="no_cliente" value="0">
                                                                    <h6 class="heading-small text-muted mb-4">Información del Cliente</h6>
                                                                    <div class="pl-lg-4">
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="nombre">Nombre</label>
                                                                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="apaterno">Primer Apellido</label>
                                                                                    <input type="text" name="apaterno" id="apaterno" class="form-control" placeholder="Primer Apellido">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="amaterno">Segundo Apellido</label>
                                                                                    <input type="text" name="amaterno" id="amaterno" class="form-control" placeholder="Segundo Apellido">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="correo">Correo Electronico</label>
                                                                                    <input type="email" name="correo" id="correo" class="form-control" placeholder="example@gmail.com">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="telefono">Telefono</label>
                                                                                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="No. Telefono">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="celular">Celular</label>
                                                                                    <input type="text" id="celular" name="celular" class="form-control" placeholder="No. Celular">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="my-4">
                                                                    <!-- Address -->
                                                                    <h6 class="heading-small text-muted mb-4">Dirección</h6>
                                                                    <div class="pl-lg-4">
                                                                        <div class="row">
                                                                            <div class="col-lg-8">
                                                                                <div class="form-group">
                                                                                    <input type="hidden" id="id_dir" name="id_dir">
                                                                                    <label class="form-control-label" for="calle">Calle</label>
                                                                                    <input type="text" id="calle" name="calle" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-2">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="noExtEmp">No Ext.</label>
                                                                                    <input type="text" id="noExtEmp" name="noExtEmp" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-2">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="noIntEmp">No Int.</label>
                                                                                    <input type="text" id="noIntEmp" name="noIntEmp" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="coloniaEmpr">Colonia</label>
                                                                                    <input type="text" id="coloniaEmpr" name="coloniaEmpr" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="municipio">Municipio</label>
                                                                                    <input type="text" id="municipio" name="municipio" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-2">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="cpEmpr">CP</label>
                                                                                    <input type="numeric" id="cpEmpr" name="cpEmpr" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="estadoEmp">Estado</label>
                                                                                    <select name="estadoEmp" id="estadoEmp" class="form-control">
                                                                                        <option value="AGU">Aguascalientes</option>
                                                                                        <option value="BCN">Baja California</option>
                                                                                        <option value="BCS">Baja California Sur</option>
                                                                                        <option value="CAM">Campeche</option>
                                                                                        <option value="CHP">Chiapas</option>
                                                                                        <option value="CHH">Chihuahua</option>
                                                                                        <option value="CDMX">Ciudad de México</option>
                                                                                        <option value="COA">Coahuila</option>
                                                                                        <option value="COL">Colima</option>
                                                                                        <option value="DUR">Durango</option>
                                                                                        <option value="MEX">Estado de México</option>
                                                                                        <option value="GUA">Guanajuato</option>
                                                                                        <option value="GRO">Guerrero</option>
                                                                                        <option value="HID">Hidalgo</option>
                                                                                        <option value="JAL">Jalisco</option>
                                                                                        <option value="MIC">Michoacán</option>
                                                                                        <option value="MOR">Morelos</option>
                                                                                        <option value="NAY">Nayarit</option>
                                                                                        <option value="NLE">Nuevo León</option>
                                                                                        <option value="OAX">Oaxaca</option>
                                                                                        <option value="PUE">Puebla</option>
                                                                                        <option value="QUE">Querétaro</option>
                                                                                        <option value="ROO">Quintana Roo</option>
                                                                                        <option value="SLP">San Luis Potosí</option>
                                                                                        <option value="SIN">Sinaloa</option>
                                                                                        <option value="SON">Sonora</option>
                                                                                        <option value="TAB">Tabasco</option>
                                                                                        <option value="TAM">Tamaulipas</option>
                                                                                        <option value="TLA">Tlaxcala</option>
                                                                                        <option value="VER">Veracruz</option>
                                                                                        <option value="YUC">Yucatán</option>
                                                                                        <option value="ZAC">Zacatecas</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="referencias">Referencias</label>
                                                                                    <input type="text" id="referencias" name="referencias" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h6 class="heading-small text-muted mb-4">Otros datos</h6>
                                                                    <div class="pl-lg-4">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="empresa">Empresa / Organizacion</label>
                                                                                    <input id="empresa" name="empresa" class="form-control" placeholder="Nombre Empresa">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="rfcCliente">RFC</label>
                                                                                    <input id="rfcCliente" name="rfcCliente" class="form-control" placeholder="RFC">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="medio_identificacion">Se identifica con:</label>
                                                                                    <select id="medio_identificacion" name="medio_identificación" class="form-control">
                                                                                        <option value="INE">INE</option>
                                                                                        <option value="PASAPORTE">Pasaporte</option>
                                                                                        <option value="CEDULA">Cédula Profesional</option>
                                                                                        <option value="LICENCIA">Licencia de Conducir</option>
                                                                                        <option value="INAPAM">INAPAM</option>
                                                                                        <option value="ESCOLAR">Credencial de Estudiante</option>
                                                                                        <option value="CERTIFICADO">Certificado Escolar</option>
                                                                                        <option value="TITULO">Título Profesional</option>
                                                                                        <option value="CARTILLA">Cartilla de Servicio Militar</option>
                                                                                        <option value="SEGURO">Credencial IMSS ISSSTE</option>
                                                                                        <option value="CEDULA">Cédula de Idedntificacion Ciudadana</option>
                                                                                        <option value="OTRO">Otro</option>
                                                                                        <option value="NONE">Ninguna</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="folio">Folio</label>
                                                                                    <input type="text" name="folio" id="folio" class="form-control" placeholder="Folio">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="tipo_cliente">Tipo de cliente</label>
                                                                                    <select id="tipo_cliente" name="tipo_cliente" class="form-control">
                                                                                        <option value="0">Persona Física</option>
                                                                                        <option value="1">Persona Moral</option>
                                                                                        <option value="2">NA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group d-none" id="fechaRegistroCliente">
                                                                                    <label class="form-control-label" for="fecha_registro_Cliente">Fecha Registro</label>
                                                                                    <input type="text" id="fecha_registro_Cliente" name="fecha_registro_Cliente" class="form-control" placeholder="Falló" disabled="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="button" name="previous" class="btn btn-primary previous action-button-previous" value="Anterior" />
                                                    <input type="button" name="next" class=" btn btn-primary next action-button" value="Siguiente" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="row align-items-center">
                                                                <div class="col-12">
                                                                    <h3 class="mb-0">Informacion del contrato de adquisicion</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                                <h6 class="heading-small text-muted mb-4">Generales</h6>
                                                                <div class="pl-lg-4">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <label class="form-control-label" for="forma_pago_compra">Forma de Pago</label>
                                                                            <select id="forma_pago_compra" name="forma_pago_compra" class="form-control">
                                                                                <option selected="" value="0">Contado</option>
                                                                                <option value="1">Credito</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <label class="form-control-label" for="total">Precio de compra</label>
                                                                                <input type="numeric" name="total" id="total" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <label class="form-control-label" for="subtotal_coche">Subtotal</label>
                                                                                <input type="numeric" name="subtotal_coche" id="subtotal_coche" class="form-control" readonly="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <label class="form-control-label" for="iva_coche">IVA</label>
                                                                                <input type="numeric" name="iva_coche" id="iva_coche" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr class="my-4">
                                                                <!-- Address -->
                                                                <h6 class="heading-small text-muted mb-4">Costos para el coche en Venta</h6>
                                                                <div class="pl-lg-4">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label" for="opc_credito_coche">Ofrecer Credito</label><br>
                                                                                <label class="custom-toggle text-center">
                                                                                    <input type="checkbox" checked="" name="opc_credito_coche" id="opc_credito_coche">
                                                                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Si"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label" for="precio_contado_compra">Precio de Lista</label>
                                                                                <input class="form-control" type="number" id="precio_contado_compra" name="precio_contado_compra" min="0" max="1000000">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label" for="precio_credito_compra">Precio a Credito</label>
                                                                                <input class="form-control" type="number" id="precio_credito_compra" name="precio_credito_compra" min="0" max="1000000">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <input type="button" name="previous" class="btn btn-primary previous action-button-previous " value="Anterior" />
                                                    <button type="submit" name="make_payment" class="btn btn-primary next action-button">Confirmar</button>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="row align-items-center">
                                                                <div class="col-12">
                                                                    <h3 class="mb-0">SE HA REGISTRADO UN NUEVO VEHICULO</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="pl-lg-4">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-3">
                                                                        <img src="https://i.gifer.com/XZ0q.gif" class="fit-image">
                                                                    </div>
                                                                </div> <br><br>
                                                                <div class="row justify-content-center">
                                                                    <div class="col-7 text-center">
                                                                        <h5>Hemos registrado un nuevo vehiculo</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row justify-content-center">
                                                                    <a href="./catalogo.php">
                                                                        <button type="button" class="btn btn-primary">
                                                                            <i class="fas fa-car-side"></i> Ir al catalogo
                                                                        </button>
                                                                    </a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './include/footer.php'; ?>
        <?php include './modals/modal-busca-cliente.php'; ?>
    </div>
</div>

</body>
<?php include './include/js.php'; ?>
</html>
<script src="../ajax/payment.js"></script>
<script src="../ajax/control-compra-venta.js"></script>
<script src="../ajax/control-ingreso.js"></script>
