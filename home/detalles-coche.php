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
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(https://cdn.motor1.com/images/mgl/zOvpW/s3/volkswagen-id.4-2021-primera-prueba.jpg); background-size: cover; background-position: center center;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white">Nissan Tiida 2015</h1>
                    <p class="text-white mt-0 mb-5">
                        Este coche ya fue vendido, por lo que puede agregar los documentos necesarios para respaldar
                    </p>
                </div>
            </div>
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-auto">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detalles del Coche</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-auto text-right">
                    <input type="text" id="noCoche" value="<?php echo $noCoche;?>">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cuentaUser">
                        <i class="fas fa-dollar-sign text-white"></i> Vender
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Documentos</h5>
                                    <span class="h1 font-weight-bold mb-0">5</span>
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
                                    <span class="h1 font-weight-bold mb-0">14</span>
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
                                    <span class="h1 font-weight-bold mb-0">$250,000</span>
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
                    <div class="card-body pt-0 py-3">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="mb-0">Mas caracteristicas:</h3>
                                        </div>
                                        <div class="col text-right">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cuentaUser">
                                                <i class="fas fa-plus"></i> Añadir
                                            </button>
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
                        <form id="frm-datos-cliente">
                            <input type="hidden" name="idCliente" id="idCliente" value="896610125442">
                            <h6 class="heading-small text-muted mb-4">Detalles del coche</h6>
                            <div class="pl-lg-4"><div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-control-label" for="medio_identificacion_cliente">NIV</label>
                                        <input type="text" name="telefono" id="telefono" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="form-control-label" for="medio_identificacion_cliente">Marca</label>
                                        <select id="medio_identificacion_cliente" name="medio_identificación_cliente" class="form-control">
                                            <option value="INE">Marca 1</option>
                                            <option value="PASAPORTE">Marca 2</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-control-label" for="medio_identificacion_cliente">Modelo</label>
                                        <select id="medio_identificacion_cliente" name="medio_identificación_cliente" class="form-control">
                                            <option value="INE">Modelo 1</option>
                                            <option value="PASAPORTE">Modelo 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="correo">Año</label>
                                            <input type="numeric" name="correo" id="correo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="telefono">Placa</label>
                                            <input type="text" name="telefono" id="telefono" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="celular">Entidad Federativa</label>
                                            <select name="estado" id="estado" class="form-control">
                                                <option value="Aguascalientes">Aguascalientes</option>
                                                <option value="Baja California">Baja California</option>
                                                <option value="Baja California Sur">Baja California Sur</option>
                                                <option value="Campeche">Campeche</option>
                                                <option value="Chiapas">Chiapas</option>
                                                <option value="Chihuahua">Chihuahua</option>
                                                <option value="CDMX">Ciudad de México</option>
                                                <option value="Coahuila">Coahuila</option>
                                                <option value="Colima">Colima</option>
                                                <option value="Durango">Durango</option>
                                                <option value="Estado de México" selected="">Estado de México</option>
                                                <option value="Guanajuato">Guanajuato</option>
                                                <option value="Guerrero">Guerrero</option>
                                                <option value="Hidalgo">Hidalgo</option>
                                                <option value="Jalisco">Jalisco</option>
                                                <option value="Michoacán">Michoacán</option>
                                                <option value="Morelos">Morelos</option>
                                                <option value="Nayarit">Nayarit</option>
                                                <option value="Nuevo León">Nuevo León</option>
                                                <option value="Oaxaca">Oaxaca</option>
                                                <option value="Puebla">Puebla</option>
                                                <option value="Querétaro">Querétaro</option>
                                                <option value="Quintana Roo">Quintana Roo</option>
                                                <option value="San Luis Potosí">San Luis Potosí</option>
                                                <option value="Sinaloa">Sinaloa</option>
                                                <option value="Sonora">Sonora</option>
                                                <option value="Tabasco">Tabasco</option>
                                                <option value="Tamaulipas">Tamaulipas</option>
                                                <option value="Tlaxcala">Tlaxcala</option>
                                                <option value="Veracruz">Veracruz</option>
                                                <option value="Yucatán">Yucatán</option>
                                                <option value="Zacatecas">Zacatecas</option>
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
                                            <label class="form-control-label" for="empresa">Color</label>
                                            <input id="empresa" name="empresa" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="rfc">Kilometraje</label>
                                            <input  class="form-control" type="number" id="km" name="km" min="0" max="1000000">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="form-control-label" for="medio_identificacion_cliente">Trasmision</label>
                                        <select id="medio_identificacion_cliente" name="medio_identificación_cliente" class="form-control">
                                            <option value="INE">AUTOMATICA</option>
                                            <option value="PASAPORTE">MANUAL</option>
                                            <option value="PASAPORTE">DUAL</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-control-label" for="medio_identificacion_cliente">Combustible</label>
                                        <select id="medio_identificacion_cliente" name="medio_identificación_cliente" class="form-control">
                                            <option value="INE">Gasolina</option>
                                            <option value="PASAPORTE">Diesel</option>
                                            <option value="PASAPORTE">Electrico</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-control-label" for="medio_identificacion_cliente">No de Puertas</label>
                                        <input  class="form-control" type="number" id="km" name="km" min="0" max="6">
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
                                        <div class="form-group">
                                            <label class="form-control-label" for="fecha_registro">Fecha Registro</label>
                                            <input type="text" id="fecha_registro" class="form-control" placeholder="Falló" disabled="">
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
                                            <label class="custom-toggle text-center">
                                                <input type="checkbox" checked>
                                                <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Si"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="form-control-label" for="empresa">Precio de Lista</label>
                                            <input  class="form-control" type="number" id="km" name="km" min="0" max="1000000">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="form-control-label" for="rfc">Precio a Credito</label>
                                            <input  class="form-control" type="number" id="km" name="km" min="0" max="1000000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Description -->
                            <div class="col-lg-12 col-auto text-right">
                                <span class="d-flex position-absolute w-100" id="mensajeUpdateCliente"></span>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!--- Tablas de documentos de vehiculo--->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Documentos del Vehiculo</h3>
                            </div>
                            <div class="col text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cuentaUser">
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
            <!--- Tablas de fotos de vehiculo--->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Fotos del vehiculo</h3>
                            </div>
                            <div class="col text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cuentaUser">
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
        </div>
        <div class="row">
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
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                        Detalles y Documentos de Contrato de Venta</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                        Detalles y Documentos de Contrato de Adquisición
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row pt-0 py-3">
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="mb-0">Contrato de Venta</h3>
                                                        </div>
                                                        <div class="col text-right">
                                                            <i class="fas fa-calendar-alt"></i>  25 Septiembre de 2021
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <form id="frm-datos-cliente">
                                                        <input type="hidden" name="idCliente" id="idCliente" value="896610125442">
                                                        <div class="pl-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <label class="form-control-label" for="medio_identificacion_cliente">No de Contrato</label>
                                                                    <input type="text" name="telefono" id="telefono" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <label class="form-control-label" for="medio_identificacion_cliente">Cliente</label>
                                                                    <input type="text" name="telefono" id="telefono" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="correo">Vendido Por:</label>
                                                                        <input type="text" name="telefono" id="telefono" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="correo">Forma de Pago:</label>
                                                                        <input type="text" name="telefono" id="telefono" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-4">
                                                        <!-- Address -->
                                                        <h6 class="heading-small text-muted mb-4">TOTAL DE VENTA (CONTADO/CREDITO)</h6>
                                                        <div class="pl-lg-4">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Subtotal: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly name="telefono" id="telefono" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">IVA: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly name="telefono" id="telefono" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">TOTAL: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly name="telefono" id="telefono" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-4">
                                                        <!-- Description -->
                                                        <div class="col-lg-12 col-auto text-right">
                                                            <span class="d-flex position-absolute w-100" id="mensajeUpdateCliente"></span>
                                                            <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Mas Detalles</button>
                                                            <span class="d-flex position-absolute w-100" id="mensajeUpdateCliente"></span>
                                                            <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="mb-0">Documentos disponibles del contrato de Venta</h3>
                                                        </div>
                                                        <div class="col text-right">
                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#cuentaUser">
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
                                                        <tbody>
                                                        <tr>
                                                            <th scope="row">
                                                                Factura <i class="fas fa-lock text-red"></i>
                                                            </th>
                                                            <td>
                                                                PDF
                                                            </td>
                                                            <td>
                                                                Archivo protegido
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                                                    <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Tarjeta de Circulacion
                                                            </th>
                                                            <td>
                                                                PDF
                                                            </td>
                                                            <td>
                                                                Disponible a vendedores
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                                                    <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Factura <i class="fas fa-lock text-red"></i>
                                                            </th>
                                                            <td>
                                                                PDF
                                                            </td>
                                                            <td>
                                                                Archivo protegido
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                                                    <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Factura <i class="fas fa-lock text-red"></i>
                                                            </th>
                                                            <td>
                                                                PDF
                                                            </td>
                                                            <td>
                                                                Archivo protegido
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                                                    <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Factura <i class="fas fa-lock text-red"></i>
                                                            </th>
                                                            <td>
                                                                PDF
                                                            </td>
                                                            <td>
                                                                Archivo protegido
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                                                    <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- DETALLES DEL CREDITO-->
                                    <div class="row pt-0 py-3">
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="mb-0">Informacion del Crédito</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <form id="frm-datos-cliente">
                                                        <input type="hidden" name="idCliente" id="idCliente" value="896610125442">
                                                        <div class="pl-lg-4">
                                                            <h6 class="heading-small text-muted mb-4">SALDO DEL CREDITO</h6>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">TOTAL: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly="" name="telefono" id="telefono" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Enganche: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly="" name="telefono" id="telefono" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Pagos Realizados: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly="" name="telefono" id="telefono" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Saldo: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly="" name="telefono" id="telefono" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-4">
                                                        <!-- Description -->
                                                        <div class="col-lg-12 col-auto text-right">
                                                            <span class="d-flex position-absolute w-100" id="mensajeUpdateCliente"></span>
                                                            <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Mas Detalles</button>
                                                            <span class="d-flex position-absolute w-100" id="mensajeUpdateCliente"></span>
                                                            <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="mb-0">Pagos del Credito</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="my-3">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <!-- Projects table -->
                                                        <table class="table align-items-center table-flush" id="accordion">
                                                            <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col">Concepto</th>
                                                                <th scope="col">Limite de Pago</th>
                                                                <th scope="col">Total</th>
                                                                <th scope="col">Saldo</th>
                                                                <th scope="col">Estatus</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1" class="mano">
                                                                    <th scope="row" >
                                                                        Pago de Enganche
                                                                    </th>
                                                                    <td>
                                                                        15 AGO 2021
                                                                    </td>
                                                                    <td>
                                                                        $50,000.00
                                                                    </td>
                                                                    <td>
                                                                        $0.00
                                                                    </td>
                                                                <td>
                                                              <span class="badge badge-dot mr-4">
                                                                <i class="bg-success"></i>
                                                                <span class="status">PAGADO</span>
                                                              </span>
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#addAbono">
                                                                        <span class="btn-inner--icon"><i class="fas fa-coins text-green"></i> Abonar</span>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                                <tr>
                                                                    <td colspan="6" class="p-0">
                                                                        <div id="collapse1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                                            <div class="card-body">
                                                                                <table class="table table-hover">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th scope="col">#</th>
                                                                                        <th scope="col">Fecha</th>
                                                                                        <th scope="col">Monto</th>
                                                                                        <th scope="col">Detalles</th>
                                                                                        <th scope="col"></th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <th scope="row">1</th>
                                                                                        <td>14 Ago 2021 12:00</td>
                                                                                        <td>$50,000</td>
                                                                                        <td>Primer Pago</td>
                                                                                        <td>
                                                                                            <button class="btn btn-icon btn-secondary" type="button">
                                                                                                <span class="btn-inner--icon"><i class="fas fa-paper-plane text-orange"></i> Enviar Recibo</span>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">2</th>
                                                                                        <td>14 Sep 2021 17:00</td>
                                                                                        <td>$50,000</td>
                                                                                        <td>Primer Pago</td>
                                                                                        <td>
                                                                                            <button class="btn btn-icon btn-secondary" type="button">
                                                                                                <span class="btn-inner--icon"><i class="fas fa-paper-plane text-orange"></i> Enviar Recibo</span>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">2</th>
                                                                                        <td>14 Sep 2021 17:00</td>
                                                                                        <td>$50,000</td>
                                                                                        <td>Primer Pago</td>
                                                                                        <td>
                                                                                            <button class="btn btn-icon btn-secondary" type="button">
                                                                                                <span class="btn-inner--icon"><i class="fas fa-paper-plane text-orange"></i> Enviar Recibo</span>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2" class="mano">
                                                                    <th scope="row" >
                                                                        Pago 1/6
                                                                    </th>
                                                                    <td>
                                                                        15 AGO 2021
                                                                    </td>
                                                                    <td>
                                                                        $50,000.00
                                                                    </td>
                                                                    <td>
                                                                        $0.00
                                                                    </td>
                                                                    <td>
                                                              <span class="badge badge-dot mr-4">
                                                                <i class="bg-success"></i>
                                                                <span class="status">PAGADO</span>
                                                              </span>
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#addAbono">
                                                                            <span class="btn-inner--icon"><i class="fas fa-coins text-green"></i> Abonar</span>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6" class="p-0">
                                                                        <div id="collapse2" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                                                                            <div class="card-body">
                                                                                <table class="table table-hover">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th scope="col">#</th>
                                                                                        <th scope="col">Fecha</th>
                                                                                        <th scope="col">Monto</th>
                                                                                        <th scope="col">Detalles</th>
                                                                                        <th scope="col"></th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <th scope="row">1</th>
                                                                                        <td>14 Ago 2021 12:00</td>
                                                                                        <td>$50,000</td>
                                                                                        <td>Primer Pago</td>
                                                                                        <td>
                                                                                            <button class="btn btn-icon btn-secondary" type="button">
                                                                                                <span class="btn-inner--icon"><i class="fas fa-paper-plane text-orange"></i> Enviar Recibo</span>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">2</th>
                                                                                        <td>14 Sep 2021 17:00</td>
                                                                                        <td>$50,000</td>
                                                                                        <td>Primer Pago</td>
                                                                                        <td>
                                                                                            <button class="btn btn-icon btn-secondary" type="button">
                                                                                                <span class="btn-inner--icon"><i class="fas fa-paper-plane text-orange"></i> Enviar Recibo</span>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">2</th>
                                                                                        <td>14 Sep 2021 17:00</td>
                                                                                        <td>$50,000</td>
                                                                                        <td>Primer Pago</td>
                                                                                        <td>
                                                                                            <button class="btn btn-icon btn-secondary" type="button">
                                                                                                <span class="btn-inner--icon"><i class="fas fa-paper-plane text-orange"></i> Enviar Recibo</span>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row pt-0 py-3">
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="mb-0">Adquisición</h3>
                                                        </div>
                                                        <div class="col text-right">
                                                            <i class="fas fa-calendar-alt"></i>  15 Agosto de 2021
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <form id="frm-datos-cliente">
                                                        <input type="hidden" name="idCliente" id="idCliente" value="896610125442">
                                                        <div class="pl-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <label class="form-control-label" for="medio_identificacion_cliente">No de Contrato</label>
                                                                    <input type="text" name="telefono" id="telefono" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <label class="form-control-label" for="medio_identificacion_cliente">Vendedor</label>
                                                                    <input type="text" name="telefono" id="telefono" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="correo">Comprado por:</label>
                                                                        <input type="text" name="telefono" id="telefono" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="correo">Forma de Pago:</label>
                                                                        <input type="text" name="telefono" id="telefono" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-4">
                                                        <!-- Address -->
                                                        <h6 class="heading-small text-muted mb-4">COSTOS DE LA COMPRA</h6>
                                                        <div class="pl-lg-4">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Subtotal: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly name="telefono" id="telefono" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">IVA: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly name="telefono" id="telefono" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">TOTAL: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly name="telefono" id="telefono" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-4">
                                                        <!-- Description -->
                                                        <div class="col-lg-12 col-auto text-right">
                                                            <span class="d-flex position-absolute w-100" id="mensajeUpdateCliente"></span>
                                                            <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="mb-0">Documentos de Adquisicion</h3>
                                                        </div>
                                                        <div class="col text-right">
                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#cuentaUser">
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
                                                        <tbody>
                                                        <tr>
                                                            <th scope="row">
                                                                Factura <i class="fas fa-lock text-red"></i>
                                                            </th>
                                                            <td>
                                                                PDF
                                                            </td>
                                                            <td>
                                                                Archivo protegido
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                                                    <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Tarjeta de Circulacion
                                                            </th>
                                                            <td>
                                                                PDF
                                                            </td>
                                                            <td>
                                                                Disponible a vendedores
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                                                    <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Factura <i class="fas fa-lock text-red"></i>
                                                            </th>
                                                            <td>
                                                                PDF
                                                            </td>
                                                            <td>
                                                                Archivo protegido
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                                                    <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Factura <i class="fas fa-lock text-red"></i>
                                                            </th>
                                                            <td>
                                                                PDF
                                                            </td>
                                                            <td>
                                                                Archivo protegido
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                                                    <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Factura <i class="fas fa-lock text-red"></i>
                                                            </th>
                                                            <td>
                                                                PDF
                                                            </td>
                                                            <td>
                                                                Archivo protegido
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                                                    <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
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
        <?php include './modals/modal-view-pdf.php'; ?>
        <?php include './modals/modal-add-abono.php'; ?>

    </div>
</div>
</body>
<?php include './include/js.php'; ?>
</html>
<script src="../ajax/control-detalles-coche.js"></script>
