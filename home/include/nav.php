<!-- Topnav -->
<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Search form -->
            <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                <div class="form-group mb-0">
                    <div class="input-group input-group-alternative input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <input class="form-control" name="busquedaplaca" id="busquedaplaca" placeholder="Buscar Coche (ingrese placa)" type="text">
                    </div>
                </div>
                <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </form>
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center  ml-md-auto ">
                <li class="nav-item d-sm-none">
                    <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                        <i class="fas fa-search-plus"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-info-circle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                        <div class="row shortcuts px-3">

                            <a href="#!" class="col-3 shortcut-item text-center">
                                <span class="shortcut-media avatar rounded-circle bg-info">
                                <i class="fab fa-facebook"></i>
                                </span>
                                <small>Facebook</small>
                            </a>
                            <a href="#!" class="col-3 shortcut-item text-center">
                                <span class="shortcut-media avatar rounded-circle bg-info">
                                <i class="fas fa-globe"></i>
                                </span>
                                <small>Web</small>
                            </a>
                            <a href="#!" class="col-3 shortcut-item text-center">
                                <span class="shortcut-media avatar rounded-circle bg-info">
                                <i class="fab fa-whatsapp"></i>
                                </span>
                                <small>WhatsApp</small>
                            </a>
                            <a href="#!" class="col-3 shortcut-item text-center">
                                <span class="shortcut-media avatar rounded-circle bg-info">
                                <i class="fas fa-paper-plane"></i>
                                </span>
                                <small>Correo</small>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                <li class="nav-item d-xl-none">
                    <!-- Sidenav toggler -->
                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <i class="fas fa-user-circle"></i>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['usuario']; ?></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right ">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Bienvenido!</h6>
                        </div>
                        <a href="./perfil.php" class="dropdown-item">
                            <i class="fas fa-user"></i>
                            <span>Mi Perfil</span>
                        </a>
                        <a href="./configuracion.php" class="dropdown-item">
                            <i class="fas fa-sliders-h"></i>
                            <span>Configuración</span>
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=5565241529&text=Hola%20necesito%20ayuda%20en%20el%20sistema%20de%20Autos%20Torres" class="dropdown-item" target="_blank">
                            <i class="fas fa-life-ring"></i>
                            <span>Ayuda</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="../control/c_logout.php" class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Salir</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
