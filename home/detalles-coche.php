<?php
$noCoche = $_GET['idCoche'];
?>
<?php include_once "./include/session.php"?>
<?php $titulo = "Detalles del coche " ?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once "./include/header.php"?>
</head>

<style>
    .mano{
        cursor: pointer !important;
    }
</style>
<body>
<?php include_once "./include/sidebar.php"?>
<!-- Main content -->
<div class="main-content" id="panel">
    <?php include_once "./include/nav.php"?>
    <!-- Header -->
    <div id="headerCar" class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(https://cdn.motor1.com/images/mgl/zOvpW/s3/volkswagen-id.4-2021-primera-prueba.jpg); background-size: cover; background-position: center center;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white" id="nameVehiculo"></h1>
                    <p class="text-white mt-0 mb-5" id="infoCoche">

                    </p>
                </div>
            </div>
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-auto">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="./catalogo.php">Catalogo de Coches</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detalles del Coche</li>
                        </ol>
                    </nav>
                </div>
                <input type="hidden" id="noCoche" value="<?php echo $noCoche;?>">
                <div class="col-lg-6 col-auto text-right" id="containerBotonCoche">
                    <!-- Mandar a JS para predefinir dependiendo del estado del coche-->

                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Placa</h5>
                                    <span class="h1 font-weight-bold mb-0" id="PlacaInfo"></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="fas fa-car"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Fotos</h5>
                                    <span class="h1 font-weight-bold mb-0"id="countFotos"></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Precio de Lista</h5>
                                    <span class="h1 font-weight-bold mb-0" id="precioLista">$250,000</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Precio a Credito</h5>
                                    <span class="h1 font-weight-bold mb-0" id="precioCredito">$</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-4 order-xl-1">
                <div class="card card-profile">
                    <div id="carouselCocheFotos" class="carousel slide card-img-top" data-ride="carousel">
                        <!-- AJAX RESPONSE CAROUSEL-->
                    </div>
                    <!--- Tablas de fotos de vehiculo--->
                    <div class="col-xl-12 py-3">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="mb-0">Fotos del vehiculo</h3>
                                    </div>
                                    <div class="col text-right">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddFotoCoche">
                                            <i class="fas fa-upload text-white"></i> Agregar Foto
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <!-- Projects table -->
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Preview</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tblfotosCoche">
                                    <!-- AJAX RESPONSE -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 py-3">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="mb-0">Más caracteristicas:</h3>
                                        </div>
                                        <div class="col text-right">
                                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addCaracteristicas"><i class="fas fa-plus"></i> Añadir</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush">
                                        <tbody id="tbl-detalles">
                                        <!-- AJAX RESPONSE TABLA DETALLES -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-2">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Ficha Técnica</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="frm-update-datos-coche">
                            <input type="hidden" name="idCoche" id="idCoche" >
                            <h6 class="heading-small text-muted mb-4">Detalles del coche</h6>
                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="form-control-label" for="marca"><span class="obliga">*</span> Marca</label>
                                        <select id="marca" name="marca" class="form-control">  </select>
                                        <!-- AJAX RESPONSE-->
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-control-label" for="modelo"><span class="obliga">*</span>Modelo</label>
                                        <select id="modelo" name="modelo" class="form-control">  </select>
                                        <!-- AJAX RESPONSE-->
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-control-label" for="tipoVehiculo"><span class="obliga">*</span>Tipo</label>
                                        <select id="tipoVehiculo" name="tipoVehiculo" class="form-control">
                                            <option value="0">URBANO</option>
                                            <option value="1">SUBCOMPACTO</option>
                                            <option value="2">COMPACTO</option>
                                            <option value="3">FAMILIAR</option>
                                            <option value="4">SEDAN</option>
                                            <option value="5">BERLINA</option>
                                            <option value="6">DESCAPOTABLE</option>
                                            <option value="7">COUPE</option>
                                            <option value="8">DEPORTIVO</option>
                                            <option value="9">SUV</option>
                                            <option value="10">TODO TERRENO</option>
                                            <option value="11">PICK UP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="anio"><span class="obliga">*</span>Año</label>
                                            <select id="anio" name="anio" class="form-control"></select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="placa"><span class="obliga">*</span>Placa</label>
                                            <input type="text" name="placa" id="placa" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="estado"><span class="obliga">*</span>Entidad Federativa</label>
                                            <select name="estado" id="estado" class="form-control">
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
                                            <label class="form-control-label" for="color"><span class="obliga">*</span>Color</label>
                                            <input id="color" name="color" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="kilometraje"><span class="obliga">*</span>Kilometraje</label>
                                            <input  class="form-control" type="number" id="kilometraje" name="kilometraje" min="0" max="1000000">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="form-control-label" for="transmision"><span class="obliga">*</span>Trasmision</label>
                                        <select id="transmision" name="transmision" class="form-control">
                                            <option value="AU">AUTOMATICA</option>
                                            <option value="MA">MANUAL</option>
                                            <option value="DU">DUAL</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-control-label" for="combustible"><span class="obliga">*</span>Combustible</label>
                                        <select id="combustible" name="combustible" class="form-control">
                                            <option value="GAS">Gasolina</option>
                                            <option value="DIE">Diesel</option>
                                            <option value="ELE">Electrico</option>
                                            <option value="HIB">Hibrido</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-control-label" for="nopuertas"><span class="obliga">*</span>No de Puertas</label>
                                        <select id="nopuertas" name="nopuertas" class="form-control">
                                            <option value="0">0</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="form-control-label" for="niv"><span class="obliga">*</span>NIV</label>
                                        <input type="text" name="niv" id="niv" class="form-control">
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="noMotor"><span class="obliga">*</span>No. Motor</label>
                                            <input type="text" id="noMotor" name="noMotor" class="form-control" placeholder="Número de Motor" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="noSerieV"><span class="obliga">*</span>Serie Vehicular</label>
                                            <input type="text" id="noSerieV" name="noSerieV" class="form-control" placeholder="Número de Serie Vehicular" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="carroceria"><span class="obliga">*</span>Carroceria</label>
                                            <input type="text" id="carroceria" name="carroceria" class="form-control" placeholder="Estado de la carroceria" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="pintura"><span class="obliga">*</span>Pintura</label>
                                            <input type="text" id="pintura" name="pintura" class="form-control" placeholder="Estado de la pintura" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="llantas"><span class="obliga">*</span>Llantas</label>
                                            <input type="text" id="llantas" name="llantas" class="form-control" placeholder="Estado de las llantas" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="fecha_registro">Observaciones</label>
                                            <textarea class="form-control" name="observaciones" id="observaciones" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <h6 class="heading-small text-muted mb-4">Situacion Legal</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="noFactura"><span class="obliga">*</span>Factura</label>
                                            <input id="noFactura" name="noFactura" class="form-control" placeholder="No/Folio Factura">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="kilometros"><span class="obliga">*</span>Fecha de Expedición</label>
                                            <input type="date" id="fecha_primer_pago" name="fecha_primer_pago" value="<?php echo date("Y-m-d");?>" min="2000-01-01" max="<?php echo date("Y-m-d");?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="empresaExpide"><span class="obliga">*</span>Empresa Emisora</label>
                                            <input id="empresaExpide" name="empresaExpide" class="form-control" placeholder="Nombre de la empresa que expide la factura">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="dirFactura"><span class="obliga">*</span>Direccion Factura</label>
                                            <input id="dirFactura" name="dirFactura" class="form-control" placeholder="Escriba dirección completa como en la factura">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label class="form-control-label" for="tarjeton">Targeton</label>
                                        <select id="tarjeton" name="tarjeton" class="form-control">
                                            <option value="1">SI</option>
                                            <option value="0" selected>NO</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="folioTarjeton">Folio Tarjetón</label>
                                            <input id="folioTarjeton" name="folioTarjeton" class="form-control" placeholder="Folio del Tarjetón">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-control-label" for="tarjectaCirc">Tarjeta Circualación</label>
                                        <select id="tarjectaCirc" name="tarjectaCirc" class="form-control">
                                            <option value="1" selected>SI</option>
                                            <option value="0" >NO</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-control-label" for="folioTarjCirc"><span class="obliga">*</span>Folio Tarjeta Circulación</label>
                                        <input id="folioTarjCirc" name="folioTarjCirc" class="form-control" placeholder="Folio Tarjeta de Circulación">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="combustible"><span class="obliga">*</span>Última Tenencia</label>
                                            <select id="ultimaTenencia" name="ultimaTenencia" class="form-control"></select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="verificaciones"><span class="obliga">*</span>Verificaciones</label>
                                            <select id="verificaciones" name="verificaciones" class="form-control">
                                                <option value="1"selected>SI</option>
                                                <option value="0" >NO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="fecha_registro">Registro Sistema</label>
                                            <input type="text" name ="fecha_registro" id="fecha_registro" class="form-control" placeholder="Falló" disabled="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Costos del coche</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-control-label" for="empresa">Ofrecer Credito</label>
                                            <label class="custom-toggle text-center" id="checkOpcCredit" name="checkOpcCredit" >

                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="form-control-label" for="empresa"><span class="obliga">*</span>Precio de Lista</label>
                                            <input  class="form-control" type="number" id="precioListaCoche" name="precioLista" min="0" max="1000000">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="form-control-label" for="rfc">Precio a Credito</label>
                                            <input  class="form-control" type="number" id="precioCreditoCoche" name="precioCredito" min="0" max="1000000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Description -->
                            <div class="col-lg-12 col-auto text-right">
                                <span class="d-flex position-absolute w-100" id="mensajeUpdateCoche"></span>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!--- Tablas de documentos de vehiculo--->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Documentos del Vehiculo</h3>
                            </div>
                            <div class="col text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addArchivoCoche">
                                    <i class="fas fa-file-upload text-white"></i>  Agregar Archivo
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Archivo</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Detalles</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody id="tblDocsCoche">
                            <!-- AJAX RESPONSE DOCS CAR-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="conteinerContratos">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Documentacion de contratos</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body pt-0 py-3">
                            <ul class="nav nav-tabs align-items-center" id="myTab" role="tablist">
                                <!-- AJAX RESPONSE TAB/NAV-->
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <!-- AJAX CONTAINER CONTRATOS-->
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './include/footer.php'; ?>
        <?php include './modals/modal-add-abono.php'; ?>
        <?php include './modals/modal-add-foto-coche.php'; ?>
        <?php include './modals/modal-add-caracteristica.php'; ?>
        <?php include './modals/modal-add-archivo-contratoAdq.php'; ?>
        <?php include './modals/modal-add-archivo-vehiculo.php'; ?>
        <?php include './modals/modal-add-tipo-archivo.php'; ?>
    </div>
</div>
</body>
<?php include './include/js.php'; ?>
</html>
<script src="../ajax/tools.js"></script>
<script src="../ajax/aniosCoches.js"></script>
<script src="../ajax/control-botones-detalles-coche.js"></script>
<script src="../ajax/control-abonos.js"></script>
<script src="../ajax/sendDocmentos.js"></script>
<script src="../ajax/car-update.js"></script>
<script src="../ajax/control-detalles-coche.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $('#modalejemplo').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Subir archivo al Contrato No. ' + recipient)
        //  modal.find('.modal-body input .contrato').val(recipient)
        modal.find('.no_contrato').val(recipient)
    })
</script>
<script>
    $('#exampleModal1').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Abonar al Credito: ' + recipient)
        modal.find('.abono').val(recipient)
    })
</script>