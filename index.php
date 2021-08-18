<?php
session_start();
$inactividad = 900;
// Comprobar si $_SESSION["timeout"] está establecida
if(isset($_SESSION["timeout"])){
    // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
    $sessionTTL = time() - $_SESSION["timeout"];
    if($sessionTTL > $inactividad){
        session_destroy();
        header("Location: webhook\c_logout.php");
    }
}
// El siguiente key se crea cuando se inicia sesión
$_SESSION["timeout"] = time();
if(isset($_SESSION['usuario']))
{
    //Si ya existe una sesion reedirecciona a home
    header('Location: ./home/index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Inicio de Sesion | Autos Torres</title>
  <!-- Favicon -->
  <link rel="icon" href="./logo.jpg" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="./assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-default">
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9"
         style="background: url(http://www.autostecnologico.com/sis/images/portadas/2.1.jpg) center no-repeat !important;">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">¡Bienvenido!</h1>
              <p class="text-lead text-white">Entrar al sistema de Autos Torres</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-3">
                <img  src="./assets/img/logo.png" width="50%">
              </div>
              <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--text"><i class="fas fa-car"></i> Catalogo</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--text"><span class="btn-inner--icon">
                    <i class="fas fa-question-circle"></i>
                  </span>
                  <span class="nav-link-inner--text">Soporte</span></span>
                </a>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <form role="form" id="tarea_form">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" id="txtUser" name="txtUser">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" id="txtPw" name="txtPw">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                    <button id="btnAccion" type="submit" class="btn btn-primary btn-lg btn-block my-3">
                        Entrar
                    </button>
                    <div id="mensaje"></div>
                </div>
      </form>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-6">
      <a href="#" class="text-light"><small>Olvide mi contraseña</small></a>
    </div>
    <div class="col-6 text-right">
      <a href="#" class="text-light"><small>Crear una cuenta</small></a>
    </div>

  </div>
</div>
</div>
</div>
</div>
<!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2021 <a href="https://reckreastudios.com/" class="font-weight-bold ml-1" target="_blank">
            ReCKrea Studios
          </a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="https://reckreastudios.com/" class="nav-link" target="_blank">ReCkreaStudios</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">Ayuda</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/htmtmx/torres#readme" class="nav-link" target="_blank">RCSG License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="./assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="./assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="./assets/js/argon.js?v=1.2.0"></script>
</body>

<script src="./ajax/console_user.js"></script>
<script>
    txtUser.focus();
</script>
</html>