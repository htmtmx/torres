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

    $id = $_GET['id'];
    if (!isset($id) || $id =="") {
        header("Location: clients.php");
    }
?>
<!doctype html>
<html lang="en">
  <?php
    $tittle = "Editar Usuario";
    include("includes/header.php");
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
                    <li class="breadcrumb-item" aria-current="page"><a href="users.php">Clientes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar</li>
                </ol>
            </nav>
            <section class="container py-3">
                <div class="row">
                    <div class="col-lg-9">
                        <h2 class="font-weight-bold mb-0">Editar datos del Cliente</h2>
                        <p id="contador-rows" class="lead text-muted">Fecha de registro: <span id="fecha"></span> </p>
                    </div>
                    <div class="col-lg-3">
                    <a href="clients.php">
                        <button type="button" class="btn btn-primary w-100 aling-self-center">
                            <i class="icon ion-md-list mr-2"></i>Ver todos
                        </button>
                    </a>
                    </div>
                </div>
            </section>
            
              <section class="bg-mix">
                  <div class="container">
                      <div class="row">
                      <section class="bg-mix ">
                <div class="container">
                <div class="row">
                <div class="col-md-12 ">
                    <span class="anchor" id="formUserEdit"></span>
                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">ID: <?php echo $id; ?></h3>
                        </div>
                        <div class="card-body">
                            <form class="form" id="form-update-client">
                            <input class="form-control" type="hidden"  id="user-id" placeholder="AUTO" value="<?php echo $id; ?>" disabled>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">*Nombre</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" id="nombre_cliente" name="nombre_cliente" require >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">*A. Paterno</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" id="apaterno_cliente" name="apaterno_cliente" require>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">*A. Materno</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" id="amaterno_cliente" name="amaterno_cliente" require>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">*Teléfono</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="tel" id="telefono_cliente" name="telefono_cliente" require>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Celular</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="tel" id="celular_cliente" name="celular_cliente">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Correo</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" id="correo_cliente" name="correo_cliente" require>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Suscripción</label>
                                    <div class="col-lg-9">
                                        <select id="subscripcion_cliente" name="subscripcion_cliente" class="form-control">
                                            <option value="0">Inactiva</option>
                                            <option value="1">Activa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Identificación</label>
                                    <div class="col-lg-9">
                                        <select id="medio_identificación_cliente" name="medio_identificación_cliente" class="form-control">
                                            <option value="INE">INE</option>
                                            <option value="PASAPORTE">Pasaporte</option>
                                            <option value="CEDULA">Cédula Profesional</option>
                                            <option value="LICENCIA">Licencia de Conducir</option>
                                            <option value="INAPAM">INAPAM</option>
                                            <option value="ESCOLAR">Credencial de Estudiante</option>
                                            <option value="CERTIFICADO">Certificado Escolar</option>
                                            <option value="TITULO">Título Profesional</option>
                                            <option value="CARTILLA">Cartilla de Servicio Militar</option>
                                            <option value="SEGURO">Credencial IMSS ISSSTE</option>
                                            <option value="CEDULA">Cédula de Idedntificacion Ciudadana</option>
                                            <option value="OTRO">Otro</option>
                                            <option value="NONE">Ninguna</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Folio</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" id="folio_cliente" name="folio_cliente" require>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Tipo de Cliente</label>
                                    <div class="col-lg-9">
                                        <select id="tipo_cliente" name="tipo_cliente" class="form-control">
                                            <option value="0">Persona Física</option>
                                            <option value="1">Persona Moral</option>
                                            <option value="2">NA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Empresa</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" id="empresa_cliente" name="empresa_cliente" require>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">RFC</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" id="rfc_cliente" name="rfc_cliente" require>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Estatus</label>
                                    <div class="col-lg-9">
                                        <select id="estatus" name="estatus" class="form-control">
                                            <option value="0">Inactivo</option>
                                            <option value="1">Activo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <input type="submit" class="btn btn-primary" value="Actualizar">
                                    </div>
                                </div>
                                </div>
                            </form>
                        <div class="alert alert-success" id="alerta" style="display: none;">&nbsp;</div>
                        </div>
                    </div>
                    <!-- /form client info -->
                </div>
                <div class="col-md-12">
                    <div class="callout callout-primary">
                        <h4>Recuerde:</h4>
                        Si desactiva al cliente, Ya no podra hacer más ventas ni ver su historial.
                    </div>
                </div>
                </div>

            </section>
                  </div>
              </section>
          </div>
          <!--FIN contenido dinamico-->
          <?php include("includes/footer.php");?>
        </div>
      </div>
  </div>
  <script>
      var id_page = 1;
  </script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.js"></script>
  <script src="../ajax/clients-control.js"></script>
  </body>
  <div id="mensaje"></div>
</html>