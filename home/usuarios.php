<?php include_once "./include/session.php"?>
<?php $titulo = "Usuarios " ?>
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
                                <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
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
                                <h3 class="mb-0">Usuarios del sistema</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addUsuario"> <i class="fas fa-plus"></i> Nuevo Usuario</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Contacto</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Registro</th>
                                <th scope="col">Puesto</th>
                                <th scope="col">Nivel de Acceso</th>
                                <th scope="col">Estatus</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody id="tbl-clientes">
                            <tr idcliente="987568611049">
                                <th scope="row">
                                    1561561561
                                </th>
                                <td><i class="fas fa-user-tie"></i>
                                    Gloria Ramirez Garza
                                    <span class="badge badge-warning">Inactiva</span>
                                </td>
                                <td>
                                    <ul>
                                        <li><i class="fas fa-phone"></i>6352015248</li>
                                        <li><i class="fas fa-mobile-alt"></i>5514784916</li>
                                        <li><i class="far fa-envelope"></i>ernestotelapresto@gmail.com</li>
                                    </ul>
                                </td>
                                <td>
                                    Mujer
                                </td>
                                <td>
                                    2021-05-15 10:34:06
                                </td>
                                <td>
                                    <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#cuentaUser">
                                        <span class="btn-inner--icon"><i class="fas fa-edit text-green"></i>  Jefe De Ventas</span>
                                    </button>

                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#cuentaUser">
                                        <i class="fas fa-edit text-green"></i> Vendedor
                                    </button>
                                </td>
                                <td>
                                    <label class="custom-toggle">
                                        <input type="checkbox">
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="Inactivo" data-label-on="Activo"></span>
                                    </label>
                                </td>
                                <td>
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
        <?php include './include/footer.php'; ?>
    </div>
</div>
<?php include './modals/modal-cambia-accesos-usuario.php'; ?>
</body>
<?php include './include/js.php'; ?>
</html>

<script src="../ajax/usuario-list.js"></script>


