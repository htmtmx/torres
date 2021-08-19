<?php include './modals/modal-add-cliente.php'; ?>
<?php include './modals/modal-add-usuario.php'; ?>
<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <img src="../assets/img/logo.png" width="auto" height="100%" alt="...">
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="./">
                            <i class="fas fa-tachometer-alt text-primary"></i>
                            <span class="nav-link-text">Inicio</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-car text-purple"></i>
                            <span class="nav-link-text">Autos</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Registrar Adquisicion</a>
                            <a class="dropdown-item" href="#">Vender</a>
                            <a class="dropdown-item" href="#">Ver Catálogo</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-tie text-orange"></i>
                            <span class="nav-link-text">Clientes</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addCliente">Agregar Nuevo</a>
                            <a class="dropdown-item" href="./clientes.php">Ver Todos</a>
                        </div>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Contratos</span>
                </h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-file-import text-body"></i>
                            <span class="nav-link-text">Adquisiciones</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Nueva Adquisición</a>
                            <a class="dropdown-item" href="#">Ver Todos</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-file-export text-green"></i>
                            <span class="nav-link-text">Ventas</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Nueva Venta</a>
                            <a class="dropdown-item" href="#">Buscar</a>
                            <a class="dropdown-item" href="#">Ver Todos</a>
                        </div>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Configuración</span>
                </h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-friends text-primary"></i>
                            <span class="nav-link-text">Cuentas</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addUsuario">Agregar Nuevo</a>
                            <a class="dropdown-item" href="./usuarios.php">Ver Todos</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./configuracion.php">
                            <i class="ni ni-bullet-list-67 text-default"></i>
                            <span class="nav-link-text">Configuración</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./perfil.php">
                            <i class="ni ni-single-02 text-yellow"></i>
                            <span class="nav-link-text">Mi Perfil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active active-pro" href="../control/c_logout.php">
                            <i class="fas fa-sign-out-alt text-red"></i>
                            <span class="nav-link-text">Salir</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

