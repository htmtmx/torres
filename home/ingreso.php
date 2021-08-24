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
                                                                    <input type="hidden" name="idCliente" id="idCliente" value="896610125442">
                                                                    <div class="pl-lg-4">
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <label class="form-control-label" for="marca">Marca</label>
                                                                                <select id="marca" name="marca" class="form-control">
                                                                                    <option value="1">Marca 1</option>
                                                                                    <option value="2">Marca 2</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label class="form-control-label" for="modelo">Modelo</label>
                                                                                <select id="modelo" name="modelo" class="form-control">
                                                                                    <option value="1">Modelo 1</option>
                                                                                    <option value="2">Modelo 2</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="año">Año</label>
                                                                                    <input type="numeric" name="año" id="año" class="form-control">
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
                                                                                    <label class="form-control-label" for="color">Color</label>
                                                                                    <input id="color" name="color" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="kilometraje">Kilometraje</label>
                                                                                    <input class="form-control" type="number" id="kilometraje" name="kilometraje" min="0" max="1000000">
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
                                                                                <label class="form-control-label" for="nopuertas">No de Puertas</label>
                                                                                <input class="form-control" type="number" id="nopuertas" name="nopuertas" min="0" max="6">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="niv">NIV</label>
                                                                                    <input type="text" id="niv" class="form-control" placeholder="Falló" >
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="fecha_registro">Observaciones</label>
                                                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                                                                    <input type="hidden" name="idCliente" id="idCliente" value="987568611049">
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
                                                                                    <label class="form-control-label" for="rfc">RFC</label>
                                                                                    <input id="rfc" name="rfc" class="form-control" placeholder="RFC">
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
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label" for="fecha_registro">Fecha Registro</label>
                                                                                    <input type="text" id="fecha_registro" class="form-control" placeholder="Falló" disabled="">
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
                                                                <input type="hidden" name="idCliente" id="idCliente" value="896610125442">
                                                                <h6 class="heading-small text-muted mb-4">Generales</h6>
                                                                <div class="pl-lg-4">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <label class="form-control-label" for="marca">Forma de Pago</label>
                                                                            <select id="marca" name="marca" class="form-control">
                                                                                <option value="1">Credito</option>
                                                                                <option value="2">Contado</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <label class="form-control-label" for="año">Precio de compra</label>
                                                                                <input type="numeric" name="compra" id="compra" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <label class="form-control-label" for="placa">Subtotal</label>
                                                                                <input type="numeric" name="compra" id="compra" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <label class="form-control-label" for="placa">IVA</label>
                                                                                <input type="numeric" name="compra" id="compra" class="form-control">
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
                                                                                <label class="form-control-label" for="empresa">Ofrecer Credito</label><br>
                                                                                <label class="custom-toggle text-center">
                                                                                    <input type="checkbox" checked="">
                                                                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Si"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label" for="empresa">Precio de Lista</label>
                                                                                <input class="form-control" type="number" id="km" name="km" min="0" max="1000000">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label" for="rfc">Precio a Credito</label>
                                                                                <input class="form-control" type="number" id="km" name="km" min="0" max="1000000">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <input type="button" name="previous" class="btn btn-primary previous action-button-previous " value="Anterior" />
                                                    <input type="button" name="make_payment" class="btn btn-primary next action-button" value="Confirmar" />
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

<script>
    $(document).ready(function(){

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;

        $(".next").click(function(){

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

//Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
            next_fs.show();
//hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
// for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                },
                duration: 600
            });
        });

        $(".previous").click(function(){

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

//Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
            previous_fs.show();

//hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
// for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({'opacity': opacity});
                },
                duration: 600
            });
        });

        $('.radio-group .radio').click(function(){
            $(this).parent().find('.radio').removeClass('selected');
            $(this).addClass('selected');
        });

        $(".submit").click(function(){
            return false;
        })

    });
</script>

<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tbl-clientes tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>