<?php
  session_start();
  $inactividad = 900;
  // Comprobar si $_SESSION["timeout"] está establecida
  if(isset($_SESSION["timeout"])){
      // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
      $sessionTTL = time() - $_SESSION["timeout"];
      if($sessionTTL > $inactividad){
          session_destroy();
          header("Location: control\c_logout.php");
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
<html lang="en"> 
    <head>
        <title>Autos Torres - Iniciar Sesion</title>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
        <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
        <link rel="shortcut icon" href="../autostorres/logo.jpg"> 
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">

    </head> 
    <body class="body-login login-body text-center">
        <div class="container">
            <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
                <div class="card card0 border-0">
                    <div class="row d-flex">
                        <div class="col-lg-6 stat">
                            <div class="card1 pb-5">
                                <div class="row-login"> <img src="assets/img/logo.png" class="logo-login"> 
                                </div>
                                <div class="row-login px-3 justify-content-center mt-4 mb-5 border-line"> 
                                    <img src="assets/img/cars.png" class="image-login"> 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form id="tarea_form">
                                <div class="card2 card border-0 px-4 py-5">
                                    <div class="row-login px-3"> 
                                        <label class="mb-1">
                                            <h6 class="mb-0 text-sm">Correo Electronico</h6>
                                        </label> 
                                        <input id="txtUser" class="form-control mr-sm-2" type="email" placeholder="Ingrese su correo">
                                    </div>
                                        <div class="row-login px-3"> <label class="mb-1">
                                            <h6 class="mb-0 text-sm">Contraseña</h6>
                                        </label> 
                                        <input id="txtPw" class="form-control mr-sm-2" type="password"  placeholder="Ingrese la contraseña" autocomplete="on"> 
                                    </div>
        <!-- 
                                    <div class="row px-3 mb-4 py-2">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> 
                                            <label for="chk1" class="custom-control-label text-sm">Remember me</label> 
                                        </div> <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                                    </div>
        -->
                                    <div class="row mb-3 px-3"> 
                                        <button id="btnAccion" type="submit" class="btn btn-primary btn-lg btn-block my-3">
                                            Entrar
                                        </button>
                                    </div>
                                    <div id="mensaje"></div>
                                    <div class="row mb-4 px-3"> 
                                        <small class="font-weight-bold">No tiene una cuenta <a href="home/index.php" class="text-danger ">Solicite una</a></small> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer-login text-center text-white bg-light ">
            <!-- Grid container -->
            <div class="container pt-4">
              <!-- Section: Social media -->
              <section class="mb-4 bg-ligth">
                <!-- Facebook -->
                <a
                  class="btn btn-link btn-floating btn-lg text-dark m-1"
                  href="#!"
                  role="button"
                  data-mdb-ripple-color="grey"
                  ><i class="icon ion-logo-facebook"></i></a>
          
                <!-- Twitter -->
                <a
                  class="btn btn-link btn-floating btn-lg text-dark m-1"
                  href="#!"
                  role="button"
                  data-mdb-ripple-color="dark"
                  ><i class="icon ion-logo-twitter"></i></a>
          
                <!-- Google -->
                <a
                  class="btn btn-link btn-floating btn-lg text-dark m-1"
                  href="#!"
                  role="button"
                  data-mdb-ripple-color="dark"
                  ><i class="icon ion-logo-instagram"></i></a>
              </section>
              <!-- Section: Social media -->
            </div>
            <!-- Grid container -->
          
            <!-- Copyright -->
            <div class="text-center text-light p-3 bg-secondary" >
              © 2021 Copyright:
              <a class="text-light" href="https://www.facebook.com/ReCkreaStuDios">ReCkrea Dev RCSG.</a>
            </div>
            <!-- Copyright -->
          </footer>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="./ajax/console_user.js"></script>
    <script>    
        txtUser.focus();
    </script>
</html> 

