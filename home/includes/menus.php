<!--COntens an secctions-->

<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-static-top" role="navigation">
<!-- Just an image -->
    <a class="navbar-brand" href="#">
    <img src="../assets/img/logo.png" width="auto" height="60" alt="" class="d-block d-sm-block d-md-none">
    </a>

<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="navbar-collapse collapse" id="navbarCollapse">
    <ul class="nav-link navbar-nav mr-auto">
    <li class="nav-item">
        <form class="form-inline position-relative my-2 d-inline-block w-100">
        <input class="form-control mr-sm-2" type="search" placeholder="Busca Placa" aria-label="Search">
        <button class="btn btn-search position-absolute " type="submit"><i class="icon ion-md-search"></i></button>
        </form>
    </li>
    </ul>
    <ul class="nav-link navbar-nav mr-rigth menu-perfil">
    <li class="nav-item  d-block p-2 ">
        <a class="nav-link" href="#"><i class="icon ion-md-help mr-2 lead"></i>Ayuda</a>
    </li>
    <li class="d-block p-2 nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="../assets/img/default-perfil.png" alt="..." width="200" class="img-fluid rounded-cirle avatar mr-2 ">
            <?php echo $_SESSION['usuario'];?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="account.php">Mi Perfil</a>
            <a class="dropdown-item" href="account.php">Cuenta</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../control/c_logout.php">Cerrar Sesión</a>
        </div>
        </li>

    </ul>
    <ul  class="nav-link navbar-nav mr-auto d-block d-sm-block d-md-none">
        <!--
            navegation Perfile
        -->
    <li class="dropdown d-block nav-item">
        <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#"><i class="icon ion-md-person mr-2 lead"></i><?php echo $_SESSION['usuario'];?><span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="account.php">Mi Perfil</a></li>
        <li><a class="dropdown-item" href="account.php">Cuenta</a></li>
        <div class="dropdown-divider"></div>
        <li><a class="dropdown-item" href="../control/c_logout.php">Cerrar Sesión</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link navbar-nav mr-auto d-block d-sm-block d-md-none" href="index.php"><i class="icon ion-md-apps mr-2 lead"></i>Tablero</a>
    </li>
    <li class="nav-item">
        <a class="nav-link navbar-nav mr-auto d-block d-sm-block d-md-none" href="autos.php"><i class="icon ion-md-car mr-2 lead"></i>Autos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link navbar-nav mr-auto d-block d-sm-block d-md-none" href="clients.php"><i class="icon ion-md-contacts mr-2 lead"></i>Clientes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link navbar-nav mr-auto d-block d-sm-block d-md-none" href="users.php"><i class="icon ion-md-people mr-2 lead"></i>Usuarios</a>
    </li>
    <li class="nav-item">
        <a class="nav-link navbar-nav mr-auto d-block d-sm-block d-md-none" href="reports.php"><i class="icon ion-md-document mr-2 lead"></i>Reportes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link navbar-nav mr-auto d-block d-sm-block d-md-none" href="settings.php"><i class="icon ion-md-settings mr-2 lead"></i>Confuguración</a>
    </li>
    </ul>
</div>
</nav>