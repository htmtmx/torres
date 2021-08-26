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
                                <li class="breadcrumb-item active" aria-current="page">Template</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-auto text-right">
                        <a href="#" class="btn btn-sm btn-neutral">Registrar Adquisicion</a>
                        <a href="#" class="btn btn-sm btn-neutral">Nueva Venta</a>
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
                                <h3 class="mb-0">Contratos de venta</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No Contrato</th>
                                <th scope="col">Vendedor</th>
                                <th scope="col">Realizó</th>
                                <th scope="col">Detalles</th>
                                <th scope="col">Forma de pago</th>
                                <th scope="col">Plazos</th>
                                <th scope="col">Total</th>
                                <th scope="col">Saldo</th>
                                <th scope="col">Estatus</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody id="tblContratosVenta">
                            <tr>
                                <th scope="row">
                                    1
                                </th>
                                <td>
                                    655985665
                                </td>
                                <td>
                                    Hernandez Ledezma Luis Fernando
                                </td>
                                <td>
                                    Pioquinto Hernandez Christian
                                </td>
                                <td>
                                    Nissan Versa 2015 Negro
                                </td>
                                <td>
                                    Credito
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    $ 1542356
                                </td>
                                <td>
                                    0
                                </td>
                                <td>
                                    Liquidado
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    156156
                                </th>
                                <td>
                                    Nissan Versa 2015
                                </td>
                                <td>
                                    15 de Enero de 2021
                                </td>
                                <td>
                                    <i class="fas fa-calendar-times text-red"></i> Atrasado
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">60%</span>
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Acciones
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#"><i class="fas fa-eye text-blue"></i> Ver Contrato</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-hand-holding-usd text-green"></i> Abonar</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-cloud-upload-alt text-orange"></i> Subir Archivo</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-times text-red"></i> Cancelar</a>
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
        <?php include './include/footer.php'; ?>
    </div>
</div>

</body>
<?php include './include/js.php'; ?>
</html>
<script src="../ajax/control-contratos-adq.js"></script>