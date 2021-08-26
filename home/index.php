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
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-auto text-right">
                        <a href="./ingreso.php" class="btn btn-sm btn-neutral">Registrar Adquisicion</a>
                        <a href="./nuevaVenta.php" class="btn btn-sm btn-neutral">Nueva Venta</a>
                    </div>
                </div>
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Venta</h5>
                                        <span class="h1 font-weight-bold mb-0"id="montoVendido" name="montoVendido"></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="fas fa-car"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-nowrap"id="no_vehiculos" name="no_vehiculos"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Pagos Pendientes</h5>
                                        <span class="h1 font-weight-bold mb-0"id="montoPagosPend" name="montoPagosPend"></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="ni ni-money-coins"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-nowrap" id="noPagosPend" name="noPagosPend"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Catalogo</h5>
                                        <span class="h1 font-weight-bold mb-0" id="noVehiculosVenta" name="noVehiculosVenta"></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="ni ni-money-coins"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-nowrap">Vehiculos en Venta</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Abonos</h5>
                                        <span class="h1 font-weight-bold mb-0" id="montoAbonosHoy" name="montoAbonosHoy"></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="ni ni-chart-bar-32"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-nowrap">Abonos registrados hoy</span>
                                </p>
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
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Vehiculos en Venta</h3>
                            </div>
                            <div class="col text-right">
                                <a href="./catalogo.php" class="btn btn-sm btn-primary">Ver todos</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Placa</th>
                                <th scope="col">Detalles</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Precio Lista</th>
                                <th scope="col">Estado</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody id="tblCoches">
                        <!-- AJAX RESPONSE TABLE COCHES EN VENTA -->
                            </tbody>
                        </table>
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
                                <h3 class="mb-0">Catalogo</h3>
                            </div>
                            <div class="col text-right">
                                <a href="./catalogo.php" class="btn btn-sm btn-primary">Ver Catalogo</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- CAROUSEL COCHES -->
                        <div id="caroucelCochesDinamico" class="carousel slide" data-ride="carousel">
                            <!--
                            AJAX CAROUSEL
                            -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Pagos Pendientes</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">No Contrado</th>
                                <th scope="col">Detalles</th>
                                <th scope="col">Vence</th>
                                <th scope="col">Detalles</th>
                                <th scope="col">Monto</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody id="tblPagos">
                            <!--
                                AJAX TABLA PAGOS
                            -->
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
                                <h3 class="mb-0">Creditos</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">Ver Todos</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">No Contrado</th>
                                <th scope="col">Detalles</th>
                                <th scope="col">Fecha Venta</th>
                                <th scope="col">General</th>
                                <th scope="col">Avance de Pagos</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody id="tblCredits" name="tblCredits">
                            <!--
                                AJAX TABLA CONTRATOS DE CREDITO
                            -->
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
</html>
<script src="../ajax/control-dashboard.js"></script>
<script src="../ajax/head-dashboard.js"></script>