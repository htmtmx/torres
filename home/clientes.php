<?php include_once "./include/session.php"?>
<?php $titulo = "Clientes " ?>
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
                                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-auto text-right">
                        <a href="#" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#addCliente"> <i class="fas fa-plus"></i> Nuevo Cliente</a>
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
                                <h3 class="mb-0">Clientes registrados</h3>
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
                        <table class="table align-items-center table-flush" >
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Contacto</th>
                                <th scope="col">Detalles</th>
                                <th scope="col">Registro</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody id="tbl-clientes">

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
<script src="../ajax/cliente-list.js"></script>
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