<?php
include_once "./include/session.php";
$titulo = "Inicio ";
$idCoche =  (isset($_GET['idCoche'])) ? $_GET['idCoche'] : 0;
?>
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
                                <li class="breadcrumb-item"><a href="./catalogo.php">Catalogo</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Nueva Venta</li>
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
                                <h3 class="mb-0">Salida de Vehiculo - Venta</h3>
                            </div>
                        </div>
                    </div>
                    <!-- MultiStep Form -->
                    <div class="container-fluid" id="grad1">
                        <div class="row justify-content-center mt-0">
                            <div class="col-11 col-sm-9 col-md-7 col-lg-12 text-center p-0 mt-3 mb-2">
                                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                    <h2><strong>Ingrese la informaci??n necesaria para vender el vehiculo</strong></h2>
                                    <p>Llene toda la informaci??n que se requiere.</p>
                                    <div class="row">
                                        <div class="col-md-12 mx-0">
                                            <form id="msform">
                                                <!-- progressbar -->
                                                <ul id="progressbar">
                                                    <li class="active" id="account"><strong>Seleccion del Vehiculo</strong></li>
                                                    <li id="personal"><strong>Datos del Comprador</strong></li>
                                                    <li id="payment"><strong>Contrato de Venta</strong></li>
                                                    <li id="confirm"><strong>Terminar</strong></li>
                                                </ul> <!-- fieldsets -->
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-auto">
                                                                            <h3 class="mb-0">DATOS DEL VEHICULO</h3>
                                                                        </div>
                                                                        <div class="col text-right">
                                                                            <!-- Button buscar coche modal -->
                                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buscaVechiculoModal">
                                                                                <i class="fas fa-search"></i> Seleccionar vehiculo
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <input type="hidden" name="noCoche" id="noCoche" readonly value="<?php echo $idCoche;?>">
                                                                    <div class="pl-lg-4">
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <label class="form-control-label" for="marca">Marca</label>
                                                                                <input type="text"  id="marca" class="form-control" readonly>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label class="form-control-label" for="id_modelo_fk">Modelo</label>
                                                                                <input type="text" id="id_modelo_fk" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="anio">A??o</label>
                                                                                    <input type="numeric" id="anio" class="form-control" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="placa">Placa</label>
                                                                                    <input type="text"  id="placa" class="form-control" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="entidad_placa">Entidad Federativa</label>
                                                                                    <input type="text" id="entidad_placa" class="form-control" readonly>
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
                                                                                    <input id="color" class="form-control" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="kilometros">Kilometraje</label>
                                                                                    <input type="text"  id="kilometros" class="form-control" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <label class="form-control-label" for="transmision">Trasmision</label>
                                                                                <input type="text" id="transmision" class="form-control" readonly>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <label class="form-control-label" for="combustible">Combustible</label>
                                                                                <input type="text" id="combustible" class="form-control" readonly>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <label class="form-control-label" for="no_puertas">No de Puertas</label>
                                                                                <input type="text" id="no_puertas" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="nivCoche">NIV</label>
                                                                                    <input type="text" id="nivCoche" class="form-control" readonly >
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="observaciones">Observaciones</label>
                                                                                    <input type="text" id="observaciones" class="form-control" readonly>
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
                                                                            <h3 class="mb-0">DATOS DEL COMPRADOR</h3>
                                                                        </div>
                                                                        <div class="col text-right">
                                                                            <!-- Button trigger modal -->
                                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buscaClienteModal">
                                                                                <i class="fas fa-search"></i> Buscar Cliente
                                                                            </button>
                                                                            <button type="button" class="btn btn-primary" onclick="limpiarCliente();">Registrar Nuevo</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <input type="hidden" name="no_cliente" id="no_cliente" value="0">
                                                                    <h6 class="heading-small text-muted mb-4">Informaci??n del Cliente</h6>
                                                                    <div class="pl-lg-4">
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="nombre"><span class="obliga">*</span>Nombre</label>
                                                                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="apaterno"><span class="obliga">*</span>Primer Apellido</label>
                                                                                    <input type="text" name="apaterno" id="apaterno" class="form-control" placeholder="Primer Apellido" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="amaterno"><span class="obliga">*</span>Segundo Apellido</label>
                                                                                    <input type="text" name="amaterno" id="amaterno" class="form-control" placeholder="Segundo Apellido" required>
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
                                                                                    <label class="form-control-label" for="telefono"><span class="obliga">*</span>Telefono</label>
                                                                                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="No. Telefono" required>
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
                                                                    <h6 class="heading-small text-muted mb-4">Direcci??n</h6>
                                                                    <div class="pl-lg-4">
                                                                        <div class="row">
                                                                            <div class="col-lg-8">
                                                                                <div class="form-group">
                                                                                    <input type="hidden" id="id_dir" name="id_dir">
                                                                                    <label class="form-control-label" for="calle"><span class="obliga">*</span>Calle</label>
                                                                                    <input type="text" id="calle" name="calle" class="form-control" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-2">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="noExtEmp"><span class="obliga">*</span>No Ext.</label>
                                                                                    <input type="text" id="noExtEmp" name="noExtEmp" class="form-control" required>
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
                                                                                    <label class="form-control-label" for="coloniaEmpr"><span class="obliga">*</span>Colonia</label>
                                                                                    <input type="text" id="coloniaEmpr" name="coloniaEmpr" class="form-control" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="municipio"><span class="obliga">*</span>Municipio</label>
                                                                                    <input type="text" id="municipio" name="municipio" class="form-control" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-2">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="correo"><span class="obliga">*</span>CP</label>
                                                                                    <input type="numeric" id="cpEmpr" name="cpEmpr" class="form-control" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="correo">Estado</label>
                                                                                    <select name="estadoEmp" id="estadoEmp" class="form-control">
                                                                                        <option value="AGU">Aguascalientes</option>
                                                                                        <option value="BCN">Baja California</option>
                                                                                        <option value="BCS">Baja California Sur</option>
                                                                                        <option value="CAM">Campeche</option>
                                                                                        <option value="CHP">Chiapas</option>
                                                                                        <option value="CHH">Chihuahua</option>
                                                                                        <option value="CDMX">Ciudad de M??xico</option>
                                                                                        <option value="COA">Coahuila</option>
                                                                                        <option value="COL">Colima</option>
                                                                                        <option value="DUR">Durango</option>
                                                                                        <option value="MEX" selected>Estado de M??xico</option>
                                                                                        <option value="GUA">Guanajuato</option>
                                                                                        <option value="GRO">Guerrero</option>
                                                                                        <option value="HID">Hidalgo</option>
                                                                                        <option value="JAL">Jalisco</option>
                                                                                        <option value="MIC">Michoac??n</option>
                                                                                        <option value="MOR">Morelos</option>
                                                                                        <option value="NAY">Nayarit</option>
                                                                                        <option value="NLE">Nuevo Le??n</option>
                                                                                        <option value="OAX">Oaxaca</option>
                                                                                        <option value="PUE">Puebla</option>
                                                                                        <option value="QUE">Quer??taro</option>
                                                                                        <option value="ROO">Quintana Roo</option>
                                                                                        <option value="SLP">San Luis Potos??</option>
                                                                                        <option value="SIN">Sinaloa</option>
                                                                                        <option value="SON">Sonora</option>
                                                                                        <option value="TAB">Tabasco</option>
                                                                                        <option value="TAM">Tamaulipas</option>
                                                                                        <option value="TLA">Tlaxcala</option>
                                                                                        <option value="VER">Veracruz</option>
                                                                                        <option value="YUC">Yucat??n</option>
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
                                                                    <!-- Address -->
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
                                                                                    <select id="medio_identificacion" name="medio_identificaci??n" class="form-control">
                                                                                        <option value="INE">INE</option>
                                                                                        <option value="PASAPORTE">Pasaporte</option>
                                                                                        <option value="CEDULA">C??dula Profesional</option>
                                                                                        <option value="CARTILLA">Cartilla de Servicio Militar</option>
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
                                                                                        <option value="0">Persona F??sica</option>
                                                                                        <option value="1">Persona Moral</option>
                                                                                        <option value="2">NA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group d-none" id="fechaRegistroCliente">
                                                                                    <label class="form-control-label" for="fecha_registro_Cliente">Fecha Registro</label>
                                                                                    <input type="text" id="fecha_registro_Cliente" name="fecha_registro_Cliente" class="form-control" placeholder="Fall??" disabled="">
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
                                                                    <h3 class="mb-0">Informaci??n del contrato de Venta</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <!-- Address -->

                                                            <div class="pl-lg-4 d-none" id="containerAvales">
                                                                <div id="containerAvales">
                                                                    <h6 class="heading-small text-muted mb-4">Avales</h6>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label" for="nombreAva1">Nombre Completo</label>
                                                                                <input type="text" name="nombreAva1" id="nombreAva1" class="form-control" placeholder="Escriba el nombre completo del primer aval">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label" for="telaval1">Tel??fono</label>
                                                                                <input type="text" name="telaval1" id="telaval1" class="form-control" placeholder="Tel??fono del Aval">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label" for="dirAval1">Direccion completa del Aval 1</label>
                                                                                <input type="text" name="dirAval1" id="dirAval1" class="form-control" placeholder="Escriba el nombre completo del primer aval">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label" for="nombreAval2">Nombre Completo</label>
                                                                                <input type="text" name="nombreAval2" id="nombreAval2" class="form-control" placeholder="Escriba el nombre completo del segundo aval">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label" for="telAval2">Tel??fono</label>
                                                                                <input type="text" name="telAval2" id="telAval2" class="form-control" placeholder="Telefono del Aval">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label" for="dirAval2">Direccion completa del Aval 2</label>
                                                                                <input type="text" name="dirAval2" id="dirAval2" class="form-control" placeholder="Escriba el nombre completo del primer aval">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h6 class="heading-small text-muted mb-4">Pago Inicial</h6>
                                                            <div class="pl-lg-4">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <label class="form-control-label" for="datetimeFirma">Fecha del Contrato</label>
                                                                        <input id="datetimeFirma" type="datetime-local" name="datetimeFirma" value="<?php echo date("Y-m-d");?>T10:00:00" min="2000-01-01T00:00:00"  required="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label" for="precio_contado">Precio de Lista:</label>
                                                                            <input class="form-control" type="number" id="precio_contado" name="precio_contado" min="0" max="1000000" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row d-none" id="selectedCredito">
                                                                    <div class="col-md-6"></div>
                                                                    <div class="col-md-6 ">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label " for="precio_credito">Precio a Credito:</label>
                                                                            <input class="form-control" type="number" id="precio_credito" name="precio_credito" min="0" max="1000000" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row" id="containerEnganche">
                                                                    <div class="col-md-6">
                                                                        <label class="form-control-label" for="forma_pago">Elija modo de pago</label>
                                                                        <select  id="forma_pago" name="forma_pago" class="form-control">
                                                                            <option selected="" value="0">Contado</option>
                                                                            <option value="1">Credito</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <span class="form-control-label" id="engancheSpan" for="enganche">Pagar / Apartar Con:</span>
                                                                            <input class="form-control" type="number" id="enganche" name="enganche" min="0" max="1000000" value="0">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6"></div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label" for="total">Saldo por liquidar:</label>
                                                                            <input class="form-control" type="number" id="total" name="total" min="0" max="1000000" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Uso exclusivo de credito -->
                                                            <div id="creditoContainer" class="d-none">
                                                                <hr class="my-4">
                                                                <h6 class="heading-small text-muted mb-4">Plazo de los pagos Inicial</h6>
                                                                <div class="pl-lg-4" id="containerFechasCredito">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label class="form-control-label" for="plazo">Elija un plazo</label>
                                                                            <select id="plazo" name="plazo" class="form-control">
                                                                                <option value="0">Seleccione un plazo</option>
                                                                                <option value="1">1 Mes</option>
                                                                                <option value="3">3 Meses</option>
                                                                                <option value="6">6 Meses</option>
                                                                                <option value="12">12 Meses</option>
                                                                                <option value="18">18 Meses</option>
                                                                                <option value="24">24 Meses</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label" for="mensualidad">Pago por mes:</label>
                                                                                <input class="form-control" type="number" id="mensualidad" name="mensualidad" min="0" max="1000000" readonly value="0">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" id="selectedCredito">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label" for="observacionesContrato">Observaciones</label>
                                                                                <textarea class="form-control" id="observacionesContrato" name="observacionesContrato" rows="3" placeholder="Escriba las observaciones que se mostraran el la Carta Responsiva"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label" for="fecha_primer_pago">Elija d??a de primer pago:</label>
                                                                                <input type="date" id="fecha_primer_pago" name="fecha_primer_pago" value="<?php echo date("Y-m-d");?>" min="<?php echo date("Y-m-d");?>" max="2050-12-31"></div>
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
                                                                    <h3 class="mb-0">SE HA REGISTRADO UNA VENTA DE VEHICULO</h3>
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
                                                                <div class="row justify-content-center py-5" id="containerBotonesContratos">
                                                                    <div class="col-lg-12 col-auto" id="botonesContrato"> </div>
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
        <?php include './modals/modal-busca-coche.php'; ?>
        <?php include './modals/modal-busca-cliente.php'; ?>
    </div>
</div>

</body>
<?php include './include/js.php'; ?>
</html>
<script src="../ajax/payment.js"></script>
<script src="../ajax/control-compra-venta.js"></script>
<script src="../ajax/control-venta.js"></script>
<script src="../ajax/swal-messages.js"></script>
