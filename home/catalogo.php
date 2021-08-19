
<?php
$no_vehiculo = 0;
?>

<?php include_once "./include/session.php"?>
<?php $titulo = "Catalogo de Coches " ?>
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
                                <li class="breadcrumb-item active" aria-current="page">Catalogo de Coches</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3 col-auto text-right">
                        <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-file-invoice-dollar"></i> Registrar Adquisicion</a>
                        <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-hand-holding-usd"></i> Nueva Venta</a>
                    </div>
                    <div class="col-lg-3 col-6 d-flex py-3 w-100">
                        <select id="filtro" name="filtro" class="form-control">
                            <option value="0">Vendidos</option>
                            <option value="1">En Venta</option>
                            <option value="-1">Apartados</option>
                            <option value="999" selected>Todos</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="no_vehiculo" value="<?php echo $no_vehiculo?>">
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row" id="gridCoches">
            <div class="col-xl-4 order-xl-1">
                <div class="card card-profile">
                    <img src="https://img.autocosmos.com/noticias/fotosprinc/NAZ_031b863b4cf04a76b56418ba039051f6.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="card-body pt-0 py-3">
                        <div class="text-center">
                            <h5 class="h3">
                                Nissan Versa 2015
                            </h5>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Placa: <strong class="heading">NMJVN1561</strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <div>
                                        <span class="heading">2015</span>
                                        <span class="description">Año</span>
                                    </div>
                                    <div>
                                        <span class="heading">AU</span>
                                        <span class="description">Trasmisión</span>
                                    </div>
                                    <div>
                                        <span class="heading">15054</span>
                                        <span class="description">Km</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <ul class="text-left">
                                <li>1 sub-domain</li>
                                <li><strong>10</strong> email addresses</li>
                                <li><strong>Unlimited</strong> Bandwidth</li>
                                <li><strong>20GB</strong> Storage</li>
                                <li>Support Ads</li>
                                <li>Shared Hosting</li>
                                <li><strong>24/7</strong> Customer Support</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-header text-center border-0">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info  mr-4 "><i class="fas fa-list text-white"></i> Más Detalles</a>
                            <a href="#" class="btn btn-sm btn-success float-right"> <i class="fas fa-dollar-sign text-white"></i> Vender</a>
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
<script src="../ajax/consultaCochesOneFoto.js"></script>
