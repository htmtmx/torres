
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
                    <div class="col-lg-6 col-auto text-right">
                        <select id="filtro" name="filtro" class="form-control">
                            <option value="0" selected>En venta</option>
                            <option value="1">Vendidos</option>
                            <option value="-1">Apartados</option>
                            <option value="999">Todos</option>
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
            <!-- AJAX DATA -->
        </div>
        <?php include './include/footer.php'; ?>
    </div>
</div>

</body>
<?php include './include/js.php'; ?>
</html>
<script src="../ajax/consultaCochesOneFoto.js"></script>
