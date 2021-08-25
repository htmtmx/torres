<?php
include_once "./include/session.php";
$titulo = "Inicio ";
$idCoche = $_GET["idCoche"];
?>
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
                                <li class="breadcrumb-item active" aria-current="page">Nueva Adquisicion</li>
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

        </div>
        <?php include './include/footer.php'; ?>
    </div>
</div>

</body>
<?php include './include/js.php'; ?>
</html>
