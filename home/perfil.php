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
                <div class="col-lg-12 col-md-10">
                    <h1 class="display-2 text-white" id ="nombreTitulo"> </h1>
                    <p class="text-white mt-0 mb-5">Modifica tus datos, recuerda que estos datos se imprimen en los contratos que realices</p>
                    <a href="#" class="btn btn-neutral" data-toggle="modal" data-target="#updatepassword"><i class="fas fa-key"></i> Cambiar Contraseña</a>

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
                                <h3 class="mb-0">Editar Cuenta</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="frm-datos-empleado">
                            <h6 class="heading-small text-muted mb-4">Información Personal</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nombre">Nombre</label>
                                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="apaterno">Primer Apellido</label>
                                            <input type="text" id="apaterno" name="apaterno" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="amaterno">Segundo Apellido</label>
                                            <input type="text" id="amaterno" name="amaterno" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="telefono">Telefono</label>
                                            <input type="tel" id="telefono" name="telefono" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="celular">Celular</label>
                                            <input type="tel" id="celular" name="celular" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="correo">Correo</label>
                                            <input type="email" id="correo" name="correo" class="form-control" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="sexo">Sexo</label>
                                            <select id="sexo" name="sexo" class="form-control">
                                                <option value="0">Hombre</option>
                                                <option value="1">Mujer</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Detalles de la Cuenta</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="puesto">Puesto</label>
                                            <input type="text" id="puesto" name="puesto" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nvl_acceso">Nivel de Acceso</label>
                                            <input type="text" id="nvl_acceso" name="nvl_acceso" class="form-control" disabled>
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
        <?php include './include/footer.php'; ?>
    </div>
</div>

</body>
<?php include './include/js.php'; ?>
<?php include './modals/modal-actualiza-contraseña.php'; ?>
</html>
<script src="../ajax/usuario-detalle.js"></script>
<script src="../ajax/tools.js"></script>