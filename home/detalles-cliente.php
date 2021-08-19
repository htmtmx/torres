<?php
$idCliente=$_GET['idCliente'];
?>
<?php include_once "./include/session.php"?>
<?php $titulo = "Inicio " ?>
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
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-auto">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="./">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="./clientes.php">Clientes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detalles del cliente</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-auto text-right">
                        <a href="#!" class="btn btn-sm btn-warning">Supender</a>
                        <a href="#!" class="btn btn-sm btn-danger">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">NOMBRE DEL CLIENTE</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="frm-datos-cliente">
                            <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $idCliente ?>">
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
                                            <input type="text" name="apaterno"id="apaterno" class="form-control" placeholder="Primer Apellido">
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
                                            <input type="email"name="correo" id="correo" class="form-control" placeholder="example@gmail.com">
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
                            <hr class="my-4" />
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Otros datos</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="empresa">Empresa / Organizacion</label>
                                            <input id="empresa" name="empresa"class="form-control" placeholder="Nombre Empresa" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="rfc">RFC</label>
                                            <input id="rfc" name="rfc" class="form-control" placeholder="RFC" >
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
                                                <option value="NONE" >Ninguna</option>
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
                            <hr class="my-4" />
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
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Direcciones</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addDireccion">
                                    <i class="fas fa-plus"></i> Nueva Dirección</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Calle</th>
                                <th scope="col">Colonia</th>
                                <th scope="col">Municipio</th>
                                <th scope="col">Estado</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody id="tbl-direcciones">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php include './include/footer.php'; ?>
    </div>
</div>

</body>
<?php include './include/js.php'; ?>
<?php include './modals/modal-add-direccion.php'; ?>
</html>
<script src="../ajax/cliente-detalles.js"></script>
<script src="../ajax/tools.js"></script>
