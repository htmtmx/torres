<?php
    session_start();
    // Establecer tiempo de vida de la sesión en segundos
    $inactividad = 9000;
    // Comprobar si $_SESSION["timeout"] está establecida
    if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            session_destroy();
            header("Location: ..\controller\c_logout.php");
        }
    }
    // El siguiente key se crea cuando se inicia sesión
    $_SESSION["timeout"] = time();

    if(!isset($_SESSION['usuario']))
    {
      header('Location: ../index.php');
    }
?>
<!doctype html>
<html lang="en">
  <?php
    $tittle = "Usuarios del Sistema";
    include("includes/header.php");
    include("includes/modal_add_user.php");

    ?>
  <body class="body-home">
  <div class="d-flex">
      <?php include("includes/navegation.php"); ?>
      <div class="w-100">
      <?php include("includes/menus.php"); ?>
        <div id="content">
        <!--Inicio contenido dinamico-->
          <div class="componet-dinamico">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                </ol>
            </nav>
            <section class="container py-3">
                <div class="row">
                    <div class="col-lg-9">
                        <h2 class="font-weight-bold mb-0">Usuarios Registrados</h2>
                        <p id="contador-rows" class="lead text-muted">Encontramos # usuarios en el sistema</p>
                    </div>
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-primary w-100 aling-self-center" data-toggle="modal" data-target="#modal-new-user" data-whatever="@getbootstrap">
                            <i class="icon ion-md-add mr-2"></i>Agregar Usuario
                        </button>
                    </div>
                </div>
            </section>
            
              <section class="bg-mix">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-12 my-3 table-responsive">
                          <input type="hidden" id="user-id" value="0">
                              <table class="table table-striped table-hover bg-light">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">ID</th>
                                      <th scope="col">Nombre</th>
                                      <th scope="col">Teléfono</th>
                                      <th scope="col">Correo</th>
                                      <th scope="col">Puesto</th>
                                      <th scope="col">Cuenta</th>
                                      <th scope="col">Acciones</th>
                                    </tr>
                                  </thead>
                                  <tbody id="users">
                    
                                  </tbody>
                                </table>
                            <!--Dinamic Table AJAX-->
                          </div>
                      </div>
                      <div class="row">
                        <div id="paginator" class="col-lg-12 my-2" >

                        </div>
                      </div>
                  </div>
              </section>
              <section class="bg-grey">
                  <div class="container">
                      <div class="row">
                          <div class="col-sm-6 my-3">
                              <div class="card">
                                  <div class="card-body">
                                  <h5 class="card-title font-weight-bold">Registrar</h5>
                                  <p class="card-text text-muted">Agrege un nuevo usuario para el sistema</p>
                                  <button type="button" class="btn btn-primary aling-self-center" data-toggle="modal" data-target="#modal-new-user" data-whatever="@getbootstrap"><i class="icon ion-md-add mr-2"></i>Agregar Usuario</button>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6 my-3">
                              <div class="card">
                                  <div class="card-body">
                                  <h5 class="card-title font-weight-bold">Reportes</h5>
                                  <p class="card-text text-muted">Ver reportes por Usuario</p>
                                  <button type="button" class="btn btn-primary btn-sm " disabled>Registrar Adquisición</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
          </div>
          <!--FIN contenido dinamico-->
          <?php include("includes/footer.php");?>
        </div>
      </div>
  </div>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script>
      var id_page = 0;
  </script>
    <script src="../ajax/users-control.js"></script>
  </body>
  <div id="mensaje"></div>
</html>