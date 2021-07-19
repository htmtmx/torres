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
    $tittle = "Vechiculos registrados";
    include("includes/header.php");
    ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.view-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: row;
    flex-direction: row;
    padding-left: 0;
    margin-bottom: 0;
}
.thumbnail
{
    margin-bottom: 30px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
}

.item.list-group-item
{
    float: none;
    width: 100%;
    background-color: #fff;
    margin-bottom: 30px;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
    border: 0;
}
.item.list-group-item .img-event {
    float: left;
    width: 30%;
}

.item.list-group-item .list-group-image
{
    margin-right: 10px;
}
.item.list-group-item .thumbnail
{
    margin-bottom: 0px;
    display: inline-block;
}
.item.list-group-item .caption
{
    float: left;
    width: 70%;
    margin: 0;
}

.item.list-group-item:before, .item.list-group-item:after
{
    display: table;
    content: " ";
}

.item.list-group-item:after
{
    clear: both;
}
</style>


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
                    <li class="breadcrumb-item active" aria-current="page">Autos</li>
                </ol>
            </nav>
            <section class="container py-3">
                <div class="row">
                    <div class="col-lg-9">
                        <h2 class="font-weight-bold mb-0">Vehiculos Registrados</h2>
                        <h6>Hola <?php echo $_SESSION['usuario']; ?> aqui puedes ver todos los coches</h6>
                        <p id="contador-rows" class="lead text-muted">Encontramos # vehiculos en el sistema</p>
                    </div>
                    <div class="col-lg-3">
                        <button class="btn btn-primary w-100 aling-self-center">
                        <a href="new-sale.php?id=0&vehiculo=0">
                            <i class="icon ion-md-pricetag mr-2 lead"></i>Iniciar Venta</a>
                        </button>
                    </div>
                </div>
            </section>
              <section class="bg-mix">
                  <div class="container">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                              <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                  <div class="mx-auto">
                                      <i class="icon ion-md-checkmark mr-1 position-absolute paleta"></i>
                                      <h6 class="text-muted">Vendidos</h6>
                                      <h3 class="font-weight-bold">16</h3>
                                      <h6 class="text-success">Vehiculos en vendidos</h6>
                                  </div>
                              </div>
                              <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                  <div class="mx-auto">
                                      <i class="icon ion-md-pricetags mr-1 position-absolute paleta"></i>
                                      <h6 class="text-muted">Vehiculos Adquiridos</h6>
                                      <h3 class="font-weight-bold">10</h3>
                                      <h6 class="text-success">Vehiculos en Adquiridos</h6>
                                  </div>
                              </div>
                              <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                  <div class="mx-auto">
                                      <i class="icon ion-md-car mr-1 position-absolute paleta"></i>
                                      <h6 class="text-muted">Catalogo de Vehiculos</h6>
                                      <h3 id="cont-cat-cars" class="font-weight-bold"> </h3>
                                      <h6 class="text-success">Vehiculos en Venta</h6>
                                  </div>
                              </div>
                              <div class="col-lg-3 col-md-6 d-flex my-3">
                                  <div class="mx-auto">
                                      <i class="icon ion-md-hourglass mr-1 position-absolute paleta"></i>
                                      <h6 class="text-muted">Apartados</h6>
                                      <h3 class="font-weight-bold">6</h3>
                                      <h6 class="text-success">Vehiculos apartados</h6>
                                  </div>
                              </div>
                          </div>
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
                                  <h5 class="card-title font-weight-bold">Vender</h5>
                                  <p class="card-text text-muted">Registre la venta de un vehiculo</p>
                                  <button type="button" class="btn btn-primary btn-sm">Iniciar Proceso de Venta</button>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6 my-3">
                              <div class="card">
                                  <div class="card-body">
                                  <h5 class="card-title font-weight-bold">Adquirir</h5>
                                  <p class="card-text text-muted">Si compro un coche, registrelo</p>
                                  <button type="button" class="btn btn-primary btn-sm">Registrar Adquisición</button>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6 my-3">
                              <div class="card">
                                  <div class="card-body">
                                  <h5 class="card-title font-weight-bold">Registrar Pagos</h5>
                                  <p class="card-text text-muted">Registre el pago/abono de un pago de crédito</p>
                                  <button type="button" class="btn btn-primary btn-sm">Registrar</button>
                                  <button type="button" class="btn btn-primary btn-sm">Ver Reportes</button>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6 my-3">
                              <div class="card">
                                  <div class="card-body">
                                  <h5 class="card-title font-weight-bold">Subir archivos</h5>
                                  <p class="card-text text-muted">Subir archivo nuevos o consultarlos</p>
                                  <button type="button" class="btn btn-primary btn-sm">De Vehiculo</button>
                                  <button type="button" class="btn btn-primary btn-sm">De contrato</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
              <section class="bg-grey">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-12 my-3 overflow-auto">
                              <table class="table table-striped bg-light">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Placa</th>
                                      <th scope="col">Detalles</th>
                                      <th scope="col">Estado</th>
                                      <th scope="col">Registro</th>
                                      <th scope="col">Kilometraje</th>
                                      <th scope="col">Observaciones</th>
                                      <th scope="col">Estado</th>
                                      <th scope="col">Acciones</th>
                                    </tr>
                                  </thead>
                                  <tbody id="cars">
                                  <!--JS Creator Obj-->
                                  </tbody>
                                </table>
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
                  <div class="row bnt-grid">
                      <div class="col-lg-12 my-3">
                          <div class="pull-right">
                              <div class="btn-group">
                                  <button class="btn btn-info" id="list">
                                      List View
                                  </button>
                                  <button class="btn btn-danger" id="grid">
                                      Grid View
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div> 
                <div id="products" class="row view-group">
                </div>
                </div>
              </section>


          </div>
          <!--FIN contenido dinamico-->
          <?php include("includes/footer.php");?>
        </div>
      </div>
  </div>
  </body>

  
<script>
$(document).ready(function() {
            $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
            $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
        });
</script>
<script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script>
      var id_page = 0;
  </script>
    <script src="../ajax/cars-control.js"></script>
</html>