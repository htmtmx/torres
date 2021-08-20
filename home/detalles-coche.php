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
                    <input type="hidden" id="noCoche" value="<?php echo $noCoche;?>">
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
                                    <span class="h1 font-weight-bold mb-0">$250,000</span>
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
                    <div id="carouselExampleIndicators" class="carousel slide card-img-top" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="exclusive-price venta"><label>$ 100000.00</label></div>
                                <img class="d-block w-100" src="https://cdn.motor1.com/images/mgl/zOvpW/s3/volkswagen-id.4-2021-primera-prueba.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <div class="exclusive-price venta"><label>$ 100000.00</label></div>
                                <img class="d-block w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6TZcPrBm2u3Oyue4hyqmcg-dAH-DP70USMl9sXtoxHVAtx8cTCezjBPTYMJVBflZXMtQ&usqp=CAU" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <div class="exclusive-price venta"><label>$ 100000.00</label></div>
                                <img class="d-block w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3QGQiLmpW3-AkMAjnc_2axgkkEPv1QrTT8g&usqp=CAU" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
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
                                        <tbody>
                                        <tr>
                                            <th scope="row">
                                                Factura Original
                                            </th>
                                            <td>
                                                SI
                                            </td>
                                            <td>
                                                <button class="btn btn-icon btn-secondary" type="button">
                                                    <span class="btn-inner--icon"><i class="fas fa-pen text-primary"></i></span>
                                                </button>
                                                <button class="btn btn-icon btn-secondary" type="button">
                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                Gato Hidraulico
                                            </th>
                                            <td>
                                                SI
                                            </td>
                                            <td>
                                                <button class="btn btn-icon btn-secondary" type="button">
                                                    <span class="btn-inner--icon"><i class="fas fa-pen text-primary"></i></span>
                                                </button>
                                                <button class="btn btn-icon btn-secondary" type="button">
                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                Refaccion
                                            </th>
                                            <td>
                                                NO
                                            </td>
                                            <td>
                                                <button class="btn btn-icon btn-secondary" type="button">
                                                    <span class="btn-inner--icon"><i class="fas fa-pen text-primary"></i></span>
                                                </button>
                                                <button class="btn btn-icon btn-secondary" type="button">
                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                Factura Original
                                            </th>
                                            <td>
                                                SI
                                            </td>
                                            <td>
                                                <button class="btn btn-icon btn-secondary" type="button">
                                                    <span class="btn-inner--icon"><i class="fas fa-pen text-primary"></i></span>
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
                                    <button class="btn btn-icon btn-secondary" type="button">
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
                                    <button class="btn btn-icon btn-secondary" type="button">
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
                                    <button class="btn btn-icon btn-secondary" type="button">
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
                                    <button class="btn btn-icon btn-secondary" type="button">
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
                                    <button class="btn btn-icon btn-secondary" type="button">
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
                            <tbody>
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <a href="#" class=" mr-3 align-items-center d-flex">
                                            <img src="https://img.autocosmos.com/noticias/fotosprinc/NAZ_031b863b4cf04a76b56418ba039051f6.jpg" height="90" alt="Image placeholder" class="card-img-top">
                                        </a>
                                    </div>
                                </th>
                                <td>
                                    <button class="btn btn-icon btn-secondary" type="button">
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
                                    <div class="media align-items-center">
                                        <a href="#" class=" mr-3 align-items-center d-flex">
                                            <img src="https://img.autocosmos.com/noticias/fotosprinc/NAZ_031b863b4cf04a76b56418ba039051f6.jpg" height="90" alt="Image placeholder" class="card-img-top">
                                        </a>
                                    </div>
                                </th>
                                <td>
                                    <button class="btn btn-icon btn-secondary" type="button">
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
                                    <div class="media align-items-center">
                                        <a href="#" class=" mr-3 align-items-center d-flex">
                                            <img src="https://img.autocosmos.com/noticias/fotosprinc/NAZ_031b863b4cf04a76b56418ba039051f6.jpg" height="90" alt="Image placeholder" class="card-img-top">
                                        </a>
                                    </div>
                                </th>
                                <td>
                                    <button class="btn btn-icon btn-secondary" type="button">
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
                                        Documentos de Contrato de Adquisición</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                        Documentos de Contrato de Venta
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card-body pt-0 py-3">
                                        <div class="card-header border-0">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h3 class="mb-0">Documentos disponibles del contrato de adquisicion:</h3>
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
                                                        <button class="btn btn-icon btn-secondary" type="button">
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
                                                        <button class="btn btn-icon btn-secondary" type="button">
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
                                                        <button class="btn btn-icon btn-secondary" type="button">
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
                                                        <button class="btn btn-icon btn-secondary" type="button">
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
                                                        <button class="btn btn-icon btn-secondary" type="button">
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
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card-body pt-0 py-3">
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
                                                        <button class="btn btn-icon btn-secondary" type="button">
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
                                                        <button class="btn btn-icon btn-secondary" type="button">
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
                                                        <button class="btn btn-icon btn-secondary" type="button">
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
                                                        <button class="btn btn-icon btn-secondary" type="button">
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
                                                        <button class="btn btn-icon btn-secondary" type="button">
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
        <?php include './include/footer.php'; ?>
    </div>
</div>

</body>
<?php include './include/js.php'; ?>
</html>
