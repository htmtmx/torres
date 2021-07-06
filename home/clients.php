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
    include("includes/modal-add-client.php");
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
                    <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                </ol>
            </nav>
            <section class="container py-3">
                <div class="row">
                    <div class="col-lg-9">
                        <h2 class="font-weight-bold mb-0">Clientes Registrados</h2>
                        <p id="contador-rows" class="lead text-muted">Encontramos # usuarios en el sistema</p>
                    </div>
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-primary w-100 aling-self-center" data-toggle="modal" data-target="#modal-new-client" data-whatever="@getbootstrap">
                            <i class="icon ion-md-add mr-2"></i>Agregar Cliente
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
                                      <th scope="col">No Cliente</th>
                                      <th scope="col">Nombre</th>
                                      <th scope="col">Contacto</th>
                                      <th scope="col">Correo</th>
                                      <th scope="col">Subcripción</th>
                                      <th scope="col">Fecha Registro</th>
                                      <th scope="col">Estado</th>
                                      <th scope="col">Acciones</th>
                                    </tr>
                                  </thead>
                                  <tbody id="clients">
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
                                  <p class="card-text text-muted">Agrege un cliente</p>
                                  <button type="button" class="btn btn-primary aling-self-center" data-toggle="modal" data-target="#modal-new-client" data-whatever="@getbootstrap">
                                  <i class="icon ion-md-add mr-2"></i>Agregar Usuario
                                  </button>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6 my-3">
                              <div class="card">
                                  <div class="card-body">
                                  <h5 class="card-title font-weight-bold">Direcciones</h5>
                                  <p class="card-text text-muted">Ver todas las direcciones registradas del cleinte</p>
                                  <button type="button" class="btn btn-primary btn-sm "><i class="icon ion-md-pin mr-2"></i>Nueva Dirección</button>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6 my-3">
                              <div class="card">
                                  <div class="card-body">
                                  <h5 class="card-title font-weight-bold">Contratos</h5>
                                  <p class="card-text text-muted">Ver todas las direcciones registradas del cleinte</p>
                                  <button type="button" class="btn btn-primary btn-sm "><i class="icon ion-md-pin mr-2"></i>Ver Contratos
                                  </button>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6 my-3">
                              <div class="card">
                                  <div class="card-body">
                                  <h5 class="card-title font-weight-bold">Venta Nueva</h5>
                                  <p class="card-text text-muted">Ver todas las direcciones registradas del cleinte</p>
                                  <button type="button" class="btn btn-primary btn-sm "><i class="icon ion-md-pin mr-2"></i>Nueva Dirección</button>
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
    <script src="../ajax/clients-control.js"></script>
  </body>
  <div id="mensaje"></div>
</html>