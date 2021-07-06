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
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-MX" xml:lang="es-MX">
  <?php
    $tittle = "Editar Vechiculo";
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
                    <li class="breadcrumb-item" aria-current="page"><a href="autos.php">Vehiculos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar</li>
                </ol>
            </nav>
            <section class="container py-3">
                <div class="row">
                    <div class="col-lg-9">
                        <h2 class="font-weight-bold mb-0">Editar detalles del vehículo</h2>
                        <p id="contador-rows" class="lead text-muted">Fecha de registro: <span id="fecha"></span> </p>
                    </div>
                    <div class="col-lg-3">
                    <a href="autos.php#cars">
                        <button type="button" class="btn btn-primary w-100 aling-self-center">
                            <i class="icon ion-md-list mr-2"></i>Ver Todos
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
                                <input class="form-control" type="hidden"  id="car-id" placeholder="AUTO" value="<?php echo $id; ?>" disabled>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Marca</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" id="marcas" name="marcas" require  disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Modelo</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" id="modelo_coche" name="modelo_coche" require  disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">*Placa</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" id="placa" name="placa" require >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Entidad</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" id="entidad_placa">
                                                <option value="CDMX">Ciudad de México</option>
                                                <option value="AGS">Aguascalientes</option>
                                                <option value="BCN">Baja California</option>
                                                <option value="BCS">Baja California Sur</option>
                                                <option value="CAM">Campeche</option>
                                                <option value="CHP">Chiapas</option>
                                                <option value="CHI">Chihuahua</option>
                                                <option value="COA">Coahuila</option>
                                                <option value="COL">Colima</option>
                                                <option value="DUR">Durango</option>
                                                <option value="GTO">Guanajuato</option>
                                                <option value="GRO">Guerrero</option>
                                                <option value="HGO">Hidalgo</option>
                                                <option value="JAL">Jalisco</option>
                                                <option value="MEX">M&eacute;xico</option>
                                                <option value="MIC">Michoac&aacute;n</option>
                                                <option value="MOR">Morelos</option>
                                                <option value="NAY">Nayarit</option>
                                                <option value="NLE">Nuevo Le&oacute;n</option>
                                                <option value="OAX">Oaxaca</option>
                                                <option value="PUE">Puebla</option>
                                                <option value="QRO">Quer&eacute;taro</option>
                                                <option value="ROO">Quintana Roo</option>
                                                <option value="SLP">San Luis Potos&iacute;</option>
                                                <option value="SIN">Sinaloa</option>
                                                <option value="SON">Sonora</option>
                                                <option value="TAB">Tabasco</option>
                                                <option value="TAM">Tamaulipas</option>
                                                <option value="TLX">Tlaxcala</option>
                                                <option value="VER">Veracruz</option>
                                                <option value="YUC">Yucat&aacute;n</option>
                                                <option value="ZAC">Zacatecas</option>
                                        </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Color</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" id="color" name="color" require>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Kilometraje</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="number" id="kilometros" name="kilometros" require>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Transmision</label>
                                        <div class="col-lg-9">
                                            <select id="subscripcion" name="subscripcion" class="form-control">
                                                <option value="AU">Automática</option>
                                                <option value="MA">Manual</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Combustible</label>
                                        <div class="col-lg-9">
                                            <select id="combustible" name="combustible" class="form-control">
                                                <option value="GAS">Gasolina</option>
                                                <option value="DIS">Diseles</option>
                                                <option value="HIB">Hibrido</option>
                                                <option value="ELE">Eléctrico</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">No de Puertas</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="number" id="no_puertas" name="no_puertas" min="0" max="6" step="1" require>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Precio Lista $</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="number" id="precio_contado" name="precio_contado" require>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Precio Credito $</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="number" id="precio_credito" name="precio_credito" require>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  for="observaciones" class="col-lg-3 col-form-label form-control-label">Observaciones</label>
                                        <div class="col-lg-9">
                                        <textarea class="form-control" id="observaciones" rows="3" name="observaciones"></textarea>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Estatus</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" id="estatus" name="estatus" disabled>
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
                    </div> <!-- end roe-->
                    <div class="col-md-12 py-3">
                        <div class="row">
                            <div class="col-md-12 py-3">
                                <select id="car_detalles_add" name="car_detalles_add" class="form-control">
                                    
                                </select>
                                <input type="text" id="nombre" placeholder="Tipo">
                                <input type="number" id="two" placeholder="age">
                                <input type="text" id="three" placeholder="Address">
                                <button class="btn btn-primary">Agregar</button>
                                <button class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive col-md-12">
                                <table class="table table-bordered">
                                <thead>
                                <th>Sl.No</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Action</th>
                                </thead>
                                <tbody id="data">
                                </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="callout callout-primary">
                            <h4>Para editar:</h4>
                            De clic en el elemento y despues al boton actualizar.
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
  <script src="/ajax/cars-control.js"></script>


  </body>
  <div id="mensaje"></div>
</html>