<?php include_once "./include/session.php"?>
<?php $titulo = "Perfil " ?>
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
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(http://www.autostecnologico.com/sis/images/portadas/2.1.jpg); background-size: cover; background-position: center;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <h1 class="display-2 text-white" id="empresaE"></h1>
                    <p class="text-white mt-0 mb-5">Modifica los Datos del negocio, estos aparereceran en los documentos que se generen </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 ">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Configuracion general</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">Configuracion de variables</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="container-fluid">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="tab-uno-tab" data-toggle="pill" href="#tab-uno" role="tab" aria-controls="tab-uno" aria-selected="true">
                                                <i class="fas fa-file-pdf"></i> Documentos
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="tab-dos-tab" data-toggle="pill" href="#tab-dos" role="tab" aria-controls="tab-dos" aria-selected="false">
                                                <i class="fas fa-car"></i> Modelos
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="tab-tres-tab" data-toggle="pill" href="#tab-tres" role="tab" aria-controls="tab-tres" aria-selected="false">
                                                <i class="fas fa-fill-drip"></i> Características
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="tab-uno" role="tabpanel" aria-labelledby="tab-uno-tab">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="card">
                                                        <div class="card-header border-0">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <h3 class="mb-0">Documentos Para Subir</h3>
                                                                </div>
                                                                <div class="col text-right">
                                                                    <button type="button" class="btn btn-primary W-25 mx-2" data-toggle="modal" data-target="#modal_ConfigTipoArchivo">
                                                                        <i class="fas fa-plus"></i> Nuevo
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <!-- Projects table -->
                                                            <table class="table align-items-center table-flush">
                                                                <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col">Marca</th>
                                                                    <th scope="col">Modelo</th>
                                                                    <th scope="col"></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="tblDocumentosType">
                                                                <tr>
                                                                    <th scope="row">
                                                                        1
                                                                    </th>
                                                                    <td>
                                                                        <i class="fas fa-file-contract text-pink"></i> CURP
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-white ">
                                                                            <i class="fas fa-edit text-green"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger ">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">
                                                                        2
                                                                    </th>
                                                                    <td>
                                                                        <i class="fas fa-file-contract text-pink"></i> Identificacion Oficial
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-white ">
                                                                            <i class="fas fa-edit text-green"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger ">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">
                                                                        3
                                                                    </th>
                                                                    <td>
                                                                        <i class="fas fa-car text-purple"></i> Factura
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-white ">
                                                                            <i class="fas fa-edit text-green"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger ">
                                                                            <i class="fas fa-trash-alt"></i>
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
                                        <div class="tab-pane fade" id="tab-dos" role="tabpanel" aria-labelledby="tab-dos-tab">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="card">
                                                        <div class="card-header border-0">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <h3 class="mb-0">Agregar Nuevos Modelos de Vehiculos</h3>
                                                                </div>
                                                                <div class="col text-right">
                                                                    <button type="button" class="btn btn-primary W-25 mx-2" data-toggle="modal" data-target="#modal_ConfigModelo">
                                                                        <i class="fas fa-plus"></i> Nuevo
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <!-- Projects table -->
                                                            <table class="table align-items-center table-flush">
                                                                <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col">Marca</th>
                                                                    <th scope="col">Modelo</th>
                                                                    <th scope="col"></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="tblModelosType">
                                                                    <tr>
                                                                        <th scope="row">
                                                                            Nissan
                                                                        </th>
                                                                        <td>
                                                                            Tiida
                                                                        </td>
                                                                        <td>
                                                                            <button type="button" class="btn btn-white ">
                                                                                <i class="fas fa-edit text-green"></i>
                                                                            </button>
                                                                            <button type="button" class="btn btn-danger ">
                                                                                <i class="fas fa-trash-alt"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">
                                                                            Nissan
                                                                        </th>
                                                                        <td>
                                                                            Versa
                                                                        </td>
                                                                        <td>
                                                                            <button type="button" class="btn btn-white ">
                                                                                <i class="fas fa-edit text-green"></i>
                                                                            </button>
                                                                            <button type="button" class="btn btn-danger ">
                                                                                <i class="fas fa-trash-alt"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">
                                                                            Ford
                                                                        </th>
                                                                        <td>
                                                                            Focus
                                                                        </td>
                                                                        <td>
                                                                            <button type="button" class="btn btn-white ">
                                                                                <i class="fas fa-edit text-green"></i>
                                                                            </button>
                                                                            <button type="button" class="btn btn-danger ">
                                                                                <i class="fas fa-trash-alt"></i>
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
                                        <div class="tab-pane fade" id="tab-tres" role="tabpanel" aria-labelledby="tab-tres-tab">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="card">
                                                        <div class="card-header border-0">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <h3 class="mb-0">Detalles para el vehiculo</h3>
                                                                </div>
                                                                <div class="col text-right">
                                                                    <button type="button" class="btn btn-primary W-25 mx-2" data-toggle="modal" data-target="#addDetalles">
                                                                        <i class="fas fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <!-- Projects table -->
                                                            <table class="table align-items-center table-flush">
                                                                <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Característica</th>
                                                                    <th scope="col"></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="tblModelosType">
                                                                <tr>
                                                                    <th scope="row">
                                                                        1
                                                                    </th>
                                                                    <td>
                                                                        Quemacoco
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-white ">
                                                                            <i class="fas fa-edit text-green"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger ">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">
                                                                        2
                                                                    </th>
                                                                    <td>
                                                                        Seguros Eléctricos
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-white ">
                                                                            <i class="fas fa-edit text-green"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger ">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">
                                                                        3
                                                                    </th>
                                                                    <td>
                                                                        Rines
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-white ">
                                                                            <i class="fas fa-edit text-green"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger ">
                                                                            <i class="fas fa-trash-alt"></i>
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
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 ">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Datos del Negocio</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="frm-update-datos-empresa">
                            <h6 class="heading-small text-muted mb-4">Dirección</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nombre">Nombre</label>
                                            <input type="hidden" id="idEmpresa" name="idEmpresa" class="form-control">
                                            <input type="text" id="nombreEmpresa" name="nombreEmpresa" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="apaterno">RFC</label>
                                            <input type="text" id="rfcEmpresa" name="rfcEmpresa" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label class="form-control-label" for="telefono">Calle</label>
                                            <input type="text" id="calleEmpresa" name="calleEmpresa" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="form-control-label" for="celular">No Ext.</label>
                                            <input type="text" id="noExtEmp" name="noExtEmp" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="form-control-label" for="celular">No Int.</label>
                                            <input type="text" id="noIntEmp" name="noIntEmp" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="coloniaEmpr">Colonia</label>
                                            <input type="text" id="coloniaEmpr" name="coloniaEmpr" class="form-control" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="municipio">Municipio</label>
                                            <input type="text" id="municipio" name="municipio" class="form-control" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="form-control-label" for="correo">CP</label>
                                            <input type="numeric" id="cpEmpr" name="cpEmpr" class="form-control" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="form-control-label" for="correo">Estado</label>
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
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Detalles del negocio</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="puesto">Teléfono</label>
                                            <input type="text" id="telEmpr" name="telEmpr" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nvl_acceso">Correo</label>
                                            <input type="email" id="correoEmp" name="correoEmp" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label class="form-control-label" for="puesto">Web Site</label>
                                            <input type="text" id="webEmpr" name="webEmpr" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nvl_acceso">Fecha registro</label>
                                            <input type="text" id="dateEmpr" name="dateEmpr" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
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
            <div class="col-xl-12 ">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Licencia de uso de Software</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">Licencia de Uso de Software</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="puesto">Version</label>
                                        <input type="email" id="version" class="form-control" disabled >
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="puesto">Revisión</label>
                                        <input type="email" id="rev" class="form-control" value="19 AGO 2021" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nvl_acceso">Clave de Licencia</label>
                                        <input type="email" id="clavLic" class="form-control" value="" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <h6 class="heading-small text-muted mb-4">Contrato</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Contrato de Uso de Software ReCkreaStudios</label>
                                <textarea rows="8" class="form-control" disabled>
                                    <?php include './include/licence.php'?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './include/footer.php'; ?>
    </div>
</div>
<?php include './modals/modal-add-tipo-archivo.php'; ?>
</body>
<?php include './include/js.php'; ?>
</html>
<script src="../ajax/configuracion.js"></script>
<script src="../ajax/empresa-update.js"></script>