<?php include_once "./include/session.php"?>
<?php $titulo = "Ingresar Vehiculo " ?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once "./include/header.php"?>
</head>

<style>

    #msform fieldset .form-card {
        background: white;
        border: 0 none;
        border-radius: 0px;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        padding: 20px 40px 30px 40px;
        box-sizing: border-box;
        width: 94%;
        margin: 0 3% 20px 3%;
        position: relative
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }

    #msform fieldset:not(:first-of-type) {
        display: none
    }

    #msform fieldset .form-card {
        text-align: left;
        color: #9E9E9E
    }

    #msform .action-button {
        width: 120px;
        font-weight: bold;
        color: white;
        cursor: pointer;
    }



    #msform .action-button-previous {
        width: 120px;
        font-weight: bold;
        color: white;
        cursor: pointer;
    }

    select.list-dt {
        border: none;
        outline: 0;
        border-bottom: 1px solid #ccc;
        padding: 2px 5px 3px 5px;
        margin: 2px
    }

    select.list-dt:focus {
        border-bottom: 2px solid blueviolet;
    }

    .card {
        z-index: 0;
        border: none;
        border-radius: 0.5rem;
        position: relative
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey
    }

    #progressbar .active {
        color: #000000
    }

    #progressbar li {
        list-style-type: none;
        font-size: 12px;
        width: 25%;
        float: left;
        position: relative
    }

    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f14a"
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f007"
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f09d"
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 18px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: blueviolet;
    }

    .fit-image {
        width: 100%;
        object-fit: cover
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
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
                                                                                <label class="form-control-label" for="modeloCoche">Modelo</label>
                                                                                <select id="modeloCoche" name="modeloCoche" class="form-control">
                                                                                    <!-- AJAX RESPONSE GENERAR MODELOS ON CHANGE MARCAS-->
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="añoCoche">Año</label>
                                                                                    <input type="numeric" name="añoCoche" id="añoCoche" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="placaCoche">Placa</label>
                                                                                    <input type="text" name="placaCoche" id="placaCoche" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="entidadFedCoche">Entidad Federativa</label>
                                                                                    <select name="entidadFedCoche" id="entidadFedCoche" class="form-control">
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
                                                                                    <label class="form-control-label" for="colorCoche">Color</label>
                                                                                    <input id="colorCoche" name="colorCoche" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="kilometrajeCoche">Kilometraje</label>
                                                                                    <input class="form-control" type="number" id="kilometrajeCoche" name="kilometrajeCoche" min="0" max="1000000">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <label class="form-control-label" for="transmisionCoche">Trasmision</label>
                                                                                <select id="transmisionCoche" name="transmisionCoche" class="form-control">
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
                                                                                <label class="form-control-label" for="nopuertasCoche">No de Puertas</label>
                                                                                <input class="form-control" type="number" id="nopuertasCoche" name="nopuertasCoche" min="0" max="6">
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
                                                                                    <label class="form-control-label" for="observacionesCoche">Observaciones</label>
                                                                                    <textarea class="form-control" id="observacionesCoche" name="observacionesCoche" rows="3"></textarea>
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
                                                        <div class="col-xl-6">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-auto">
                                                                            <h3 class="mb-0">DATOS DEL VENDEDOR</h3>
                                                                        </div>
                                                                        <div class="col text-right">
                                                                            <a href="#!" class="btn btn-sm btn-primary">Nuevo</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <input type="hidden" name="idCliente" id="idCliente" value="0">
                                                                    <h6 class="heading-small text-muted mb-4">Información del Cliente</h6>
                                                                    <div class="pl-lg-4">
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="nombreCliente">Nombre</label>
                                                                                    <input type="text" name="nombreCliente" id="nombreCliente" class="form-control" placeholder="Nombre">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="apaternoCliente">Primer Apellido</label>
                                                                                    <input type="text" name="apaternoCliente" id="apaternoCliente" class="form-control" placeholder="Primer Apellido">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="amaternoCliente">Segundo Apellido</label>
                                                                                    <input type="text" name="amaternoCliente" id="amaternoCliente" class="form-control" placeholder="Segundo Apellido">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="correoCliente">Correo Electronico</label>
                                                                                    <input type="email" name="correoCliente" id="correoCliente" class="form-control" placeholder="example@gmail.com">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="telefonoCliente">Telefono</label>
                                                                                    <input type="text" name="telefonoCliente" id="telefonoCliente" class="form-control" placeholder="No. Telefono">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="celularCliente">Celular</label>
                                                                                    <input type="text" id="celularCliente" name="celularCliente" class="form-control" placeholder="No. Celular">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="my-4">
                                                                    <!-- Address -->
                                                                    <h6 class="heading-small text-muted mb-4">Otros datos</h6>
                                                                    <div class="pl-lg-4">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="empresaCliente">Empresa / Organizacion</label>
                                                                                    <input id="empresa" name="empresaCliente" class="form-control" placeholder="Nombre Empresa">
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
                                                                                    <label class="form-control-label" for="medio_identificacion_cliente">Se identifica con:</label>
                                                                                    <select id="medio_identificacion_cliente" name="medio_identificación_cliente" class="form-control">
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
                                                                                    <label class="form-control-label" for="folioCliente">Folio</label>
                                                                                    <input type="text" name="folioCliente" id="folioCliente" class="form-control" placeholder="Folio">
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
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="fecha_registro_Cliente">Fecha Registro</label>
                                                                                    <input type="text" id="fecha_registro_Cliente" name="fecha_registro_Cliente" class="form-control" placeholder="Falló" disabled="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="card">
                                                                <div class="card-header border-0">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-auto">
                                                                            <h3 class="mb-0">Personas registradas</h3>
                                                                        </div>
                                                                        <div class="col text-right">
                                                                            <div class="form-group mb-0">
                                                                                <div class="input-group input-group-alternative input-group-merge">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                            <i class="fas fa-search"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                    <input class="form-control" id="myInput" type="text" placeholder="Nombrer del cliente..">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <!-- Projects table -->
                                                                    <table class="table align-items-center table-flush">
                                                                        <thead class="thead-light">
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col">No</th>
                                                                            <th scope="col">Nombre</th>
                                                                            <th scope="col"></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody id="tbl-clientes">
                                                                        <!-- AJAX RESPONSE TBL CLIENTES TODOS LOS CLIENTES ACTIVOS-->
                                                                        <tr idcliente="987568611049">
                                                                            <th scope="row">
                                                                                1
                                                                            </th>
                                                                            <td>
                                                                                <a class="nav-link" href="./detalles-cliente.php?idCliente=987568611049">
                                                                                    987568611049
                                                                                </a>
                                                                            </td>
                                                                            <td>
                                                                                Ernesto Dominguez Alfaro
                                                                                <span class="badge badge-success">Activo</span>
                                                                            </td>

                                                                            <td>
                                                                                <button type="submit" class="btn btn-primary">Seleccionar</button>
                                                                            </td>
                                                                        </tr>
                                                                        <tr idcliente="987568611049">
                                                                            <th scope="row">
                                                                                1
                                                                            </th>
                                                                            <td>
                                                                                <a class="nav-link" href="./detalles-cliente.php?idCliente=987568611049">
                                                                                    987568611049
                                                                                </a>
                                                                            </td>
                                                                            <td>
                                                                                Ernesto Dominguez Alfaro
                                                                                <span class="badge badge-success">Activo</span>
                                                                            </td>

                                                                            <td>
                                                                                <button type="submit" class="btn btn-primary">Seleccionar</button>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
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
                                                                            <label class="form-control-label" for="forma_pago_contrato">Forma de Pago</label>
                                                                            <select id="forma_pago_contrato" name="forma_pago_contrato" class="form-control">
                                                                                <option value="1">Credito</option>
                                                                                <option value="2">Contado</option>
                                                                                <option value="2">Apartado</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <label class="form-control-label" for="precio_compra_coche">Precio de compra</label>
                                                                                <input type="numeric" name="precio_compra_coche" id="precio_compra_coche" class="form-control">
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
                                                                                <input type="numeric" name="iva_coche" id="iva_coche" class="form-control">
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
                                                                                <label class="form-control-label" for="precio_coche_contado">Precio de Lista</label>
                                                                                <input class="form-control" type="number" id="precio_coche_contado" name="precio_coche_contado" min="0" max="1000000">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label" for="precio_coche_credito">Precio a Credito</label>
                                                                                <input class="form-control" type="number" id="precio_coche_credito" name="precio_coche_credito" min="0" max="1000000">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <input type="button" name="previous" class="btn btn-primary previous action-button-previous " value="Anterior" />
                                                    <input type="submit" name="make_payment" class="btn btn-primary next action-button" value="Confirmar" />
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
    </div>
</div>

</body>
<?php include './include/js.php'; ?>
</html>
<script src="../ajax/control-ingreso.js"></script>